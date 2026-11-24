<?php
include '../koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM rekam_medis WHERE id_rekam='$id'");
$r = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $id_pasien = $_POST['id_pasien'];
    $id_dokter = $_POST['id_dokter'];
    $id_obat   = $_POST['id_obat'];
    $tgl       = $_POST['tanggal_periksa'];
    $keluhan   = $_POST['keluhan'];
    $diagnosa  = $_POST['diagnosa'];
    $tindakan  = $_POST['tindakan'];
    $resep     = $_POST['resep'];

    mysqli_query($conn, "UPDATE rekam_medis SET id_pasien='$id_pasien', id_dokter='$id_dokter', id_obat='$id_obat', tanggal_periksa='$tgl', keluhan='$keluhan', diagnosa='$diagnosa', tindakan='$tindakan', resep='$resep' WHERE id_rekam='$id'");
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rekam Medis - System</title>
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
            <h1>Edit Rekam Medis</h1>
            <span class="user-badge">Administrator</span>
        </div>

        <div class="card">
            <h2>Form Edit Catatan Rekam Medis</h2>
            <form action="" method="POST">
                
                <div class="form-row">
                    <div class="form-group">
                        <label>Pasien</label>
                        <select name="id_pasien" required>
                            <?php
                            $pasien = mysqli_query($conn, "SELECT * FROM pasien ORDER BY nama_pasien ASC");
                            while ($p = mysqli_fetch_assoc($pasien)) {
                                $selected = ($p['id_pasien'] == $r['id_pasien']) ? 'selected' : '';
                                echo "<option value='".$p['id_pasien']."' $selected>".$p['no_rm']." - ".$p['nama_pasien']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Dokter Pemeriksa</label>
                        <select name="id_dokter" required>
                            <?php
                            $dokter = mysqli_query($conn, "SELECT * FROM dokter ORDER BY nama_dokter ASC");
                            while ($d = mysqli_fetch_assoc($dokter)) {
                                $selected = ($d['id_dokter'] == $r['id_dokter']) ? 'selected' : '';
                                echo "<option value='".$d['id_dokter']."' $selected>".$d['nama_dokter']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Obat</label>
                        <select name="id_obat" required>
                            <?php
                            $obat = mysqli_query($conn, "SELECT * FROM obat ORDER BY nama_obat ASC");
                            while ($o = mysqli_fetch_assoc($obat)) {
                                $selected = ($o['id_obat'] == $r['id_obat']) ? 'selected' : '';
                                echo "<option value='".$o['id_obat']."' $selected>".$o['nama_obat']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Periksa</label>
                        <input type="date" name="tanggal_periksa" value="<?= $r['tanggal_periksa'] ?>" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Keluhan Pasien</label>
                        <textarea name="keluhan" rows="3" required><?= $r['keluhan'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Diagnosa Dokter</label>
                        <textarea name="diagnosa" rows="3" required><?= $r['diagnosa'] ?></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Tindakan Medis</label>
                        <textarea name="tindakan" rows="2" required><?= $r['tindakan'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Resep & Dosis Obat</label>
                        <input type="text" name="resep" value="<?= $r['resep'] ?>" required>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" name="update" class="btn btn-warning">Update Rekam Medis</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </div>

            </form>
        </div>
    </main>

</body>
</html>