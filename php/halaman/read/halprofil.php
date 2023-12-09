<?php
include("../../conn/config.php");
session_start();

// Get the user_id from the session
$usid = mysqli_real_escape_string($conn, $_SESSION['user']['usr_id']);

// Query to retrieve the user profile based on the session user_id
$profil_query = "SELECT * FROM user WHERE usr_id = '$usid'";

// Execute the query
$result_profil = mysqli_query($conn, $profil_query);

if (!$result_profil) {
    die("Error dalam sistem: " . mysqli_error($conn));
}

// Ambil data user dari hasil query
$user = mysqli_fetch_assoc($result_profil);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../css/userprofile.css">
	<title>Profile</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <input type="checkbox" id="check">
            <label for="check">
                <i class="fa-solid fa-bars" style="color: #000000;" id="btn"></i>
                <i class="fa-solid fa-times" id="cancel" style="position: fixed; top: 6%;"></i>
            </label>
            <div class="sidebar">
                <header>
                <p><img src="../../../css/gambar/logonobg.png" alt="logo" style="height: 50px; width:50px;">   I See PC</p>
                </header>
                <ul>
                    <li style="height: 60px;"><a href="../lainnya/homepage2.php"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li style="height: 60px;"><a href="explorepage.php"><i class="fa-solid fa-magnifying-glass"></i> Explore</a></li>
                    <li style="height: 60px;"><a href="myproduct2.php"><i class="fa-solid fa-plus" style="color: #000000;"></i>My Product</a></li>
                    <li style="height: 60px;"><a href="halprofil.php"><i class="fa-solid fa-user" style="color: #000000;"></i> User</a></li>
                    <li style="height: 60px;"><a href="contact.php"><i class="fa-regular fa-address-book"></i>Contact Us</a></li>
                    <li style="height: 60px;"><a href="../../proses/lainnya/proseslogout.php"><i class="fa-solid fa-right-from-bracket" style="color: #000000;"></i>Log out</a></li>
                </ul>
            </div>
            <section>
                <div class="isi">
                    <div class="headerisi">
                        <div class="profile"><a href="halprofil.php">My Profile</a></div>
                        <div class="alamat"><a href="halalamatuser2.php">Alamat User</a></div>
                        <div class="payment"><a href="myorder(seller).php">Order</a></div>
                    </div>
                    <div class="semua">
                        <div class="kiri">
                            <div class="barang">
                                <img src="../../../uploads/<?= basename($user['usr_pic']); ?>" alt="Profile Picture">
                            </div>
                            <div class="edit">
                                <a href="../lainnya/editprofil.php?id=<?= $user['usr_id']; ?>">Edit Profil</a>
                            </div>
                        </div>
                        <div class="kanan">
                            <p>
                                <strong>Username    :</strong> <?= $user['usr_id']; ?>
                            </p>
                            <p>
                                <strong>Nama Lengkap    :</strong> <?= $user['usr_fname'] . " " . $user['usr_lname']; ?>
                            </p>
                            <p>
                                <strong>Nomor HP    :</strong> <?= $user['usr_phonum']; ?>
                            </p>
                            <p>
                                <strong>Email   :</strong> <?= $user['usr_email']; ?>
                            </p>
                            <div class="hapus-btn">
                                <?php
                                echo "<a href='javascript:void(0);' data-userid='".$user['usr_id']."'>Hapus</a>";
                                ?>
                            </div>
                            <!-- Skrip JavaScript -->
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    // Temukan semua elemen dengan class 'hapus-btn'
                                    var hapusButtons = document.querySelectorAll('.hapus-btn');

                                    // Tambahkan event listener untuk setiap tombol 'Hapus'
                                    hapusButtons.forEach(function (button) {
                                        button.addEventListener('click', function () {
                                            // Munculkan konfirmasi pop-up
                                            var konfirmasi = confirm('Apakah Anda yakin ingin menghapus akun ini?');

                                            // Jika pengguna menekan "OK", lanjutkan dengan penghapusan
                                            if (konfirmasi) {
                                                // Ambil user id dari atribut data
                                                var userId = button.getAttribute('data-userid');

                                                // Redirect ke halaman untuk menghapus akun
                                                window.location.href = '../../proses/delete/proseshapusakun.php?id=' + userId;
                                            }
                                        });
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </section>
</body>
</html>