<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $nama        = $_POST['nama_dokter'];
    $spesialisasi= $_POST['spesialisasi'];

    mysqli_query($conn, "INSERT INTO dokter (nama_dokter, spesialisasi) VALUES ('$nama', '$spesialisasi')");
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dokter - Rekam Medis</title>
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
            <h1>Tambah Data Dokter</h1>
            <span class="user-badge">Administrator</span>
        </div>

        <div class="card">
            <h2>Form Tambah Dokter Baru</h2>
            <form action="" method="POST">
                
                <div class="form-row">
                    <div class="form-group">
                        <label>Nama Dokter</label>
                        <input type="text" name="nama_dokter" required placeholder="Contoh: dr. Ahmad Subagyo, Sp.PD">
                    </div>
                    <div class="form-group">
                        <label>Spesialisasi</label>
                        <input type="text" name="spesialisasi" required placeholder="Contoh: Dokter Spesialis Penyakit Dalam">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" name="simpan" class="btn">Simpan Data Dokter</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </div>

            </form>
        </div>
    </main>

</body>
</html>