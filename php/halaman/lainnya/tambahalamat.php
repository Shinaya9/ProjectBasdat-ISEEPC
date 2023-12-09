<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../css/tambahalamat.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>tambah alamat</title>
</head>
<body>
    <div class="container">
        <div class="atas" style="height: 100px;">
            <p>Alamat Baru</p>
            <div class="logo">
                <p><img src="../../../css/gambar/logonobg.png" 
                alt="logo">   I See PC</p>
            </div>
        </div>
        <form action="../../proses/create/prosesbuatalamat.php" method="post">
            <div class="isi">
                <div class="form">
                    <div class="isian">
                        <p>Provinsi</p>
                        <input type="text" name="province" required>
                    </div>
                    <div class="isian">
                        <p>Kabupaten</p>
                        <input type="text" name="city" required>
                    </div>
                    <div class="isian">
                        <p>Kecamatan</p>
                        <input type="text" name="district" required>
                    </div>
                    <div class="isian">
                        <p>Jalan/detail</p>
                        <input type="text" name="street" required>
                    </div>
                    <div class="isian">
                        <p>Kode Pos</p>
                        <input type="text" name="postcode" required>
                    </div>
                </div>
                <div class="saran">
                    <p>Disarankan untuk pengisian alamat rumah hanya nomor rumah dan RT/RW atau bloknya saja.</p>
                </div>
            </div>
            <button class="simpan" type="submit" name="tambah_alamat">
                    Save Alamat
            </button>
        </form>
    </div>
</body>