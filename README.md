\# Akasha Task Manager - Project UAS Pemrograman Web



\### 👤 Identitas Mahasiswa

\- \*\*Nama:\*\* Dhaevita Amartika

\- \*\*NIM:\*\* 240631100003

\- \*\*Kelas / Prodi:\*\* Pendidikan Informatika (Semester 4)

\- \*\*Mata Kuliah:\*\* Pemrograman Web



\---



\### 🏛️ Deskripsi Aplikasi

\*\*Akasha Task Manager\*\* adalah aplikasi To-Do List berbasis web sederhana yang dirancang khusus untuk mengelola agenda dan kegiatan harian mahasiswa. Aplikasi ini dibungkus dengan visual estetika bertema \*Akademia Sumeru (Genshin Impact)\*, di mana setiap jenis aktivitas dikelompokkan ke dalam 4 kategori Darshan (Akademik, Kreatif/Coding, Kesehatan/Pribadi, dan Organisasi).



\### 🛠️ Fitur Utama Aplikasi

1\. \*\*Dashboard Statistik harian\*\* (Menghitung otomatis jumlah total agenda, proses, dan selesai).

2\. \*\*Manajemen CRUD Lengkap\*\* (Tambah agenda, tampil data, ubah data, dan hapus berkas).

3\. \*\*Fitur Filter Cepat \& Pencarian\*\* berdasarkan kata kunci judul kegiatan harian.

4\. \*\*Tombol Selesai Cepat (Quick Complete)\*\* menggunakan shortcut centang langsung dari baris tabel dashboard.

5\. \*\*Responsive Desain\*\* menggunakan Bootstrap 5 (Sangat rapi diakses via Laptop, Android, maupun iPhone).



\---



\### 🗃️ Struktur Database Table (`tasks`)

\- `id` (INT, Primary Key, Auto Increment)

\- `scholar\_name` (VARCHAR) -> Penentu Kategori Tema

\- `darshan` (VARCHAR) -> Otomatisasi via PHP Backend

\- `judul` (VARCHAR) -> Nama Agenda Kegiatan

\- `deskripsi` (TEXT) -> Detail Catatan

\- `prioritas` (VARCHAR) -> Tinggi / Sedang / Rendah

\- `deadline` (DATE) -> Batas Waktu

\- `status` (VARCHAR) -> Pending / In Progress / Completed

\- `created\_at` (TIMESTAMP)



\---



\### 🚀 Cara Menjalankan Aplikasi Lokal

1\. Pastikan folder proyek ini berada di direktori `C:\\xamppp\\htdocs\\UAS-PWEB-240631100003\\`.

2\. Aktifkan modul \*\*Apache\*\* dan \*\*MySQL\*\* pada XAMPP Control Panel.

3\. Impor berkas `database.sql` ke dalam database server lokal baru bernama `todo\_app` lewat phpMyAdmin atau Command Prompt (CMD).

4\. Akses link berikut melalui browser pilihan Anda: `http://localhost/UAS-PWEB-240631100003/`



\---



\### 🤖 Pernyataan Penggunaan GenAI

Proyek aplikasi web ini dikembangkan dengan asistensi perangkat Kecerdasan Artifisial (GenAI) untuk optimasi struktur fungsi PHP native, penyesuaian query SQL, dan penyusunan komponen responsif UI Bootstrap 5.

