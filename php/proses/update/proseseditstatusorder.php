<?php
include("../../conn/config.php");
session_start();

if (isset($_POST['terima']) || isset($_POST['tolak'])) {
    $orderId = $_POST['order_id'];
    $newStatus = isset($_POST['terima']) ? 'accepted' : 'canceled';

    // Update status pesanan
    $updateQuery = "UPDATE orderan SET ord_stat = ? WHERE ord_id = ?";
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
