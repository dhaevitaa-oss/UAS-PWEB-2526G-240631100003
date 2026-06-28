<?php
// Mengikutkan file koneksi database
include 'koneksi.php';

// Memastikan parameter ID terkirim lewat URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);

    // Query DELETE untuk menghapus data berdasarkan ID
    $queryDelete = "DELETE FROM tasks WHERE id = '$id'";

    if (mysqli_query($koneksi, $queryDelete)) {
        echo "<script>alert('Document successfully purged from Akasha Terminal!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Failed to delete document: " . mysqli_error($koneksi) . "'); window.location='index.php';</script>";
    }
} else {
    // Jika tidak ada parameter ID, kembalikan ke halaman utama
    header('Location: index.php');
    exit;
}
?>