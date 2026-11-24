<?php
include '../koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM obat WHERE id_obat='$id'");

header("Location: index.php");
exit();
?>