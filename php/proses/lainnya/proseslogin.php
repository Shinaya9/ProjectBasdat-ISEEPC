<?php
include("../../conn/config.php");
session_start();

if (isset($_POST['login'])) {
    $usidemail = $_POST['usr_idemail'];
    $upass = $_POST['usr_pass'];

    $query = "SELECT * FROM user WHERE usr_id = ? OR usr_email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $usidemail, $usidemail);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Periksa apakah password sesuai
        if ($upass === $row['usr_pass']) {
            // Login sukses
            $_SESSION['user'] = $row;
            header('Location: ../../halaman/lainnya/homepage2.php?statuslogin=sukses');
            exit;
        } else {
            // Password tidak cocok
            header('Location: ../../halaman/lainnya/hallogin.php?statuslogin=gagal&reason=password');
            exit;
        }
    } else {
        // Akun tidak ditemukan
        header('Location: ../../halaman/lainnya/hallogin.php?statuslogin=gagal&reason=notfound');
        exit;
    }
} else {
    die("Akses terlarang!");
}
?>
