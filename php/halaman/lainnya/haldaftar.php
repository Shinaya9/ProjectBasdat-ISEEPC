<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/style.css">
    <script src="../../../js/script.js" defer></script>
	<title>Daftar</title>
</head>

<body>
    <div class="all">
        <div class="konten">
            <div class="tabel">
                <header>
                    <h3>Register Page</h3>    
                </header>
            <form action="../../proses/create/prosesdaftar.php" method="POST">
                <p>
                    <label for="usr_id">Username</label><br>
                    <input type="text" name="usr_id" placeholder="Username" required />
                </p>
                <p>
                    <label for="usr_pass">Password (Minimal 8 karakter)</label><br>
                    <input type="password" name="usr_pass" placeholder="Password" pattern=".{8,}" required />
                </p>
                <div class="nama">
                    <p>
                        <label for="usr_fname">Nama Depan</label><br>
                        <input type="text" name="usr_fname" placeholder="Nama Depan" required />
                    </p>
                    <p>
                        <label for="usr_lname">Nama Belakang</label><br>
                        <input type="text" name="usr_lname" placeholder="Nama Belakang" required />
                    </p>
                </div>
                <p>
                    <label for="usr_phonum">No. Telp</label><br>
                    <input type="tel" name="usr_phonum" placeholder="08xxxxxxxxxx" required />
                </p>
                <p>
                    <label for="usr_email">Email</label><br>
                    <input type="email" name="usr_email" placeholder="example@gmail.com" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required />
                </p>
                <div class="sub">
                    <p>
                        <input type="submit" value="Sign up" name="daftar" />
                    </p>
                </div>
                <div class="pindah">
                    <p>
                        Sudah Memiliki Akun? <a href="hallogin.php"> Login</a>
                    </p>
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
