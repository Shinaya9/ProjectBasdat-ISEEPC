<?php
// Mulai sesi (pastikan ini ada di awal setiap halaman yang memerlukan akses terotentikasi)
session_start();

// Hancurkan semua variabel sesi
$_SESSION = array();

// Hancurkan sesi
session_destroy();

// Alihkan ke halaman login atau halaman lain yang sesuai
header('Location: ../../halaman/lainnya/homepage.php');
exit;
?>
