<?php
include("../../conn/config.php");
session_start();

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
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Explorepage</title>
        <link rel="stylesheet" href="../../../css/explorepage.css">
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
                    <div class="headerisi">
                        <!-- Formulir pencarian -->
                        <form action="explorepage.php" method="get">
                            <input type="text" name="keyword" placeholder=" Mau Cari Apa Hari Ini?">
                            <button type="submit">Cari</button>
                        </form>
                        <!-- akhir form -->
                    </div>
                    <div class="isi2">
                        <div class="kiri">
                        <?php
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
                        <div class="kanan">
                            <div class="isi1">
                                <img src="../../../uploads/iklan-ceritanya.jpg" style="size: fit-content;" >
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </body>