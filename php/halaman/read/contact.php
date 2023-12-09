<?php
include("../../conn/config.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../css/contact.css">
	<title>Contact</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <input type="checkbox" id="check">
            <label for="check">
                <i class="fa-solid fa-bars" style="color: #000000;" id="btn"></i>
                <i class="fa-solid fa-times" id="cancel"></i>
            </label>
            <div class="sidebar">
                <header>
                <p><img src="../../../css/gambar/logonobg.png" alt="logo">   I See PC</p></header>
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
                <div class="contact">
                    <p>Contact Us</p>
                </div>
                <p>Instagram : Iseepc</p>
                <p>Twitter : Iseepc</p>
                <p>Phone Number : (+62) 812-3456-7890</p>
            </section>
        </div>
    </div>
</body>