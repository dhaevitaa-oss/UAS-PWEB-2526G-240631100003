<?php
include 'koneksi.php';
include 'function.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $scholar_name = mysqli_real_escape_string($koneksi, $_POST['scholar_name']);
    $judul        = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $deskripsi    = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $prioritas    = mysqli_real_escape_string($koneksi, $_POST['prioritas']);
    $deadline     = mysqli_real_escape_string($koneksi, $_POST['deadline']);
    $status       = mysqli_real_escape_string($koneksi, $_POST['status']);
    
    $darshan = getDarshan($scholar_name);

    $query = "INSERT INTO tasks (scholar_name, darshan, judul, deskripsi, prioritas, deadline, status) 
              VALUES ('$scholar_name', '$darshan', '$judul', '$deskripsi', '$prioritas', '$deadline', '$status')";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Agenda berhasil disinkronisasi ke Akasha Terminal!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal mencatat agenda: " . mysqli_error($koneksi) . "');</script>";
    }
}

include 'header.php';
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div>
        <h1 class="h2">Tambah Agenda Harian baru</h1>
        <p class="text-muted">Catat rencana aktivitas harianmu ke dalam database sistem manajemen Akasha.</p>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card akasha-card p-4">
            <form method="POST" action="tambah.php">
                
                <div class="mb-3">
                    <label for="scholar_name" class="form-label fw-bold">🌿 Pilih Kategori Aktivitas (Tema Karakter)</label>
                    <select name="scholar_name" id="scholar_name" class="form-select" required>
                        <option value="">-- Pilih Jenis Kegiatan --</option>
                        <option value="Alhaitham">📚 Kuliah / Tugas Akademik (Haravatat)</option>
                        <option value="Kaveh">🏛️ Coding / Proyek Kreatif (Kshahrewar)</option>
                        <option value="Tighnari">🌿 Kegiatan Pribadi / Skincare / Kesehatan (Amurta)</option>
                        <option value="Cyno">⚡ Urusan Organisasi / Kepanitiaan Penting (Spantamad)</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="judul" class="form-label fw-bold">📜 Nama / Judul Kegiatan</label>
                    <input type="text" name="judul" id="judul" class="form-control" placeholder="Contoh: Belajar CRUD PHP Pemrograman Web" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-bold">📝 Rincian Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" placeholder="Tulis catatan atau rincian detail langkah pengerjaan kegiatan ini..." required></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="prioritas" class="form-label fw-bold">💎 Skala Prioritas</label>
                        <select name="prioritas" id="prioritas" class="form-select" required>
                            <option value="Rendah">🟢 Rendah</option>
                            <option value="Sedang" selected>🟡 Sedang</option>
                            <option value="Tinggi">🔴 Tinggi</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="deadline" class="form-label fw-bold">📅 Batas Waktu (Deadline)</label>
                        <input type="date" name="deadline" id="deadline" class="form-control" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="status" class="form-label fw-bold">⚙️ Status Pengerjaan</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="Pending" selected>⚪ Belum Selesai</option>
                        <option value="In Progress">🔵 Dalam Proses</option>
                        <option value="Completed">🟢 Selesai</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-secondary">⬅️ Kembali</a>
                    <div>
                        <button type="reset" class="btn btn-outline-danger me-2">Kosongkan</button>
                        <button type="submit" class="btn btn-sumeru">Simpan ke Akasha 🏛️</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>