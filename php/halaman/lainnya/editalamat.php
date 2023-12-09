<?php
include("../../conn/config.php");
session_start();

// Ambil data produk berdasarkan ID
if (isset($_GET['id'])) {
    $addressId = $_GET['id'];

    $query_address = "SELECT * FROM alamat WHERE address_id = ?";

    $stmt = mysqli_prepare($conn, $query_address);
    mysqli_stmt_bind_param($stmt, "i", $addressId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


    if ($result  && mysqli_num_rows($result) > 0) {
        $address = mysqli_fetch_assoc($result);
    } else {
        // Alamat tidak ditemukan, atur atau tangani sesuai kebutuhan
        echo "Alamat tidak ditemukan.";
        exit;
    }
} else {
    // ID Alamat tidak disediakan, atur atau tangani sesuai kebutuhan
    echo "ID Alamat tidak diberikan.";
    exit;
}
?>

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
        <form action="../../proses/update/proseseditalamat.php" method="post">
            <input type="hidden" name="address_id" value="<?= $addressId; ?>">
            <div class="isi">
                <div class="form">
                    <div class="isian">
                        <p>Provinsi</p>
                        <input type="text" name="province" value="<?= $address['province']; ?>" required>
                    </div>
                    <div class="isian">
                        <p>Kabupaten</p>
                        <input type="text" name="city" value="<?= $address['city']; ?>" required>
                    </div>
                    <div class="isian">
                        <p>Kecamatan</p>
                        <input type="text" name="district" value="<?= $address['district']; ?>" required>
                    </div>
                    <div class="isian">
                        <p>Jalan/detail</p>
                        <input type="text" name="street" value="<?= $address['street']; ?>" required>
                    </div>
                    <div class="isian">
                        <p>Kode Pos</p>
                        <input type="text" name="postcode" value="<?= $address['postcode']; ?>" required>
                    </div>
                </div>
                <div class="saran">
                    <p>Disarankan untuk pengisian alamat rumah hanya nomor rumah dan RT/RW atau bloknya saja.</p>
                </div>
            </div>
            <button class="simpan" type="submit" name="update_alamat">
                    Simpan Perubahan
            </button>
        </form>
    </div>
</body>