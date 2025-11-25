<?php
$koneksi = mysqli_connect("localhost", "root", "", "store");

$id = $_GET['id']; 
$query = "DELETE FROM supplier WHERE id = $id"; 
$hasil = mysqli_query($koneksi, $query);
if ($hasil) {
    header("Location: data.php");
} else {
    echo "data gagal dihapus";
}
