<?php
include("../../conn/config.php");
session_start();

if (isset($_GET['id'])) {
    //ambil data dari form
    $prdid = $_GET['id'];

    //buat query untuk menghapus produk
    $query_delete_product = "DELETE FROM `product` WHERE prd_id = '$prdid'";

    //buat query untuk menghapus data terkait pada tabel lain (gantilah 'nama_tabel' sesuai dengan nama tabel yang sesuai)
    $query_delete_related_data = "DELETE FROM `pc` WHERE pc_pid = '$prdid'";

    //eksekusi query penghapusan produk
    $result_delete_product = mysqli_query($conn, $query_delete_product);

    //eksekusi query penghapusan data terkait
    $result_delete_related_data = mysqli_query($conn, $query_delete_related_data);

    if ($result_delete_product && $result_delete_related_data) {
        header('Location: ../../halaman/read/myproduct2.php?statushapus=sukses');
    } else {
        header('Location: ../../halaman/read/myproduct2.php?statushapus=gagal');
    }
} else {
    die("terjadi kesalahan system");
}
?>
