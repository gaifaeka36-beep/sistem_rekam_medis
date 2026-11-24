<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dokter - Rekam Medis</title>
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
            <li><a href="index.php" class="active">👨‍⚕️ Data Dokter</a></li>
            <li><a href="../obat/index.php">💊 Data Obat</a></li>
            <li><a href="../rekam_medis/index.php">📋 Rekam Medis</a></li>
        </ul>
    </aside>

    <!-- KAWASAN KANDUNGAN UTAMA -->
    <main class="main-content">
        <div class="top-bar">
            <h1>Data Dokter</h1>
            <span class="user-badge">Administrator</span>
        </div>

        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                <h2 style="border: none; margin: 0; padding: 0;">Daftar Dokter</h2>
                <a href="tambah.php" class="btn">+ Tambah Dokter Baru</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th>Nama Dokter</th>
                        <th>Spesialisasi</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM dokter ORDER BY id_dokter DESC");
                    if (mysqli_num_rows($query) > 0) {
                        while ($d = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><b><?= $d['nama_dokter'] ?></b></td>
                        <td><?= $d['spesialisasi'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $d['id_dokter'] ?>" class="btn btn-warning">Edit</a>
                            <a href="hapus.php?id=<?= $d['id_dokter'] ?>" onclick="return confirm('Yakin ingin menghapus data dokter ini?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php 
                        }
                    } else {
                        echo "<tr><td colspan='4' style='text-align:center;'>Belum ada data dokter.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>