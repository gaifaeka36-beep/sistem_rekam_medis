<?php
include '../koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM rekam_medis WHERE id_rekam='$id'");

header("Location: index.php");
exit();
?>