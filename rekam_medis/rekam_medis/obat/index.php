<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Obat - Rekam Medis</title>
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
            <li><a href="index.php" class="active">💊 Data Obat</a></li>
            <li><a href="../rekam_medis/index.php">📋 Rekam Medis</a></li>
        </ul>
    </aside>

    <!-- KAWASAN KANDUNGAN UTAMA -->
    <main class="main-content">
        <div class="top-bar">
            <h1>Data Obat</h1>
            <span class="user-badge">Administrator</span>
        </div>

        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                <h2 style="border: none; margin: 0; padding: 0;">Daftar Obat</h2>
                <a href="tambah.php" class="btn">+ Tambah Obat Baru</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th>Nama Obat</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM obat ORDER BY id_obat DESC");
                    if (mysqli_num_rows($query) > 0) {
                        while ($d = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><b><?= $d['nama_obat'] ?></b></td>
                        <td><?= $d['satuan'] ?></td>
                        <td><b><?= $d['stok'] ?></b></td>
                        <td>
                            <a href="edit.php?id=<?= $d['id_obat'] ?>" class="btn btn-warning">Edit</a>
                            <a href="hapus.php?id=<?= $d['id_obat'] ?>" onclick="return confirm('Yakin ingin menghapus data obat ini?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php 
                        }
                    } else {
                        echo "<tr><td colspan='5' style='text-align:center;'>Belum ada data obat.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>