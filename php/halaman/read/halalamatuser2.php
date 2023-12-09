<?php
include("../../conn/config.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../css/useralamat.css">
	<title>Profile</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <li style="height: 60px;"><a href="contact.php"><i class="fa-regular fa-address-book"></i>Contact Us</a></li>
                    <li style="height: 60px;"><a href="../../proses/lainnya/proseslogout.php"><i class="fa-solid fa-right-from-bracket" style="color: #000000;"></i>Log out</a></li>
                    </ul>
                </ul>
            </div>
            <section>
                <div class="isi">
                    <div class="headerisi">
                        <div class="profile"><a href="halprofil.php">My Profile</a></div>
                        <div class="alamat"><a href="halalamatuser2.php">Alamat User</a></div>
                        <div class="payment"><a href="myorder(seller).php">Order</a></div>
                    </div>
                    <div class="tambah">
                        <a href="../lainnya/tambahalamat.php">Tambahkan Alamat</a>
                    </div>
                    <div class="semua">
                        <?php if(isset($_SESSION['user']['usr_id'])) {
                            $usid = $_SESSION['user']['usr_id'];

                            // Query untuk memeriksa apakah pengguna sudah memiliki alamat
                            $check_query = "SELECT COUNT(*) as total FROM alamat WHERE address_uid = ?";
                            $stmt_check = mysqli_prepare($conn, $check_query);
                            mysqli_stmt_bind_param($stmt_check, "s", $usid);
                            mysqli_stmt_execute($stmt_check);
                            $check_result = mysqli_stmt_get_result($stmt_check);
                            $check_row = mysqli_fetch_assoc($check_result);
                            $alamat_count = $check_row['total'];

                                if ($alamat_count > 0) {
                                    // Pengguna sudah memiliki alamat, tampilkan alamat dalam satu paragraf
                                    $query = "SELECT * FROM alamat WHERE address_uid = ?";
                                    $stmt = mysqli_prepare($conn, $query);
                                    mysqli_stmt_bind_param($stmt, "s", $usid);
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);

                                    // Periksa apakah query berhasil
                                    if($result) {
                                        // Tampilkan alamat dalam satu paragraf
                                        while($address = mysqli_fetch_assoc($result)) {

                                            echo "<div class='edit' style='padding:20px;'>";
                                                echo "<h2>" . $address['street'] . ", " . $address['district'] . ", " . $address['city'] . ", " . $address['province'] . ", " . $address['postcode'] . "</h2>";
                                            echo "<div class='kotakaksi'>";
                                            echo "<div class='hapus' style='margin-left:570px;'><a href='../../proses/delete/proseshapusalamat.php?id=" . $address['address_id'] . "'>Hapus</a>";
                                            echo "</div>";
                                            echo "<div class='hapus'><a href='../lainnya/editalamat.php?id=" . $address['address_id'] . "'>Edit</a>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                        }
                                    } else {
                                        echo "Gagal mengambil data alamat.";
                                    }
                                } else {
                                    // Pengguna belum memiliki alamat, tampilkan formulir untuk menambahkan alamat
                                    echo "<h2 style='margin-left:380px;'>~ ~ ~ Belum ada alamat nih. Tambah alamat yuk! ~ ~ ~</h2>";
                                    

                                    // <!-- Formulir untuk menambahkan alamat
                                    // <form action="../../proses/create/prosesbuatalamat.php" method="post">

                                    //     <label for="province">Provinsi:</label>
                                    //     <input type="text" name="province" required><br>

                                    //     <label for="city">Kota:</label>
                                    //     <input type="text" name="city" required><br>

                                    //     <label for="district">Kecamatan:</label>
                                    //     <input type="text" name="district" required><br>

                                    //     <label for="street">Jalan:</label>
                                    //     <input type="text" name="street" required><br>

                                    //     <label for="postcode">Kode Pos:</label>
                                    //     <input type="text" name="postcode" required><br>

                                    //     <button type="submit" name="tambah_alamat">Tambah Alamat</button>
                                    // </form> -->

                                    
                                }
                            } else {
                                echo "User belum login.";
                            }
                        ?>
                        <!-- <div class="edit">
                            <p>
                                sjadvgsa
                            </p>
                            <div class="hapus">
                                <a href="../../proseshapusalamat.php">Hapus Alamat</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </section>
        </div>
</body>