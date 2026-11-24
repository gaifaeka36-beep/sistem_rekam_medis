<?php
include '../koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM dokter WHERE id_dokter='$id'");
$d = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $nama        = $_POST['nama_dokter'];
    $spesialisasi= $_POST['spesialisasi'];

    mysqli_query($conn, "UPDATE dokter SET nama_dokter='$nama', spesialisasi='$spesialisasi' WHERE id_dokter='$id'");
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dokter - Rekam Medis</title>
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
            <h1>Edit Data Dokter</h1>
            <span class="user-badge">Administrator</span>
        </div>

        <div class="card">
            <h2>Form Edit Data Dokter</h2>
            <form action="" method="POST">
                
                <div class="form-row">
                    <div class="form-group">
                        <label>Nama Dokter</label>
                        <input type="text" name="nama_dokter" value="<?= $d['nama_dokter'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Spesialisasi</label>
                        <input type="text" name="spesialisasi" value="<?= $d['spesialisasi'] ?>" required>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" name="update" class="btn btn-warning">Update Data Dokter</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </div>

            </form>
        </div>
    </main>

</body>
</html>