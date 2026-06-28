<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "todo_app";

// Pastikan variabel di bawah ini menggunakan huruf kecil semua: $koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi ke database Akasha gagal: " . mysqli_connect_error());
}
?>