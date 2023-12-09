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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/homepage2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>I See PC Homepage</title>
</head>

<body>
    <div class="container">
        <section style="height:325px">
            <div class="isi">
                <img src="../../../css/gambar/logonobg.png" alt="logo">
                <p><b>Selamat Datang di I See PC</b></p>
            </div> 
            <p>Wadah Terbaik untuk Menemukan dan Menjual Laptop Impianmu!</p>
            <br>
            <h2>Halo, <?=  $user['usr_id'] ?>!</h2>
            <br>
            <div class="explore">
                <p>Ayo Cari PC Yang Kamu Inginkan </p>
                <a href="../read/explorepage.php">Disini</a>
            </div>
            <br><br>
        </section>
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fa-solid fa-bars" style="color: #000000;" id="btn"></i>
            <i class="fa-solid fa-times" id="cancel" style="position: fixed; top: 6%;"></i>
        </label>

        <div class="sidebar">
            <header>
                <p><img src="../../../css/gambar/logonobg.png" alt="logo">   ISeePC</p>
            </header>
            <ul>
            <li style="height: 60px;"><a href="../lainnya/homepage2.php"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li style="height: 60px;"><a href="../read/explorepage.php"><i class="fa-solid fa-magnifying-glass"></i> Explore</a></li>
                    <li style="height: 60px;"><a href="../read/myproduct2.php"><i class="fa-solid fa-plus" style="color: #000000;"></i>My Product</a></li>
                    <li style="height: 60px;"><a href="../read/halprofil.php"><i class="fa-solid fa-user" style="color: #000000;"></i> User</a></li>
                    <li style="height: 60px;"><a href="contact.html"><i class="fa-regular fa-address-book"></i>Contact Us</a></li>
                    <li style="height: 60px;"><a href="../../proses/lainnya/proseslogout.php"><i class="fa-solid fa-right-from-bracket" style="color: #000000;"></i>Log out</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
