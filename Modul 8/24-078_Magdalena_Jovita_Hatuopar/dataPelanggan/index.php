<?php 
include "koneksi.php"; 
$data = mysqli_query($koneksi,"SELECT * FROM pelanggan");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Pelanggan</title>
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
    <h1>Data Pelanggan</h1>
    <a href="tambah.php" class="btn">+ Tambah Barang</a>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>JK</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($data)){ ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['jenis_kelamin']; ?></td>
            <td><?= $row['telp']; ?></td>
            <td><?= $row['alamat']; ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>" class="edit">Edit</a>
                <a href="delete.php?id=<?= $row['id']; ?>" class="delete"
                    onclick="return confirm('Yakin hapus data?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>

</html>