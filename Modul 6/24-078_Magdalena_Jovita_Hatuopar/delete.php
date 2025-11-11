<?php
$koneksi = mysqli_connect("localhost", "root", "", "store");

$id_barang = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM transaksi_detail WHERE barang_id = $id_barang");
$cek = mysqli_num_rows($query);

if ($cek !== 0) {
    echo "<script>
        alert('Barang sedang di pakai')
        window.location.href = 'index.php';
    </script>";
    exit();
}

$query_hapus = "DELETE FROM barang WHERE id = $id_barang";
$hasil = mysqli_query($koneksi, $query_hapus);
if ($hasil) {
    header("Location: index.php");
} else {
    echo "data gagal dihapus";
}
