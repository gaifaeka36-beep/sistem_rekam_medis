<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $nama  = $_POST['nama_obat'];
    $satuan= $_POST['satuan'];
    $stok  = $_POST['stok'];

    mysqli_query($conn, "INSERT INTO obat (nama_obat, satuan, stok) VALUES ('$nama', '$satuan', '$stok')");
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Obat - Rekam Medis</title>
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
            <h1>Tambah Data Obat</h1>
            <span class="user-badge">Administrator</span>
        </div>

        <div class="card">
            <h2>Form Tambah Data Obat Baru</h2>
            <form action="" method="POST">
                
                <div class="form-row">
                    <div class="form-group">
                        <label>Nama Obat</label>
                        <input type="text" name="nama_obat" required placeholder="Contoh: Paracetamol 500mg">
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" name="satuan" required placeholder="Contoh: Tablet / Kapsul / Botol">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Stok</label>
                        <input type="number" name="stok" required min="0" placeholder="0">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" name="simpan" class="btn">Simpan Data Obat</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </div>

            </form>
        </div>
    </main>

</body>
</html>