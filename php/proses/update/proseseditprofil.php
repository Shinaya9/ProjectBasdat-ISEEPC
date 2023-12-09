<?php
include("../../conn/config.php");
session_start();

// Cek apakah tombol Edit ditekan
if (isset($_POST['update_profil'])) {

    // Ambil data dari formulir profil
    $usid = $_SESSION['user']['usr_id'];
    $fname = $_POST['usr_fname'];
    $lname = $_POST['usr_lname'];
    $email = $_POST['usr_email'];
    $phonenum = $_POST['usr_phonum'];

    // Proses upload gambar
    $upload_dir = "../../../uploads/";
    $usr_pic = $_FILES['usr_pic']['name'];
    $usr_pic_tmp = $_FILES['usr_pic']['tmp_name'];
    $usr_pic_path = $upload_dir . $usr_pic;
    move_uploaded_file($usr_pic_tmp, $usr_pic_path);

    // Perbarui data user
    $query = "UPDATE `user` SET `usr_fname`=?, `usr_lname`=?, `usr_phonum`=?, `usr_pic`=? WHERE `usr_id`=?";

    // Persiapkan statement
    $stmt = mysqli_prepare($conn, $query);

    // Periksa apakah statement berhasil disiapkan
    if ($stmt) {
        // Bind parameter ke statement
        mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $phonenum, $usr_pic, $usid);

        // Eksekusi statement
        $cek = mysqli_stmt_execute($stmt);

        // Periksa apakah eksekusi berhasil
        if ($cek) {
            header('Location: ../../halaman/read/halprofil.php?statusedit=sukses');
        } else {
            header('Location: ../../halaman/lainnya/editprofil.php?statusdaftar=gagal');
        }

        // Tutup statement
        mysqli_stmt_close($stmt);
    } else {
        // Jika gagal menyiapkan statement
        header('Location: ../../halaman/lainnya/editprofil.php?statusdaftar=gagal');
    }
} else {
    // Jika tombol Edit tidak ditekan
    die("Akses terlarang!");
}
?>
