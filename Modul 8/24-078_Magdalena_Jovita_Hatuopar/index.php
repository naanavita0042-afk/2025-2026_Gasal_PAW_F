<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit;
}

$level = $_SESSION['user']['level'];
$nama = $_SESSION['user']['nama'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f7f7f7;
}

/* Navbar */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: purple;
    padding: 15px 30px;
    color: white;
}

.navbar ul {
    list-style: none;
    display: flex;
    gap: 25px;
    padding: 0;
    margin: 0;
    position: relative;
}

.navbar ul li {
    position: relative;
}

.navbar ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

.navbar ul li a:hover {
    color: yellow;
}

/* Dropdown Data Master */
.navbar ul li ul {
    display: none;
    position: absolute;
    top: 100%; 
    left: 0;
    background: purple;
    padding: 10px 0;
    list-style: none;
    border-radius: 4px;
    min-width: 160px;
    z-index: 10; 
}

.navbar ul li ul li {
    padding: 10px 20px;
}

.navbar ul li ul li a {
    font-size: 14px;
}

.navbar ul li:hover ul {
    display: block;
}

/* Bagian kanan */
.right-content {
    display: flex;
    align-items: center;
    gap: 15px;
}

.logout {
    color: yellow;
    text-decoration: none;
    font-weight: bold;
}
.logout:hover {
    color: #fffa8c;
}

.content {
    text-align: center;
    margin-top: 50px;
    font-size: 22px;
    color: #333;
}
</style>

</head>
<body>

<div class="navbar">
    <ul>
        <li><a href="#">Sistem Penjualan</a></li>
        <li><a href="#">Home</a></li>

        <?php if ($level == 1): ?>
        <li>
            <a href="#">Data Master</a>
            <ul>
                <li><a href="dataBarang/index.php">Data Barang</a></li>
                <li><a href="dataSupplier/data.php">Data Supplier</a></li>
                <li><a href="dataPelanggan/index.php">Data Pelanggan</a></li>
                <li><a href="dataUser/index.php">Data User</a></li>
            </ul>
        </li>
        <?php endif; ?>

        <li><a href="transaksi/index.php">Transaksi</a></li>
        <li><a href="transaksi/report_transaksi.php">Laporan</a></li>
    </ul>

    <div class="right-content">
        <span><?= $nama ?></span>
        <a class="logout" href="logout.php">Logout</a>
    </div>
</div>

</body>
</html>
