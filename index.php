<?php
include 'koneksi.php';
include 'function.php';

// Menghitung statistik tugas harian
$total = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tasks"));
$done  = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tasks WHERE status = 'Completed'"));
$prog  = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tasks WHERE status = 'In Progress'"));
$pend  = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tasks WHERE status = 'Pending'"));

include 'header.php';
?>

<!-- Header Banner Utama Menyapa Dhaevita -->
<div class="card akasha-card p-5 text-center mb-4 border-2" style="background: linear-gradient(rgba(255,255,255,0.9), rgba(255,255,255,0.95));">
    <h2 class="display-6 fw-bold">Hi Dhaevita, Ada kegiatan apa hari ini?</h2>
    <p class="text-muted fs-5 mt-2 mb-0">Ayo cek jadwal kegiatanmu di Akasha Terminal.</p>
</div>

<!-- Grid Statistik Tugas -->
<div class="row mb-5 text-center">
    <div class="col-6 col-lg-3 mb-2">
        <div class="card akasha-card p-3 shadow-sm">
            <span class="text-muted small d-block">📊 Total Tugas</span>
            <h3 class="fw-bold mb-0 text-dark"><?= $total; ?></h3>
        </div>
    </div>
    <div class="col-6 col-lg-3 mb-2">
        <div class="card akasha-card p-3 shadow-sm border-success">
            <span class="text-success small d-block">✅ Selesai</span>
            <h3 class="fw-bold mb-0 text-success"><?= $done; ?></h3>
        </div>
    </div>
    <div class="col-6 col-lg-3 mb-2">
        <div class="card akasha-card p-3 shadow-sm border-info">
            <span class="text-info small d-block">🔵 Dalam Proses</span>
            <h3 class="fw-bold mb-0 text-info"><?= $prog; ?></h3>
        </div>
    </div>
    <div class="col-6 col-lg-3 mb-2">
        <div class="card akasha-card p-3 shadow-sm border-warning">
            <span class="text-warning small d-block">⏳ Belum Selesai</span>
            <h3 class="fw-bold mb-0 text-warning"><?= $pend; ?></h3>
        </div>
    </div>
</div>

<!-- Kategori Tema Tugas Harian -->
<h4 class="mb-3 text-success">🌿 Kategori Agenda Harian</h4>
<div class="row mb-4">
    <?php
    $categories = [
        'Alhaitham' => ['📚 Akademik & Kuliah', 'Haravatat'],
        'Kaveh'     => ['🏛️ Kreatif & Coding', 'Kshahrewar'],
        'Tighnari'  => ['🌿 Kesehatan & Diri', 'Amurta'],
        'Cyno'      => ['⚡ Organisasi & UKM', 'Spantamad']
    ];
    foreach($categories as $key => $info) {
        $count = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tasks WHERE scholar_name='$key' AND status!='Completed'"));
    ?>
    <div class="col-md-3 col-6 mb-3">
        <div class="card character-card text-center p-4">
            <h5 class="mb-1 text-warning fw-bold" style="font-size: 1.1rem;"><?= $info[0]; ?></h5>
            <small class="text-white-50 d-block mb-3">Darshan: <?= $info[1]; ?></small>
            <span class="badge bg-light text-dark rounded-pill px-3 py-2"><?= $count; ?> Tugas Aktif</span>
        </div>
    </div>
    <?php } ?>
</div>

<div class="text-center mt-4">
    <a href="daftar.php" class="btn btn-sumeru btn-lg px-5">Buka Lembar Daftar Tugas 📜</a>
</div>

<?php include 'footer.php'; ?>