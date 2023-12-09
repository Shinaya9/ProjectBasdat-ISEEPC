<?php
include("../../conn/config.php");
session_start();

// Ambil data User berdasarkan ID
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $query = "SELECT * FROM user WHERE usr_id = ?";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        // User tidak ditemukan, atur atau tangani sesuai kebutuhan
        echo "User tidak ditemukan.";
        exit;
    }
} else {
    // ID User tidak disediakan, atur atau tangani sesuai kebutuhan
    echo "ID User tidak diberikan.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/editprofile.css">
	<title>Profile</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="atas" style="height: 100px;">
            <p>Edit Profile</p>
            <div class="logo">
                <p><img src="../../../css/gambar/logonobg.png" alt="logo"> I See PC</p>
            </div>
        </div>
        <form action="../../proses/update/proseseditprofil.php" method="POST" enctype="multipart/form-data">
        <div class="foto">
            <div class="pp" id="previewImage">
                <img src="../../../uploads/<?= basename($user['usr_pic']); ?>" alt="Profile Picture" style='max-width: 184px; max-height: 184px;'>
            </div>

            <div class="desk">
                <p>Upload foto dari device anda, foto harus berbentuk kotak, dengan minimal ukuran 184x184px.</p>
                <div class="confirm" id="customFileInput" style="margin:0px;">
                    Ganti Foto Profil
                    <input type="file" name="usr_pic" accept="image/*" style="display: none;" id="FileInput">
                </div>
                <script>
                document.getElementById('customFileInput').addEventListener('click', function() {
                    // Ketika div diklik, kirim klik ke elemen input file tersembunyi
                    document.querySelector('input[name="usr_pic"]').click();
                });
                document.getElementById('FileInput').addEventListener('change', function(event) {
                    // Mengambil elemen input file
                    var input = event.target;

                    // Memastikan bahwa file telah dipilih
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        // Mengatur fungsi callback ketika pembacaan selesai
                        reader.onload = function(e) {
                            // Mengupdate sumber gambar pada elemen div.pp
                            document.getElementById('previewImage').getElementsByTagName('img')[0].src = e.target.result;
                        };

                        // Membaca file gambar sebagai URL data
                        reader.readAsDataURL(input.files[0]);
                    }
                });
                </script>
            </div>
        </div>
        <div class="data">
            <div class="usn">
                <h3>Username</h3>
                <p><?= $user['usr_id'];?></p>
            </div>
            <br>
            <div class="kelompok1">
                <p>Nama Depan</p>
                <input type="text" name="usr_fname" value="<?= $user['usr_fname'];?>" placeholder="" />
            </div>
            <br>
            <div class="kelompok2">
                <p>Nama Belakang</p>
                <input type="text" name="usr_lname" value="<?= $user['usr_lname'];?>" placeholder="" />
            </div>
            <br>
            <div class="kelompok3">
                <p>Email</p>
                <input type="text" name="usr_email" value="<?= $user['usr_email'];?>" placeholder="Username" readonly/>
            </div>
            <br>
            <div class="kelompok4">
                <p>Nomor HP</p>
                <input type="tel" name="usr_phonum" value="<?= $user['usr_phonum'];?>" placeholder="08xxxxxxxxxx" />
            </div>
            
        </div>
        <br>
        <button class="save" type="submit" name="update_profil">
            Save Edit
        </button>
        </form>
    </div>
</body>
</html>
