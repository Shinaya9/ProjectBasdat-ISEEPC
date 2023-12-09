<?php
include("../../conn/config.php");
session_start();

if (isset($_GET['id'])) {
    $usid = $_GET['id'];

    // Buat query untuk menghapus user
    $query = "DELETE FROM `user` WHERE usr_id=?";
    
    // Persiapkan statement
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $usid);

    // Eksekusi statement
    $result = mysqli_stmt_execute($stmt);

    // Cek apakah penghapusan berhasil
    if ($result) {
        // Redirect ke halaman welcome jika berhasil
        header('location: ../../halaman/lainnya/homepage.php?status=sukses');
    } else {
        // Tampilkan pesan kesalahan jika gagal
        echo "Error: " . mysqli_error($conn);
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
} else {
    // Akses terlarang jika tidak ada parameter id
    die("Akses terlarang!");
}
?>
