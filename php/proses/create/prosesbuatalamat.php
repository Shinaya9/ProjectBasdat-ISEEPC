<?php
include ("../../conn/config.php");
session_start();

if (isset($_POST['tambah_alamat'])){

    //ambil data dari form
    $adid = $_SESSION['user']['usr_id'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $street = $_POST['street'];
    $postcode = $_POST['postcode'];

    //buat query
    $query = "INSERT INTO `alamat`(`address_uid`,`province`, `city`, `district`, `street`, `postcode`) VALUES ('$adid','$province','$city','$district','$street','$postcode')";

    $cek = mysqli_query($conn,$query);

    if ($cek == TRUE){
        header('Location: ../../halaman/read/halalamatuser2.php? statusdaftar=sukses');
    } else {
        header('location: ../../halaman/read/halalamatuser2.php? statusdaftar=gagal');
    }
} else {
    die("terjadi kesalahan sistem");
}
?>