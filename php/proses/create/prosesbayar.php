<?php
include("../../conn/config.php");
session_start();

if (isset($_POST['bayar'])) {
    $orderId = $_POST['order_id'];
    $amount = $_POST['amount'];
    $paymentMethod = $_POST['payment_method'];

    // Peroleh usr_id dari sesi pengguna
    $userId = $_SESSION['user']['usr_id'];

    // Perbarui status pembayaran
    $updateQuery = "UPDATE orderan SET ord_statbayar = 'Sudah Bayar' WHERE ord_id = ?";
    $updateStmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($updateStmt, "i", $orderId);

    if (mysqli_stmt_execute($updateStmt)) {
        // Masukkan data pembayaran ke tabel payment
        $insertPaymentQuery = "INSERT INTO payment (pay_uid, pay_oid, pay_amount, pay_method, pay_stat) VALUES (?, ?, ?, ?, 'Sudah Bayar')";
        $insertPaymentStmt = mysqli_prepare($conn, $insertPaymentQuery);
        mysqli_stmt_bind_param($insertPaymentStmt, "sids", $userId, $orderId, $amount, $paymentMethod);

        if (mysqli_stmt_execute($insertPaymentStmt)) {
            header('Location: ../../halaman/read/myorder(buyer).php?statusbayar=sukses');
            exit;
        } else {
            header('Location: ../../halaman/read/myorder(buyer).php?statusbayar=gagal');
            exit;
        }
    } else {
        header('Location: ../../halaman/read/myorder(buyer).php?statusbayar=gagal');
        exit;
    }
} else {
    header('Location: ../../halaman/read/myorder(buyer).php');
    exit;
}
?>
