<?php
include '../koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM pasien WHERE id_pasien='$id'");
$d = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $no_rm = $_POST['no_rm'];
    $nama  = $_POST['nama_pasien'];
    $jk    = $_POST['jenis_kelamin'];
    $tgl   = $_POST['tanggal_lahir'];
    $alamat= $_POST['alamat'];

    mysqli_query($conn, "UPDATE pasien SET no_rm='$no_rm', nama_pasien='$nama', jenis_kelamin='$jk', tanggal_lahir='$tgl', alamat='$alamat' WHERE id_pasien='$id'");
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pasien - Rekam Medis</title>
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
            <h1>Edit Data Pasien</h1>
            <span class="user-badge">Administrator</span>
        </div>

        <div class="card">
            <h2>Form Edit Data Pasien</h2>
            <form action="" method="POST">
                
                <div class="form-row">
                    <div class="form-group">
                        <label>No. Rekam Medis (RM)</label>
                        <input type="text" name="no_rm" value="<?= $d['no_rm'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" name="nama_pasien" value="<?= $d['nama_pasien'] ?>" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" required>
                            <option value="L" <?= $d['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="P" <?= $d['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="<?= $d['tanggal_lahir'] ?>" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <textarea name="alamat" rows="3" required><?= $d['alamat'] ?></textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" name="update" class="btn btn-warning">Update Data Pasien</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </div>

            </form>
        </div>
    </main>

</body>
</html>