<?php
require "connect.php";
$id = $_GET['id'];
$delete = mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
if ($delete) {
    header("Location: read.php");
}
?>