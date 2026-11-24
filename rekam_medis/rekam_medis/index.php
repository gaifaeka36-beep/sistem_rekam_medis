<?php 
include 'koneksi.php';

// Menghitung total data untuk kartu statistik
$total_pasien = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM pasien"))['total'];
$total_dokter = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM dokter"))['total'];
$total_obat   = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM obat"))['total'];
$total_rekam  = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM rekam_medis"))['total'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Rekam Medis System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- SIDEBAR NAVIGASI SAMPING -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>🏥 Rekam Medis</h2>
        </div>
        <ul class="sidebar-menu">
            <li><a href="index.php" class="active">📊 Dashboard</a></li>
            <li><a href="pasien/index.php">👤 Data Pasien</a></li>
            <li><a href="dokter/index.php">👨‍⚕️ Data Dokter</a></li>
            <li><a href="obat/index.php">💊 Data Obat</a></li>
            <li><a href="rekam_medis/index.php">📋 Rekam Medis</a></li>
        </ul>
    </aside>

    <!-- KAWASAN UTAMA -->
    <main class="main-content">
        <div class="top-bar">
            <h1>Dashboard Utama</h1>
            <span class="user-badge">Administrator</span>
        </div>

        <!-- KARTU STATISTIK RINGKASAN -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-info">
                    <h3><?= $total_pasien ?></h3>
                    <p>Total Pasien</p>
                </div>
                <div class="stat-icon">👤</div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <h3><?= $total_dokter ?></h3>
                    <p>Total Dokter</p>
                </div>
                <div class="stat-icon">👨‍⚕️</div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <h3><?= $total_obat ?></h3>
                    <p>Total Obat</p>
                </div>
                <div class="stat-icon">💊</div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <h3><?= $total_rekam ?></h3>
                    <p>Catatan Rekam Medis</p>
                </div>
                <div class="stat-icon">📋</div>
            </div>
        </div>

        <!-- KARTU AKSES CEPAT -->
        <div class="card" style="margin-bottom: 25px;">
            <h2 style="border: none; margin-bottom: 10px; padding: 0;">Akses Cepat</h2>
            <div class="quick-actions">
                <a href="pasien/tambah.php" class="action-card">
                    <span>➕</span> Tambah Pasien Baru
                </a>
                <a href="dokter/tambah.php" class="action-card">
                    <span>👨‍⚕️</span> Tambah Data Dokter
                </a>
                <a href="obat/tambah.php" class="action-card">
                    <span>💊</span> Tambah Data Obat
                </a>
                <a href="rekam_medis/tambah.php" class="action-card">
                    <span>📋</span> Input Rekam Medis
                </a>
            </div>
        </div>

        <!-- TABEL RIWAYAT REKAM MEDIS TERBARU -->
        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                <h2 style="border: none; margin: 0; padding: 0;">Riwayat Rekam Medis Terbaru</h2>
                <a href="rekam_medis/index.php" class="btn btn-secondary">Lihat Semua Data ➔</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Tgl Periksa</th>
                        <th>Pasien</th>
                        <th>Dokter</th>
                        <th>Keluhan & Diagnosa</th>
                        <th>Tindakan</th>
                        <th>Obat & Resep</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    // Query INNER JOIN diproyeksikan membatasi 5 data rekam medis terbaru
                    $sql = "SELECT rekam_medis.*, 
                                   pasien.nama_pasien, pasien.no_rm, 
                                   dokter.nama_dokter, 
                                   obat.nama_obat 
                            FROM rekam_medis
                            JOIN pasien ON rekam_medis.id_pasien = pasien.id_pasien
                            JOIN dokter ON rekam_medis.id_dokter = dokter.id_dokter
                            JOIN obat ON rekam_medis.id_obat = obat.id_obat
                            ORDER BY id_rekam DESC LIMIT 5";

                    $query = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($query) > 0) {
                        while ($r = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= date('d-m-Y', strtotime($r['tanggal_periksa'])) ?></td>
                        <td><b><?= $r['nama_pasien'] ?></b><br><small style="color:#666;"><?= $r['no_rm'] ?></small></td>
                        <td><?= $r['nama_dokter'] ?></td>
                        <td>
                            <b>Keluhan:</b> <?= $r['keluhan'] ?><br>
                            <b>Diagnosa:</b> <?= $r['diagnosa'] ?>
                        </td>
                        <td><?= $r['tindakan'] ?></td>
                        <td>
                            <b><?= $r['nama_obat'] ?></b><br>
                            <small style="color:#666;"><?= $r['resep'] ?></small>
                        </td>
                    </tr>
                    <?php 
                        }
                    } else {
                        echo "<tr><td colspan='7' style='text-align:center;'>Belum ada riwayat rekam medis.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>