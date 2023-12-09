<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/style2.css">
    <script src="../../../js/script.js" defer></script>
	<title>Login</title>
</head>

<body>
    <div class="all">
        <div class="konten">
            <div class="tabel">
                <header>
                    <h3>Login Page</h3>
                </header>
                <form action="../../proses/lainnya/proseslogin.php" method="POST">
                <p>
                    <label for="usr_idemail"><b>Username/Email</b> </label>
                    <input type="text" name="usr_idemail" placeholder="Username/Email" />
                </p>
                <p>
                    <label for="usr_pass"><b>Password</b> </label>
                    <input type="password" name="usr_pass" placeholder="Password" />

                <div class="sub"><p>
                    <input type="submit" value="Log in" name="login" /></p>
                </div>
                <div class="pindah">
                    <p>Belum Memiliki Akun?<a href="haldaftar.php"> Daftar</a></p>
                </div>
            </div>
            <div class="logo">
                <img src="../../../css/gambar/logonobg.png" alt="logo">
                <p style="color: white">I See PC</p>
            </div>
        </div>
    </div>
	</form>
	</body>
</html>



<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style2.css">
    <script src="script.js" defer></script>
	<title>Pembuatan Akun I See PC</title>
</head>

<body>
    <div class="all">
        <div class="tabel">
            <header>
                <h3>Login</h3>
            </header>
            <form action="" method="POST">
            <p>
                <label for="usr_idemail">Username/Email </label>
                <input type="text" name="usr_idemail" placeholder="Username/Email" />
            </p>
            <p>
                <label for="password">Password </label>
                <input type="password" name="usr_pass" placeholder="Password" />

            <div class="sub"><p>
                <input type="submit" value="Log in" name="login" />
            </p></div>
        </div>
    </div>
	</form>

	</body>
</html> -->