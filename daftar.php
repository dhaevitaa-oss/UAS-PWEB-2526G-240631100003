<?php
include 'koneksi.php';
include 'function.php';

$search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';
$filter = isset($_GET['filter']) ? mysqli_real_escape_string($koneksi, $_GET['filter']) : '';

$queryStr = "SELECT * FROM tasks WHERE judul LIKE '%$search%'";
if ($filter != '') { $queryStr .= " AND scholar_name = '$filter'"; }
$queryStr .= " ORDER BY id DESC";
$sql = mysqli_query($koneksi, $queryStr);

include 'header.php';
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div>
        <h1 class="h2">Daftar Tugas Harian</h1>
        <p class="text-muted">Lihat, cari, dan kelola semua agenda kegiatan yang telah kamu catat.</p>
    </div>
</div>

<!-- Pencarian & Filter -->
<div class="card akasha-card p-3 mb-4">
    <form method="GET" action="daftar.php" class="row g-2">
        <div class="col-md-6">
            <input type="text" name="search" class="form-control" placeholder="Cari agenda harian..." value="<?= htmlspecialchars($search); ?>">
        </div>
        <div class="col-md-4">
            <select name="filter" class="form-select">
                <option value="">Semua Kategori</option>
                <option value="Alhaitham" <?= $filter == 'Alhaitham' ? 'selected' : ''; ?>>📚 Akademik & Kuliah</option>
                <option value="Kaveh" <?= $filter == 'Kaveh' ? 'selected' : ''; ?>>🏛️ Kreatif & Coding</option>
                <option value="Tighnari" <?= $filter == 'Tighnari' ? 'selected' : ''; ?>>🌿 Kesehatan & Diri</option>
                <option value="Cyno" <?= $filter == 'Cyno' ? 'selected' : ''; ?>>⚡ Organisasi & UKM</option>
            </select>
        </div>
        <div class="col-md-2 d-grid">
            <button type="submit" class="btn btn-sumeru">Filter 🔍</button>
        </div>
    </form>
</div>

<!-- Tabel Data Utama -->
<div class="card akasha-card p-3 shadow-sm">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light" style="border-bottom: 2px solid var(--sumeru-gold);">
                <tr>
                    <th>No</th>
                    <th>Agenda / Kegiatan Harian</th>
                    <th>Kategori Tugas</th>
                    <th>Nama Darshan</th>
                    <th>Prioritas</th>
                    <th>Batas Waktu</th>
                    <th>Status</th>
                    <th class="text-center">Aksi Cepat</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                while($row = mysqli_fetch_assoc($sql)) { 
                    $badgeClass = 'badge-pending';
                    $statusIndo = 'Belum Selesai';
                    
                    if($row['status'] == 'Completed') {
                        $badgeClass = 'badge-completed';
                        $statusIndo = 'Selesai';
                    } elseif($row['status'] == 'In Progress') {
                        $badgeClass = 'badge-progress';
                        $statusIndo = 'Dalam Proses';
                    }
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><strong><?= htmlspecialchars($row['judul']); ?></strong></td>
                    <td>
                        <?php
                        if($row['scholar_name'] == 'Alhaitham') echo "📚 Kuliah";
                        elseif($row['scholar_name'] == 'Kaveh') echo "🏛️ Coding/Desain";
                        elseif($row['scholar_name'] == 'Tighnari') echo "🌿 Pribadi/Sehat";
                        else echo "⚡ Organisasi";
                        ?>
                    </td>
                    <td><span class="text-muted small"><?= htmlspecialchars($row['darshan']); ?></span></td>
                    <td>
                        <span class="fw-semibold <?= $row['prioritas'] == 'Tinggi' ? 'text-danger' : ($row['prioritas'] == 'Sedang' ? 'text-warning' : 'text-success'); ?>">
                            <?= htmlspecialchars($row['prioritas']); ?>
                        </span>
                    </td>
                    <td><?= formatTanggalAkasha($row['deadline']); ?></td>
                    <td><span class="badge <?= $badgeClass; ?> p-2 rounded-2"><?= $statusIndo; ?></span></td>
                    <td class="text-center">
                        <?php if($row['status'] != 'Completed'): ?>
                            <a href="edit.php?id=<?= $row['id']; ?>&action=quick_complete" class="btn btn-sm btn-success text-white me-1" title="Tandai Selesai">✅</a>
                        <?php else: ?>
                            <span class="text-success me-2" title="Misi Selesai">🌟</span>
                        <?php endif; ?>

                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-warning text-dark me-1" title="Edit">✍️</a>
                        <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus agenda ini?')" title="Hapus">🗑️</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>