<?php
include ("../../conn/config.php");
session_start();

if (isset($_POST['update_produk'])){
    //ambil data dari form
    $pid = $_POST['prd_id'];
    $pname = $_POST['prd_name'];
    $pcond = $_POST['prd_condition'];
    $ptype = $_POST['prd_type'];
    $pdesc = $_POST['prd_desc'];
    $pprice = $_POST['prd_price'];
    
    // Proses upload gambar hanya jika ada file yang diunggah
if (!empty($_FILES['prd_pic']['name'])) {
    $prd_pic = $_FILES['prd_pic']['name'];
    $prd_pic_tmp = $_FILES['prd_pic']['tmp_name'];
    $prd_pic_path = $upload_dir . $prd_pic;
    move_uploaded_file($prd_pic_tmp, $prd_pic_path);

    // Pastikan berkas adalah gambar
    $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
    if (!in_array($_FILES['prd_pic']['type'], $allowed_types)) {
        // Tambahkan pesan kesalahan jika tipe berkas tidak diizinkan
        header('Location: ../../halaman/lainnya/tambahproduk.php?statusupload=gagal&type=invalid');
        exit;
    }
} else {
    // Jika tidak ada gambar baru diunggah, pertahankan gambar lama
    $query_get_old_pic = "SELECT `prd_pic` FROM `product` WHERE `prd_id` = ?";
    $stmt_get_old_pic = mysqli_prepare($conn, $query_get_old_pic);
    mysqli_stmt_bind_param($stmt_get_old_pic, "i", $pid);
    mysqli_stmt_execute($stmt_get_old_pic);
    mysqli_stmt_store_result($stmt_get_old_pic);

    if (mysqli_stmt_num_rows($stmt_get_old_pic) > 0) {
        // Ambil path gambar lama
        mysqli_stmt_bind_result($stmt_get_old_pic, $old_pic_path);
        mysqli_stmt_fetch($stmt_get_old_pic);

        // Gunakan gambar lama jika ada
        $prd_pic_path = $old_pic_path;
    }
}

//buat query
$query_edit_produk = "UPDATE `product` SET `prd_name`=?, `prd_condition`=?, `prd_type`=?, `prd_desc`=?, `prd_price`=?, `prd_pic`=? WHERE `prd_id` = ?";
$stmt = mysqli_prepare($conn, $query_edit_produk);
mysqli_stmt_bind_param($stmt, "ssssdsi", $pname, $pcond, $ptype, $pdesc, $pprice, $prd_pic_path, $pid);
mysqli_stmt_execute($stmt);

// ...

    if ($stmt) {
        if ($ptype == "Komputer/Laptop"){
            //ambil data dari form
            $pcproc = $_POST['pc_processor'];
            $pcmemo = $_POST['pc_mem'];
            $pcstrg = $_POST['pc_storage'];
            $pcgraph = $_POST['pc_graph'];
            $pcdis = $_POST['pc_display'];
            $pcop = $_POST['pc_opsys'];

            //buat query untuk produk PC
            $query_edit_pc = "UPDATE `pc` SET `pc_processor`=?, `pc_mem`=?, `pc_storage`=?,`pc_graph`=?, `pc_display`=?, `pc_opsys`=? WHERE pc_pid=?";
            $stmt_pc = mysqli_prepare($conn, $query_edit_pc);
            mysqli_stmt_bind_param($stmt_pc, "ssssssi", $pcproc, $pcmemo, $pcstrg, $pcgraph, $pcdis, $pcop, $pid);
            $ceklagi = mysqli_stmt_execute($stmt_pc);
            
            if ($ceklagi) {
                header('Location: ../../halaman/read/myproduct2.php?statusupdate=sukses');
            } else {
                header('Location: ../../halaman/read/myproduct2.php?statusupdate=gagal');
            }
        } else {
            header('Location: ../../halaman/read/myproduct2.php?statusupdate=sukses');
        }
    } else {
        header('Location: ../../halaman/read/myproduct2.php?statusupdate=gagal');
    }
} else {
    die("Terjadi kesalahan sistem");
}
?>
