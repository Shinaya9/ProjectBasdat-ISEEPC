<?php
include("../../conn/config.php");
session_start();

if (isset($_POST['pesan'])) {
    // Get data from the form
    $userId = $_SESSION['user']['usr_id'];
    $productId = $_POST['product_id'];
    $userAddress = $_POST['alamat'];

    // Fetch product details
    $productQuery = "SELECT * FROM product WHERE prd_id = ?";
    $productStmt = mysqli_prepare($conn, $productQuery);
    mysqli_stmt_bind_param($productStmt, "i", $productId);
    mysqli_stmt_execute($productStmt);
    $productResult = mysqli_stmt_get_result($productStmt);

    if ($productResult && mysqli_num_rows($productResult) > 0) {
        $productDetails = mysqli_fetch_assoc($productResult);

        // Insert order into the database
        $orderSeller = $productDetails['prd_uid'];
        $orderDate = date('Y-m-d H:i:s');
        $orderPrice = $productDetails['prd_price'];
        $orderStatus = "pending";

        $insertQuery = "INSERT INTO `orderan` (`ord_buyeruid`, `ord_pid`, `ord_alamat`, `ord_selleruid`, `ord_date`, `ord_price`, `ord_stat`) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $insertStmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($insertStmt, "sisssss", $userId, $productId, $userAddress, $orderSeller, $orderDate, $orderPrice, $orderStatus);

        if (mysqli_stmt_execute($insertStmt)) {
            // Ambil ord_id yang baru saja di-generate
            $orderId = mysqli_insert_id($conn);
            
            // Redirect ke halaman pembayaran dengan menyertakan ord_id di URL
            header("Location: ../../halaman/lainnya/payment.php?order_id=$orderId");
            exit;
        } else {
            // Gagal menempatkan pesanan
            header('Location: ../../halaman/read/explorepage.php?statuspesan=gagal');
            exit;
        }
    } else {
        // Produk tidak ditemukan
        header('Location: ../../halaman/read/explorepage.php?statuspesan=gagal');
        exit;
    }
} else {
    // Permintaan tidak valid
    header('Location: ../../halaman/read/explorepage.php');
    exit;
}
?>
