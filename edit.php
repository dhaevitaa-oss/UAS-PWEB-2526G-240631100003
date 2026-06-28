<?php
// Mengikutkan file koneksi dan fungsi wajib UAS
include 'koneksi.php';
include 'function.php';

// ================= FITUR BARU: SELESAI CEPAT (QUICK COMPLETE) =================
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'quick_complete') {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    
    // Query Update langsung mengubah status menjadi Completed
    $queryQuick = "UPDATE tasks SET status = 'Completed' WHERE id = '$id'";
    
    if (mysqli_query($koneksi, $queryQuick)) {
        echo "<script>alert('Misi harian berhasil diselesaikan! 🎉'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui status: " . mysqli_error($koneksi) . "'); window.location='index.php';</script>";
    }
    exit; // Menghentikan baris kode di bawahnya agar langsung redirect
}
// ==============================================================================

// Mendapatkan ID data yang akan diedit dari parameter URL (GET)
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}
$id = mysqli_real_escape_string($koneksi, $_GET['id']);

// Mengambil data lama dari database berdasarkan ID
$querySelect = mysqli_query($koneksi, "SELECT * FROM tasks WHERE id = '$id'");
$data = mysqli_fetch_assoc($querySelect);

// Jika data tidak ditemukan di database
if (!$data) {
    echo "<script>alert('Record not found in Akasha!'); window.location='index.php';</script>";
    exit;
}

// Proses pembaruan data menggunakan Form Processing POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $scholar_name = mysqli_real_escape_string($koneksi, $_POST['scholar_name']);
    $judul        = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $deskripsi    = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $prioritas    = mysqli_real_escape_string($koneksi, $_POST['prioritas']);
    $deadline     = mysqli_real_escape_string($koneksi, $_POST['deadline']);
    $status       = mysqli_real_escape_string($koneksi, $_POST['status']);
    
    $darshan = getDarshan($scholar_name);

    $queryUpdate = "UPDATE tasks SET 
                    scholar_name = '$scholar_name', 
                    darshan = '$darshan', 
                    judul = '$judul', 
                    deskripsi = '$deskripsi', 
                    prioritas = '$prioritas', 
                    deadline = '$deadline', 
                    status = '$status' 
                    WHERE id = '$id'";
    
    if (mysqli_query($koneksi, $queryUpdate)) {
        echo "<script>alert('Mission Document successfully updated in Akasha!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Failed to update mission: " . mysqli_error($koneksi) . "');</script>";
    }
}
// Memanggil header template Akasha
include 'header.php';
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div>
        <h1 class="h2">Modify Research Document</h1>
        <p class="text-muted">Edit and recalibrate the mission data inside the Akasha Terminal.</p>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card akasha-card p-4">
            <form method="POST" action="edit.php?id=<?= $id; ?>">
                
                <div class="mb-3">
                    <label for="scholar_name" class="form-label fw-bold">🌿 Choose Researcher</label>
                    <select name="scholar_name" id="scholar_name" class="form-select" required>
                        <option value="Alhaitham" <?= $data['scholar_name'] == 'Alhaitham' ? 'selected' : ''; ?>>📚 Alhaitham (Haravatat)</option>
                        <option value="Kaveh" <?= $data['scholar_name'] == 'Kaveh' ? 'selected' : ''; ?>>🏛️ Kaveh (Kshahrewar)</option>
                        <option value="Tighnari" <?= $data['scholar_name'] == 'Tighnari' ? 'selected' : ''; ?>>🌿 Tighnari (Amurta)</option>
                        <option value="Cyno" <?= $data['scholar_name'] == 'Cyno' ? 'selected' : ''; ?>>⚡ Cyno (Spantamad)</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="judul" class="form-label fw-bold">📜 Task Title</label>
                    <input type="text" name="judul" id="judul" class="form-control" value="<?= htmlspecialchars($data['judul']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-bold">📝 Description</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required><?= htmlspecialchars($data['deskripsi']); ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="prioritas" class="form-label fw-bold">💎 Priority Level</label>
                        <select name="prioritas" id="prioritas" class="form-select" required>
                            <option value="Low" <?= $data['prioritas'] == 'Low' ? 'selected' : ''; ?>>🟢 Low</option>
                            <option value="Medium" <?= $data['prioritas'] == 'Medium' ? 'selected' : ''; ?>>🟡 Medium</option>
                            <option value="High" <?= $data['prioritas'] == 'High' ? 'selected' : ''; ?>>🔴 High</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="deadline" class="form-label fw-bold">📅 Submission Deadline</label>
                        <input type="date" name="deadline" id="deadline" class="form-control" value="<?= $data['deadline']; ?>" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="status" class="form-label fw-bold">⚙️ Mission Status</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="Pending" <?= $data['status'] == 'Pending' ? 'selected' : ''; ?>>⚪ Pending</option>
                        <option value="In Progress" <?= $data['status'] == 'In Progress' ? 'selected' : ''; ?>>🔵 In Progress</option>
                        <option value="Completed" <?= $data['status'] == 'Completed' ? 'selected' : ''; ?>>🟢 Completed</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-secondary">⬅️ Cancel</a>
                    <button type="submit" class="btn btn-akasha">Update Akasha Record 🏛️</button>
                </div>

            </form>
        </div>
    </div>
</div>

<?php 
// Memanggil footer template
include 'footer.php'; 
?>