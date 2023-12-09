<?php
include("../../conn/config.php");
session_start();

//     // Pastikan user telah login dan mendapatkan usr_id dari session
// if (isset($_SESSION['user']['usr_id'])) {
//     $usid = $_SESSION['user']['usr_id'];

//     // Query untuk memeriksa apakah pengguna memiliki produk
//     $check_query = "SELECT COUNT(*) as total FROM product WHERE prd_uid = ?";
//     $stmt_check = mysqli_prepare($conn, $check_query);
//     mysqli_stmt_bind_param($stmt_check, "s", $usid);
//     mysqli_stmt_execute($stmt_check);
//     $check_result = mysqli_stmt_get_result($stmt_check);
//     $check_row = mysqli_fetch_assoc($check_result);
//     $produk_count = $check_row['total'];

//     if ($produk_count > 0) {
//         // Pengguna memiliki produk, tampilkan produk dalam satu bagian
//         $query_product = "SELECT * FROM product WHERE prd_uid = ?";
//         $stmt = mysqli_prepare($conn, $query_product);
//         mysqli_stmt_bind_param($stmt, "s", $usid);
//         mysqli_stmt_execute($stmt);
//         $result = mysqli_stmt_get_result($stmt);

//         // Periksa apakah query berhasil
//         if ($result) {
//             // Tampilkan produk dalam satu bagian
//             while ($product = mysqli_fetch_assoc($result)) {
//                 echo "<div>";
//                 echo "<p>Nama Produk: " . $product['prd_name'] . "</p>";
//                  // Anda dapat menampilkan gambar produk di sini
//                 echo "<img src='" . $product['prd_pic'] . "' alt='Product Picture'>";
//                 echo "<p>Kondisi: " . $product['prd_condition'] . "</p>";
//                 echo "<p>Tipe: " . $product['prd_type'] . "</p>";
//                 echo "<p>Deskripsi: " . $product['prd_desc'] . "</p>";

//                 if ($product['prd_type'] == 'PC') {
//                     // Jika produk adalah PC, tambahkan informasi PC
//                     $query_PC = "SELECT * FROM pc WHERE pc_pid = ?";
//                     $stmt_pc = mysqli_prepare($conn, $query_PC);
//                     mysqli_stmt_bind_param($stmt_pc, "i", $product['prd_id']);
//                     mysqli_stmt_execute($stmt_pc);
//                     $result_pc = mysqli_stmt_get_result($stmt_pc);

//                     if ($result_pc) {
//                         $pc = mysqli_fetch_assoc($result_pc);
//                         echo "<p>Processor: " . $pc['pc_processor'] . "</p>";
//                         echo "<p>Memori: " . $pc['pc_mem'] . "</p>";
//                         echo "<p>Grafik: " . $pc['pc_graph'] . "</p>";
//                         echo "<p>Display: " . $pc['pc_display'] . "</p>";
//                         echo "<p>Operating System: " . $pc['pc_opsys'] . "</p>";
//                     } else {
//                         echo "Gagal mengambil data PC.";
//                     }
//                 }

