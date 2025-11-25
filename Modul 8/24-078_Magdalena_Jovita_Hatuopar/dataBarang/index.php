<?php
include "koneksi.php";

$barang = mysqli_query($koneksi, "SELECT * FROM barang INNER JOIN supplier ON barang.supplier_id = supplier.id"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Barang</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f7f7f7;
            text-align:center;
        }
        h1{
            color:#333;
        }
        table{
            width:80%;
            margin:auto;
            border-collapse:collapse;
        }
        th{
            background:#4CAF50;
            color:white;
            padding:10px;
        }
        td{
            background:white;
            padding:10px;
        }
        a.btn{
            display:inline-block;
            background:#4CAF50;
            color:white;
            padding:10px 15px;
            border-radius:5px;
            text-decoration:none;
            margin-bottom:10px;
        }
        .edit { 
            display:inline-block;
            color:white;
            padding:10px 15px;
            border-radius:5px;
            text-decoration:none;
            background: #f0ad4e;
        } 
        .delete { 
            display:inline-block;
            color:white;
            padding:10px 15px;
            border-radius:5px;
            text-decoration:none;
            background: #d9534f; 
        }
    </style>
</head>
<body>

<h1>Data Barang</h1>
<a href="tambah.php" class="btn">+ Tambah Barang</a>

<table border="1">
    <tr>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Supplier</th>
        <th>Tindakan</th>
    </tr>

    <?php $no=1; while($row=mysqli_fetch_assoc($barang)){ ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['kode_barang']; ?></td>
        <td><?= $row['nama_barang']; ?></td>
        <td><?= $row['harga']; ?></td>
        <td><?= $row['stok']; ?></td>
        <td><?= $row['nama']; ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id']; ?>" class="edit">Edit</a> 
            <a href="delete.php?id=<?= $row['id']; ?>" class="delete" onclick="return confirm('Yakin hapus data?')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>