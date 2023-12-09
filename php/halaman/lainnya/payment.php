<?php
include("../../conn/config.php");
session_start();

// Cek apakah parameter order_id diberikan dalam URL
if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];

    // Query untuk mendapatkan detail order
    $orderQuery = "SELECT * FROM orderan WHERE ord_id = ?";
    $orderStmt = mysqli_prepare($conn, $orderQuery);
    mysqli_stmt_bind_param($orderStmt, "i", $orderId);
    mysqli_stmt_execute($orderStmt);
    $orderResult = mysqli_stmt_get_result($orderStmt);

    if ($orderResult && mysqli_num_rows($orderResult) > 0) {
        $orderDetails = mysqli_fetch_assoc($orderResult);
        $orderPrice = $orderDetails['ord_price'];
    } else {
        // Order tidak ditemukan
        header('Location: ../../halaman/read/haldaftarproduk.php?statusbayar=gagal');
        exit;
    }
} else {
    // Parameter order_id tidak diberikan
    header('Location: ../../halaman/read/haldaftarproduk.php?statusbayar=gagal');
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Explorepage</title>
        <link rel="stylesheet" href="../../../css/tampilanpayment.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="header">
            <div class="isian">
                <p>I See PC</p>
                <img src="../../../css/gambar/logonobg.png" alt="logo">
            </div>
        </div>
        <div class="semua">
            <div class="kotak" style="margin-left:20px;">
                <form action="../../proses/create/prosesbayar.php" method="post">
                    <input type="hidden" name="order_id" value="<?= $orderId; ?>">
                <div class="isi1">
                    <div class="judul">
                        <h1 style="margin-left:190px;">~ Yuk bayar dulu ~</h1>
                    </div>
                    <hr style="width:700px; height:3px; background-color: black;">
                    <div class="deskripsi">
                        <h2>Detail Order :</h2>
                        <div class="tulisan">
                            <p>Order Date : <?= $orderDetails['ord_date'] ?> </p>
                            <p>Order ID :<?=  $orderDetails['ord_id']  ?></p>
                            <p>Product ID : <?=  $orderDetails['ord_pid']  ?> </p>
                            <p>Merchant : <?=  $orderDetails['ord_selleruid']  ?></p>
                            <p>Order Address : <?=  $orderDetails['ord_alamat']  ?></p>
                        </div>
                        <h2>Jumlah Pembayaran :</h2>
                        <strong>Rp </strong><input type="text" name="amount" value="<?= $orderPrice; ?>" readonly><br>
                    </div>
                    <div class="metode">
                        <h2>Metode Pembayaran :</h2>
                        <select name="payment_method" required id="paymethod">
                            <option value="COD">COD</option>
                            <option value="M-banking">Mobile Banking</option>
                            <option value="Dana">ATM</option>
                            <option value="QRIS">QRIS</option>
                            <option value="GOPAY">Gopay</option>
                            <option value="Dana">Dana</option>
                        </select>
                    </div>
                    <div class="ringkasan" style="margin-top:30px;">
                        <button style="height:50px;" type="submit" name="bayar">Bayar Produk</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </body>