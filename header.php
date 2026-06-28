<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akasha Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Navigation Menu -->
        <nav class="col-md-3 col-lg-2 d-md-block akasha-sidebar vh-100 p-3 position-sticky top-0 d-flex flex-column justify-content-between">
            <div>
                <div class="text-center my-3">
                    <h3 class="akasha-brand mb-1">🏛️ AKASHA</h3>
                    <small class="text-muted text-uppercase tracking-wider" style="font-size: 0.65rem; color: #999 !important;">Task Manager</small>
                </div>
                <hr style="border-color: var(--sumeru-gold); opacity: 0.5;">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item"><a href="index.php" class="nav-link text-white">🏠 Dashboard</a></li>
                    <li class="nav-item"><a href="daftar.php" class="nav-link text-white">📜 Daftar Tugas</a></li>
                    <li class="nav-item"><a href="tambah.php" class="nav-link text-white">➕ Tambah Tugas</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white opacity-50">⚙️ Pengaturan</a></li>
                </ul>
            </div>
            
            <div class="p-3 rounded text-center border border-secondary" style="background-color: rgba(20,63,45,0.3);">
                <span class="text-warning" style="font-size: 1.5rem;">“</span>
                <p class="text-white fst-italic mb-2" style="font-size: 0.75rem;">Knowledge is the beginning of every achievement.</p>
                <small class="text-muted">— Alhaitham</small>
            </div>
        </nav>
        
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">