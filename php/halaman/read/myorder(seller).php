<?php
include("../../conn/config.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../css/userseller.css">
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
            </div>
            <section>
                <div class="isi">
                    <div class="headerisi">
                        <div class="profile"><a href="halprofil.php">My Profile</a></div>
                        <div class="alamat"><a href="halalamatuser2.php">Alamat User</a></div>
                        <div class="payment"><a href="halorderandibuat.php">Order</a></div>
                    </div>
                    <br>
                    <div class="headerisi">
                        <div class="buyer"><a href="myorder(buyer).php">Buyer</a></div>
                        <div class="seller"><a href="myorder(seller).php">Seller</a></div>
                    </div>
                    
                    <div class="semua">
                        <?php
                        // Pastikan user telah login dan mendapatkan usr_id dari session
                        if (isset($_SESSION['user']['usr_id'])) {
                            $usid = $_SESSION['user']['usr_id'];

                            // Query untuk memeriksa apakah pengguna sudah memiliki alamat
                            $check_query = "SELECT COUNT(*) as total FROM orderan WHERE ord_selleruid = ?";
                            $stmt_check = mysqli_prepare($conn, $check_query);
                            mysqli_stmt_bind_param($stmt_check, "s", $usid);
                            mysqli_stmt_execute($stmt_check);
                            $check_result = mysqli_stmt_get_result($stmt_check);
                            $check_row = mysqli_fetch_assoc($check_result);
                            $orderan_count = $check_row['total'];

                            if ($orderan_count > 0){
                                 // Query untuk mendapatkan daftar pesanan pengguna jika sudah memiliki orderan masuk
                                $query = "SELECT * FROM orderan WHERE ord_selleruid = ?";
                                $stmt = mysqli_prepare($conn, $query);
                                mysqli_stmt_bind_param($stmt, "s", $usid);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);

                                if ($result) {
                                    // Tampilkan daftar pesanan pengguna
                                    while ($order = mysqli_fetch_assoc($result)) {
                                        $orderId=$order['ord_id'];
                                        echo "<div class='kanan'>";
                                        echo "<p style='margin-top:10px;'><strong>Date: " . $order['ord_date'] . "</strong></p>";
                                        echo "<p><strong>Order ID: </strong>" . $order['ord_id'] . "</p>";
                                        echo "<p><strong>Product ID: </strong>" . $order['ord_pid'] . "</p>";
                                        echo "<p><strong>Customer: </strong>" . $order['ord_buyeruid'] . "</p>";
                                        echo "<p><strong>Customer Address: </strong>" . $order['ord_alamat'] . "</p>";
                                        echo "<p><strong>Price: Rp" . $order['ord_price'] . "</strong></p>";
                                            echo "<div class='status'>";
                                                echo "<div class='paymen'>";
                                                    if ($order['ord_statbayar'] == 'Sudah Bayar'){
                                                        if ($order['ord_stat'] == 'accepted' || $order['ord_stat'] == 'pending' ){
                                                            echo "<h2 style='color: green;'>" . $order['ord_statbayar'] . "</h2>";
                                                        // Tampilkan tombol Refund? jika order sudah dibayar, canceled dan user adalah yang mendapat order
                                                        } else if ($order['ord_stat'] == 'canceled' && $order['ord_selleruid'] == $usid) {
                            //bagian ini liat
                                                            echo "<form action='../../proses/update/proseseditstatbayar.php' method='post'>";
                                                            echo "<input type='hidden' name='order_id' value='" . $order['ord_id'] . "'>";
                                                            echo "<button class='bayar' type='submit' name='refund'>";
                                                            echo "<h2 style='color: gray;'>Refund</h2>";
                                                            echo "</button>";
                                                            echo "</form>";
                                                        }
                                                    }else{
                                                        echo "<h2 style='color: gray;'>" . $order['ord_statbayar'] . "</h2>";
                                                    }
                                                echo "</div>";
                                                // Tampilkan tombol terima dan tolak jika status masih pending dan user adalah pemilik produk
                                                if ($order['ord_stat'] == 'pending' && $order['ord_selleruid'] == $usid) {
                                                    echo "<form action='../../proses/update/proseseditstatusorder.php' method='post'>";
                                                    echo "<input type='hidden' name='order_id' value='" . $order['ord_id'] . "'>";
                                                    echo "<div class='order'>";
                                                    echo "<button class='terima' type='submit' name='terima'>Terima</button>";
                                                    echo "<button class='tolak' type='submit' name='tolak'>Tolak</button>";
                                                    echo "</div>";
                                                    echo "</form>";
                                                }else{
                                                    echo "<div class='order'>";
                                                        if ($order['ord_stat'] == 'accepted'){
                                                            echo "<h2 style='color: green; margin-left:200px;'>" . $order['ord_stat'] . "</h2>";
                                                        }else if($order['ord_stat'] == 'canceled'){
                                                            echo "<h2 style='color: red; margin-left:200px;'>" . $order['ord_stat'] . "</h2>";
                                                        }else{
                                                            echo "<h2 style='color: gray; margin-left:200px;'>" . $order['ord_stat'] . "</h2>";
                                                        }
                                                    echo "</div>";
                                                    }
                                            echo "</div>";
                                        echo "</div>";
                                    }
                                } else {
                                    echo "Gagal mengambil data pesanan.";
                                }
                            }else{
                                // Pengguna belum memiliki alamat, tampilkan formulir untuk menambahkan alamat
                                echo "<h2 style='margin-left:400px;'>~ ~ ~ Belum ada orderan masuk nih. Tunggu Ya ~ ~ ~</h2>";
                            }
                            
                        } else {
                            echo "User belum login.";
                        }
                        ?>
                        <!-- <div class="kanan">
                            <p>tgl</p>
                            <p>Order Number :</p>
                            <p>Produk Number :</p>
                            <p>Buyer :</p>
                            <p>tipe laptop</p>
                            <div class="harga"><p>harga</p></div>
                            <div class="status">
                                <div class="terima"><a href="">Terima</a></div>
                                <div class="tolak"><a href="">Tolak</a></div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </section>
</body>