<?php
include("../../conn/config.php");
session_start();

if (isset($_GET['id'])) {
    //ambil data dari form
    $adid = $_GET['id'];

    //buat query untuk menghapus produk
    $query_delete_alamat = "DELETE FROM `alamat` WHERE address_id = '$adid'";

    //eksekusi query penghapusan produk
    $result_delete_alamat = mysqli_query($conn, $query_delete_alamat);


    if ($result_delete_alamat) {
        header('Location: ../../halaman/read/halalamatuser2.php?statushapus=sukses');
    } else {
        header('Location: ../../halaman/read/halalamatuser2.php?statushapus=gagal');
    }
} else {
    die("terjadi kesalahan system");
}
?>
