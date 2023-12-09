<?php
include("../../conn/config.php");
session_start();

$productId = isset($_GET['id']) ? $_GET['id'] : null;
$pcId = $productId;

// Ambil data produk berdasarkan ID
if ($productId) {
    $query_product = "SELECT * FROM product WHERE prd_id = ?";
    $query_PC = "SELECT * FROM pc WHERE pc_pid =?";

    $stmt = mysqli_prepare($conn, $query_product);
    mysqli_stmt_bind_param($stmt, "i", $productId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $stmt_pc = mysqli_prepare($conn, $query_PC);
    mysqli_stmt_bind_param($stmt_pc, "i", $pcId);
    mysqli_stmt_execute($stmt_pc);
    $result_pc = mysqli_stmt_get_result($stmt_pc);

    if ($result && $result_pc && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        $pc = mysqli_fetch_assoc($result_pc);
    } else {
        // Produk tidak ditemukan, atur atau tangani sesuai kebutuhan
        echo "Produk tidak ditemukan.";
        exit;
    }
} else {
    // ID produk tidak disediakan, atur atau tangani sesuai kebutuhan
    echo "ID produk tidak diberikan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Explorepage</title>
    <link rel="stylesheet" href="../../../css/detailproduk.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fa-solid fa-bars" style="color: #000000;" id="btn"></i>
            <i class="fa-solid fa-times" id="cancel"></i>
        </label>
        <div class="sidebar">
            <header>
                <p><img src="../../../css/gambar/logonobg.png" alt="logo">   I See PC</p>
            </header>
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
            <div class="headerisi1">
                <!-- Formulir pencarian -->
                <form action="explorepage.php" method="get">
                            <input type="text" name="keyword" placeholder=" Mau Cari Apa Hari Ini?">
                            <button type="submit">Cari</button>
                </form>
                <!-- akhir form -->
            </div>
            <div class="headerisi">
                
                <div class="gambar">
                    <img src="../../../uploads/<?= $product['prd_pic']; ?>" alt="Product Picture">
                </div>
                <div class="tulisan" style="max-width:650px; max-height:240px;">
                    <div class="nama">
                        <h2 style="max-width:650px; max-height:120px;"><?= $product['prd_name']; ?></h2>
                        <br>
                        <p>Harga: Rp<?= $product['prd_price']; ?></p>
                    </div>
                    <div class="beli">
                        <a href="order.php?id=<?= $product['prd_id'] ?>">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="deskripsi">
                <h2>Deskripsi</h2>
                <p><?= $product['prd_desc']; ?></p>
            </div>
            <?php
            if ($product['prd_type'] == 'Komputer/Laptop'){
                echo "<div class='spek' style='margin-top:20px;'>";
                echo "<h2>Spesifikasi</h2>";
                echo "<p> Processor" . $pc['pc_processor'] . "</p>";
                echo "<p> RAM" . $pc['pc_mem'] . "</p>";
                echo "<p> Storage" . $pc['pc_storage'] . "</p>";
                echo "<p> Graphic Card" . $pc['pc_graph'] . "</p>";
                echo "<p> Display" . $pc['pc_display'] . "</p>";
                echo "<p> Operating System" . $pc['pc_opsys'] . "</p>";
                echo "</div>";
            }
            ?>
            <div class="deskripsi" style="margin-top:20px;">
                <h2>Info Penjual</h2>
            </div>
            <div class="penjual">
                <?php
                $sellerID=$product['prd_uid'];
                $query_seller = "SELECT * FROM user WHERE usr_id=?";

                $stmt_seller = mysqli_prepare($conn, $query_seller);
                mysqli_stmt_bind_param($stmt_seller, "s", $sellerID);
                mysqli_stmt_execute($stmt_seller);
                $result_seller = mysqli_stmt_get_result($stmt_seller);

                if ($result_seller && mysqli_num_rows($result_seller) > 0) {
                    $seller = mysqli_fetch_assoc($result_seller);
                } else {
                    // Produk tidak ditemukan, atur atau tangani sesuai kebutuhan
                    echo "Seller tidak ditemukan.";
                    exit;
                }

                $alamatsellerID=$seller['usr_id'];
                $query_alamat = "SELECT * FROM alamat WHERE address_uid=?";

                $stmt_alamat = mysqli_prepare($conn, $query_alamat);
                mysqli_stmt_bind_param($stmt_alamat, "s", $alamatsellerID);
                mysqli_stmt_execute($stmt_alamat);
                $result_alamat = mysqli_stmt_get_result($stmt_alamat);

                if ($result_alamat && mysqli_num_rows($result_alamat) > 0) {
                    $alamatseller = mysqli_fetch_assoc($result_alamat);
                } else {
                    // Produk tidak ditemukan, atur atau tangani sesuai kebutuhan
                    echo "Alamat Seller tidak ditemukan.";
                    exit;
                }

                ?>
                <div class="foto">
                    <img src="../../../uploads/<?= $seller['usr_pic'];?>" alt="Seller Image">
                </div>
                <div class="identitas">
                    <p><strong><?= $seller['usr_fname'] . " " . $seller['usr_lname'] ?></strong></p>
                    <p><strong><?= $alamatseller['city'] . ", " . $alamatseller['province'] ?></strong></p>
                </div>
            </div>
            <div class="lainnya" style="margin-top:20px;">
                <p><strong>Cari Barang Menarik Lainnya</strong></p>
                <div class="list">
                    <?php
                    // Proses pencarian
                    if (isset($_GET['keyword'])) {
                        $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
                        $query = "SELECT * FROM product WHERE prd_name LIKE '%$keyword%'";
                        $result = mysqli_query($conn, $query);
                    } else {
                        // Jika tidak ada pencarian, ambil produk acak
                        $query = "SELECT * FROM product ORDER BY RAND() LIMIT 10";
                        $result = mysqli_query($conn, $query);
                    }

                    if (!$result) {
                        die("Error in the database.");
                    }
                    // Tampilkan hasil pencarian atau produk acak
                    while ($product = mysqli_fetch_assoc($result)) {
                        echo "<div class='card'>";
                            echo "<img src='../../../uploads/{$product['prd_pic']}' alt='Product Picture'>";
                            echo "<div class='card-title'>" . $product['prd_name'] . "<h5>". $product['prd_type'] . " || " . $product['prd_condition'] ."</h5></div>";
                            echo "<div class='card-description'> Rp" . $product['prd_price'] . "</div>";
                            echo "<a href='detailproduk.php?id=" . $product['prd_id'] . "' class='card-link'>Baca Selengkapnya</a>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
