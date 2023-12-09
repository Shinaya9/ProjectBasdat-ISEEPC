<?php
include("../../conn/config.php");
session_start();

if (isset($_POST['tambah_produk'])) {
    //ambil data dari form
    $puid = $_SESSION['user']['usr_id'];
    $pname = $_POST['prd_name'];
    $pcond = $_POST['prd_condition'];
    $ptype = $_POST['prd_type'];
    $pdesc = $_POST['prd_desc'];
    $pprice = $_POST['prd_price'];

    // Proses upload gambar
    $upload_dir = "../../../uploads/";
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

    //buat query
    $query_masukkan = "INSERT INTO `product`(`prd_uid`,`prd_name`,`prd_condition`, `prd_type`, `prd_desc`, `prd_price`, `prd_pic`) VALUES ('$puid','$pname','$pcond','$ptype','$pdesc','$pprice','$prd_pic')";

    $cek = mysqli_query($conn, $query_masukkan);

    if ($cek == TRUE) {
        // Retrieve the last inserted product ID
        $last_inserted_id = mysqli_insert_id($conn);

        if ($ptype == "Komputer/Laptop") {
            //ambil data dari form
            $pcproc = $_POST['pc_processor'];
            $pcmemo = $_POST['pc_mem'];
            $pcgraph = $_POST['pc_graph'];
            $pcstrg = $_POST['pc_storage'];
            $pcdis = $_POST['pc_display'];
            $pcop = $_POST['pc_opsys'];

            //buat query untuk produk PC
            $query_pc = "INSERT INTO `pc`(`pc_pid`, `pc_processor`, `pc_mem`, `pc_graph`, `pc_storage`, `pc_display`, `pc_opsys`) VALUES ('$last_inserted_id','$pcproc','$pcmemo','$pcgraph','$pcstrg','$pcdis','$pcop')";

            $ceklagi = mysqli_query($conn, $query_pc);

            if ($ceklagi == TRUE) {
                header('Location: ../../halaman/read/myproduct2.php?statusupload=sukses');
            } else {
                header('Location: ../../halaman/read/myproduct2.php?statusupload=gagal');
            }
        } else {
            // Jika $ptype bukan "Komputer/Laptop", lakukan sesuatu yang sesuai dengan kebutuhan Anda
            // Misalnya, Anda ingin melakukan redirect ke halaman lain
            header('Location: ../../halaman/read/myproduct2.php?statusupload=sukses');
            exit;
        }
    } else {
        header('Location: ../../halaman/read/myproduct2.php?statusupload=gagal');
        exit;
    }
} else {
    die("terjadi kesalahan system");
}
?>
