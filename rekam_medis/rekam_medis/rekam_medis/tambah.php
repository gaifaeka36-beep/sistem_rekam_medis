<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $id_pasien = $_POST['id_pasien'];
    $id_dokter = $_POST['id_dokter'];
    $id_obat   = $_POST['id_obat'];
    $tgl       = $_POST['tanggal_periksa'];
    $keluhan   = $_POST['keluhan'];
    $diagnosa  = $_POST['diagnosa'];
    $tindakan  = $_POST['tindakan'];
    $resep     = $_POST['resep'];

    mysqli_query($conn, "INSERT INTO rekam_medis (id_pasien, id_dokter, id_obat, tanggal_periksa, keluhan, diagnosa, tindakan, resep) 
                         VALUES ('$id_pasien', '$id_dokter', '$id_obat', '$tgl', '$keluhan', '$diagnosa', '$tindakan', '$resep')");
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Rekam Medis - System</title>
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

    <!-- KAWASAN UTAMA -->
    <main class="main-content">
        <div class="top-bar">
            <h1>Tambah Rekam Medis</h1>
            <span class="user-badge">Administrator</span>
        </div>

        <div class="card">
            <h2>Form Input Rekam Medis Pasien</h2>
            <form action="" method="POST">
                
                <div class="form-row">
                    <div class="form-group">
                        <label>Pasien</label>
                        <select name="id_pasien" required>
                            <option value="">-- Pilih Pasien --</option>
                            <?php
                            $pasien = mysqli_query($conn, "SELECT * FROM pasien ORDER BY nama_pasien ASC");
                            while ($p = mysqli_fetch_assoc($pasien)) {
                                echo "<option value='".$p['id_pasien']."'>".$p['no_rm']." - ".$p['nama_pasien']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Dokter Pemeriksa</label>
                        <select name="id_dokter" required>
                            <option value="">-- Pilih Dokter --</option>
                            <?php
                            $dokter = mysqli_query($conn, "SELECT * FROM dokter ORDER BY nama_dokter ASC");
                            while ($d = mysqli_fetch_assoc($dokter)) {
                                echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Obat</label>
                        <select name="id_obat" required>
                            <option value="">-- Pilih Obat --</option>
                            <?php
                            $obat = mysqli_query($conn, "SELECT * FROM obat ORDER BY nama_obat ASC");
                            while ($o = mysqli_fetch_assoc($obat)) {
                                echo "<option value='".$o['id_obat']."'>".$o['nama_obat']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Periksa</label>
                        <input type="date" name="tanggal_periksa" value="<?= date('Y-m-d') ?>" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Keluhan Pasien</label>
                        <textarea name="keluhan" rows="3" required placeholder="Tuliskan keluhan utama pasien..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Diagnosa Dokter</label>
                        <textarea name="diagnosa" rows="3" required placeholder="Tuliskan hasil diagnosa..."></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Tindakan Medis</label>
                        <textarea name="tindakan" rows="2" required placeholder="Pemeriksaan fisik, konsultasi, tindakan medis..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Resep & Dosis Obat</label>
                        <input type="text" name="resep" placeholder="Contoh: 3x1 Sesudah makan" required>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" name="simpan" class="btn">Simpan Rekam Medis</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </div>

            </form>
        </div>
    </main>

</body>
</html>