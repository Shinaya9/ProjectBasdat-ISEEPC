<?php
include("../../conn/config.php");
session_start();

// Cek apakah tombol Edit ditekan
if (isset($_POST['update_alamat'])) {

    // Ambil data dari formulir alamat
    $adid = $_POST['address_id'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $street = $_POST['street'];
    $postcode = $_POST['postcode'];

    // Perbarui data alamat
    $query = "UPDATE `alamat` SET `province`=?, `city`=?, `district`=?, `street`=?, `postcode`=? WHERE `address_id`=?";

    // Persiapkan statement
    $stmt = mysqli_prepare($conn, $query);

    // Periksa apakah statement berhasil disiapkan
    if ($stmt) {
        // Bind parameter ke statement
        mysqli_stmt_bind_param($stmt, "sssssi", $province, $city, $district, $street, $postcode, $adid);

        // Eksekusi statement
        $cek = mysqli_stmt_execute($stmt);

        // Periksa apakah eksekusi berhasil
        if ($cek) {
            header('Location: ../../halaman/read/halalamatuser2.php?statusedit=sukses');
        } else {
            header('Location: ../../halaman/lainnya/editalamat.php?statusedit=gagal&error=' . mysqli_error($conn));
        }

        // Tutup statement
        mysqli_stmt_close($stmt);
    } else {
        // Jika gagal menyiapkan statement
        header('Location: ../../halaman/lainnya/editalamat.php?statusedit=gagal&error=' . mysqli_error($conn));
    }
} else {
    // Jika tombol Edit tidak ditekan
    die("Akses terlarang!");
}
?>
