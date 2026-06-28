<?php
// Fungsi 1: Format Tanggal
function formatTanggalAkasha($tanggal) {
    $bulan = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}

// Fungsi 2: Warna Badge
function statusBadgeAkasha($status) {
    switch ($status) {
        case 'Completed':
            return '<span class="badge bg-success text-dark">🟢 Completed</span>';
        case 'In Progress':
            return '<span class="badge bg-info text-dark">🔵 In Progress</span>';
        case 'Pending':
        default:
            return '<span class="badge bg-warning text-dark">⚪ Pending</span>';
    }
}

// Fungsi pembantu otomatisasi Darshan
function getDarshan($scholar) {
    $mapping = [
        'Alhaitham' => 'Haravatat',
        'Kaveh'     => 'Kshahrewar',
        'Tighnari'  => 'Amurta',
        'Cyno'      => 'Spantamad'
    ];
    return isset($mapping[$scholar]) ? $mapping[$scholar] : 'General';
}
?>