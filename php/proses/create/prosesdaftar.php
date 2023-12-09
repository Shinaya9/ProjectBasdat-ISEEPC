<?php
include("../../conn/config.php");
session_start();

if(isset($_POST['daftar'])){

    //ambil data dari form
    $usid = $_POST['usr_id'];
    $fname = $_POST['usr_fname'];
    $lname = $_POST['usr_lname'];
    $email = $_POST['usr_email'];
    $upass = $_POST['usr_pass'];
    $phonenum = $_POST['usr_phonum'];

    //buat query
    $query = "INSERT INTO user(usr_id, usr_fname, usr_lname, usr_email, usr_pass, usr_phonum) VALUES ('$usid','$fname','$lname','$email','$upass','$phonenum')";

    if( (mysqli_query($conn, $query))==TRUE) {
        //berhasil, alihkan ke index.php dg status=sukses
        header('location: ../../halaman/lainnya/hallogin.php? statusdaftar=sukses');
    } else {
        //gagal, alihkan ke index.php dg status=gagal
        header('location: ../../halaman/lainnya/haldaftar.php?statusdaftar=gagal');
    }
} else {
    die("Akses terlarang!");
}
?>