//                 echo "<p>Harga: " . $product['prd_price'] . "</p>";
//                 echo "<button type='submit'><a href='../lainnya/haleditproduk.php?id=" . $product['prd_id'] . "'>Edit Produk</a></button>";
// 				echo "<button name='hapus' type='submit'><a href='../../proses/delete/proseshapusproduk.php?id=" . $product['prd_id'] . "'>Hapus Produk</a></button>";
//                 echo "</div>";
//             }
//         } else {
//             echo "Gagal mengambil data produk.";
//         }
//     } else {
//         // Pengguna belum memiliki produk, tampilkan formulir untuk menambahkan produk
//         echo "<p>Anda belum memiliki produk. Tambahkan produk baru:</p>";
//         // Tambahkan formulir untuk menambahkan produk di sini
//     }
// } else {
//     echo "User belum login.";
// }
// ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Explorepage</title>
        <link rel="stylesheet" href="../../../css/myproduct.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container">
            <input type="checkbox" id="check">
                <label for="check">
                    <i class="fa-solid fa-bars" style="color: #000000;" id="btn"></i>
                    <i class="fa-solid fa-times" id="cancel" style="position: fixed; top: 6%;"></i>
                </label>
                <div class="sidebar">
                    <header>
                    <p><img src="../../../css/gambar/logonobg.png" alt="logo">   I See PC</p></header>
                    <ul>
                        <li style="height: 60px;"><a href="../lainnya/homepage2.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li style="height: 60px;"><a href="explorepage.php"><i class="fa-solid fa-magnifying-glass"></i> Explore</a></li>
                        <li style="height: 60px;"><a href="myproduct2.php"><i class="fa-solid fa-plus" style="color: #000000;"></i>My Product</a></li>
                        <li style="height: 60px;"><a href="halprofil.php"><i class="fa-solid fa-user" style="color: #000000;"></i> User</a></li>
                        <li style="height: 60px;"><a href="contact.html"><i class="fa-regular fa-address-book"></i>Contact Us</a></li>
                        <li style="height: 60px;"><a href="../../proses/lainnya/proseslogout.php"><i class="fa-solid fa-right-from-bracket" style="color: #000000;"></i>Log out</a></li>
                    </ul>
                </div>
                <section class="isi">
                    <div class="judul">
                        <p>My Product</p>
                    </div>
                    <div class="tambah">
                        <button><a href="../lainnya/tambahproduk.php">Tambah Produk</a></button>
                    </div>
                    <div class="list">
                        <?php
                        // Pastikan user telah login dan mendapatkan usr_id dari session
                        if (isset($_SESSION['user']['usr_id'])) {
                            $usid = $_SESSION['user']['usr_id'];

                            // Query untuk memeriksa apakah pengguna memiliki produk
                            $check_query = "SELECT COUNT(*) as total FROM product WHERE prd_uid = ?";
                            $stmt_check = mysqli_prepare($conn, $check_query);
                            mysqli_stmt_bind_param($stmt_check, "s", $usid);
                            mysqli_stmt_execute($stmt_check);
                            $check_result = mysqli_stmt_get_result($stmt_check);
                            $check_row = mysqli_fetch_assoc($check_result);
                            $produk_count = $check_row['total'];

                            if ($produk_count > 0) {
                                // Pengguna memiliki produk, tampilkan produk dalam satu bagian
                                $query_product = "SELECT * FROM product WHERE prd_uid = ?";
                                $stmt = mysqli_prepare($conn, $query_product);
                                mysqli_stmt_bind_param($stmt, "s", $usid);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);

                                // Periksa apakah query berhasil
                                if ($result) {
                                    // Tampilkan produk dalam satu bagian
                                    while ($product = mysqli_fetch_assoc($result)) {
                                        echo "<div class='card'>";
                                        echo "<img src='../../../uploads/" . basename($product['prd_pic']) . "' alt='Product Picture'>";
                                        echo "<div class='card-isi'>";
                                        echo "<div class='card-title'><h3>" . $product['prd_name'] . "</h3></div>";
                                        echo "<div class='card-description'><h4>" . $product['prd_type'] . '  ||  ' . $product['prd_condition'] . "</h4></div>";
                                        echo "<div class='card-description' style='text-align:justify; margin-top:10px;'>" . $product['prd_desc'] . "</div>";
                        // </div>
                                        if ($product['prd_type'] == 'Komputer/Laptop') {
                                            // Jika produk adalah PC, tambahkan informasi PC
                                            $query_PC = "SELECT * FROM pc WHERE pc_pid = ?";
                                            $stmt_pc = mysqli_prepare($conn, $query_PC);
                                            mysqli_stmt_bind_param($stmt_pc, "i", $product['prd_id']);
                                            mysqli_stmt_execute($stmt_pc);
                                            $result_pc = mysqli_stmt_get_result($stmt_pc);

                                            if ($result_pc) {
                                                $pc = mysqli_fetch_assoc($result_pc);
                                                echo "<p style='margin-top:10px;'>Processor: " . $pc['pc_processor'] . "</p>";
                                                echo "<p>Memori          : " . $pc['pc_mem'] . "</p>";
                                                echo "<p>Storage         : " . $pc['pc_storage'] . "</p>";
                                                echo "<p>Grafik          : " . $pc['pc_graph'] . "</p>";
                                                echo "<p>Display         : " . $pc['pc_display'] . "</p>";
                                                echo "<p>Operating System: " . $pc['pc_opsys'] . "</p>";
                                            } else {
                                                echo "Gagal mengambil data PC.";
                                            }
                                        }
                                        echo "<p style='margin-top:10px;'>Harga: Rp" . $product['prd_price'] . "</p>";
                                        echo "</div>";
                                        echo "<div class='tombol-aksi'>";
                                        echo "<button type='submit'><a href='../lainnya/editproduk.php?id=" . $product['prd_id'] . "'>Edit Produk</a></button>";
                                        echo "<button name='hapus' type='submit'><a href='../../proses/delete/proseshapusproduk.php?id=" . $product['prd_id'] . "'>Hapus Produk</a></button>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                } else {
                                    echo "Gagal mengambil data produk.";
                                }
                            } else {
                                // Pengguna belum memiliki produk, tampilkan formulir untuk menambahkan produk
                                echo "<p>Anda belum memiliki produk. Tambahkan produk baru:</p>";
                                // Tambahkan formulir untuk menambahkan produk di sini
                            }
                        } else {
                            echo "User belum login.";
                        }
                        ?>
                        <!-- <div class="card">
                            <img src="example.jpg" alt="Card Image">
                            <div class="card-title">Judul Kartu</div>
                            <div class="card-description">Deskripsi kartu yang singkat dan menarik.</div>
                            <a href="#" class="card-link">Baca Selengkapnya</a>
                        </div> -->
                    </div>
                </section>
            </div>
        </div>
    </body>