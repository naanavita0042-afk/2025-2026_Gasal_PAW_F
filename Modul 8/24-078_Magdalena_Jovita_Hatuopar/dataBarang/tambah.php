<?php 
include "koneksi.php"; 

if(isset($_POST['simpan'])){
    mysqli_query($koneksi,"INSERT INTO barang VALUES(
        '', 
        '$_POST[kode_barang]', 
        '$_POST[nama_barang]', 
        '$_POST[harga]', 
        '$_POST[stok]', 
        '$_POST[supplier_id]'
    )");

    header("Location: index.php?status=sukses");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Barang</title>

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Segoe UI", Arial, sans-serif;
    }

    body {
        background: #e3e7f1;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .form-box {
        width: 400px;
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.1);
        animation: fadeIn .6s ease-in-out;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 22px;
        color: #333;
        font-weight: 600;
    }

    input,
    select {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1.5px solid #cccccc;
        border-radius: 8px;
        outline: none;
        transition: .2s ease-in-out;
        font-size: 15px;
    }

    input:focus,
    select:focus {
        border-color: #4CAF50;
        box-shadow: 0px 0px 6px rgba(76, 175, 80, 0.3);
    }

    button {
        width: 100%;
        padding: 12px;
        border: none;
        background: #4CAF50;
        color: white;
        font-size: 16px;
        border-radius: 8px;
        cursor: pointer;
        transition: .25s ease-in-out;
        font-weight: bold;
    }

    button:hover {
        background: #43a047;
        transform: scale(1.02);
    }

    a {
        text-decoration: none;
        display: block;
        text-align: center;
        margin-top: 12px;
        font-size: 14px;
        color: #555;
        transition: .2s ease;
    }

    a:hover {
        color: #000;
    }
    </style>

</head>

<body>

    <div class="form-box">
        <h2>Tambah Barang</h2>

        <form method="POST">
            <input type="text" name="kode_barang" placeholder="Kode Barang" required>
            <input type="text" name="nama_barang" placeholder="Nama Barang" required>
            <input type="number" name="harga" placeholder="Harga" required>
            <input type="number" name="stok" placeholder="Stok" required>

            <select name="supplier_id" required>
                <option value="">-- Pilih Supplier --</option>
                <?php
            $supplier=mysqli_query($koneksi,"SELECT * FROM supplier");
            while($s=mysqli_fetch_assoc($supplier)){ ?>
                <option value="<?= $s['id']; ?>"><?= $s['nama']; ?></option>
                <?php } ?>
            </select>

            <button type="submit" name="simpan">Simpan</button>
            <a href="index.php">Kembali</a>
        </form>
    </div>

</body>

</html>