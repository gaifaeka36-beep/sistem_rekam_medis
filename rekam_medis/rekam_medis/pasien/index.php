<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien - Rekam Medis</title>
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
            <li><a href="index.php" class="active">👤 Data Pasien</a></li>
            <li><a href="../dokter/index.php">👨‍⚕️ Data Dokter</a></li>
            <li><a href="../obat/index.php">💊 Data Obat</a></li>
            <li><a href="../rekam_medis/index.php">📋 Rekam Medis</a></li>
        </ul>
    </aside>

    <!-- KAWASAN KANDUNGAN UTAMA -->
    <main class="main-content">
        <div class="top-bar">
            <h1>Data Pasien</h1>
            <span class="user-badge">Administrator</span>
        </div>

        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                <h2 style="border: none; margin: 0; padding: 0;">Daftar Pasien</h2>
                <a href="tambah.php" class="btn">+ Tambah Pasien Baru</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>No. RM</th>
                        <th>Nama Pasien</th>
                        <th>L/P</th>
                        <th>Tgl Lahir</th>
                        <th>Alamat</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM pasien ORDER BY id_pasien DESC");
                    if (mysqli_num_rows($query) > 0) {
                        while ($d = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><span style="background: #e2e8f0; padding: 3px 8px; border-radius: 4px; font-weight: 600; font-size: 12px;"><?= $d['no_rm'] ?></span></td>
                        <td><b><?= $d['nama_pasien'] ?></b></td>
                        <td><?= $d['jenis_kelamin'] ?></td>
                        <td><?= date('d-m-Y', strtotime($d['tanggal_lahir'])) ?></td>
                        <td><?= $d['alamat'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $d['id_pasien'] ?>" class="btn btn-warning">Edit</a>
                            <a href="hapus.php?id=<?= $d['id_pasien'] ?>" onclick="return confirm('Yakin ingin menghapus data pasien ini?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php 
                        }
                    } else {
                        echo "<tr><td colspan='7' style='text-align:center;'>Belum ada data pasien.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>