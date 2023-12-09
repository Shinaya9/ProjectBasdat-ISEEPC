<?php
include("../../conn/config.php");
session_start();

if (isset($_POST['refund'])) {
    $orderId = $_POST['order_id'];
    $newStatus = isset($_POST['refund']) ? 'Refunded' : '';

    // Update status pesanan
    $updateQuery = "UPDATE orderan SET ord_statbayar = ? WHERE ord_id = ?";
    $updateStmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($updateStmt, "si", $newStatus, $orderId);

    if (mysqli_stmt_execute($updateStmt)) {
        header('Location: ../../halaman/read/myorder(seller).php?statusupdate=sukses');
        exit;
    } else {
        header('Location: ../../halaman/read/myorder(seller).php?statusupdate=gagal');
        exit;
    }
} else {
    header('Location: ../../halaman/read/myorder(seller).php');
    exit;
}
?>
