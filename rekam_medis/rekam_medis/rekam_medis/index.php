<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Medis - Rekam Medis System</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <!-- SIDEBAR NAVIGASI SAMPING -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>🏥 Rekam Medis</h2>
        </div>
        <ul class="sidebar-menu">
            <li><a href="../index.php">📊 Dashboard</a></li>
            <li><a href="../pasien/index.php">👤 Data Pasien</a></li>
            <li><a href="../dokter/index.php">👨‍⚕️ Data Dokter</a></li>
            <li><a href="../obat/index.php">💊 Data Obat</a></li>
            <li><a href="index.php" class="active">📋 Rekam Medis</a></li>
        </ul>
    </aside>

    <!-- KAWASAN KANDUNGAN UTAMA -->
    <main class="main-content">
        <div class="top-bar">
            <h1>Data Rekam Medis</h1>
            <span class="user-badge">Administrator</span>
        </div>

        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                <h2 style="border: none; margin: 0; padding: 0;">Riwayat Pemeriksaan Pasien</h2>
                <a href="tambah.php" class="btn">+ Tambah Rekam Medis</a>
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
                        <th style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = "SELECT rekam_medis.*, 
                                   pasien.nama_pasien, pasien.no_rm, 
                                   dokter.nama_dokter, 
                                   obat.nama_obat 
                            FROM rekam_medis
                            JOIN pasien ON rekam_medis.id_pasien = pasien.id_pasien
                            JOIN dokter ON rekam_medis.id_dokter = dokter.id_dokter
                            JOIN obat ON rekam_medis.id_obat = obat.id_obat
                            ORDER BY id_rekam DESC";

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
                        <td>
                            <a href="edit.php?id=<?= $r['id_rekam'] ?>" class="btn btn-warning">Edit</a>
                            <a href="hapus.php?id=<?= $r['id_rekam'] ?>" onclick="return confirm('Yakin ingin menghapus catatan rekam medis ini?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php 
                        }
                    } else {
                        echo "<tr><td colspan='8' style='text-align:center;'>Belum ada catatan rekam medis.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>