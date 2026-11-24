<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $no_rm = $_POST['no_rm'];
    $nama  = $_POST['nama_pasien'];
    $jk    = $_POST['jenis_kelamin'];
    $tgl   = $_POST['tanggal_lahir'];
    $alamat= $_POST['alamat'];

    mysqli_query($conn, "INSERT INTO pasien (no_rm, nama_pasien, jenis_kelamin, tanggal_lahir, alamat) VALUES ('$no_rm', '$nama', '$jk', '$tgl', '$alamat')");
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pasien - Rekam Medis</title>
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
            <h1>Tambah Data Pasien</h1>
            <span class="user-badge">Administrator</span>
        </div>

        <div class="card">
            <h2>Form Registrasi Pasien Baru</h2>
            <form action="" method="POST">
                
                <div class="form-row">
                    <div class="form-group">
                        <label>No. Rekam Medis (RM)</label>
                        <input type="text" name="no_rm" required placeholder="Contoh: RM-001">
                    </div>
                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" name="nama_pasien" required placeholder="Nama lengkap pasien">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <textarea name="alamat" rows="3" required placeholder="Tuliskan alamat tempat tinggal pasien..."></textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" name="simpan" class="btn">Simpan Data Pasien</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </div>

            </form>
        </div>
    </main>

</body>
</html>