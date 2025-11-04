<?php
$koneksi = mysqli_connect("localhost", "root", "", "store");

$query = "SELECT * FROM supplier";
$hasil = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f5f5f5;
        }

        h1 {
            color: #333;
        }

        a {
            text-decoration: none;
            text-align: right;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        .edit {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete {
            background-color: #ff0000;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .warna-head {
            background-color: #b1d9feff;
        }
    </style>
</head>

<body>
    <h1>Data Master Supplier</h1>
    <a href="tambah.php"><button>Tambah Data</button></a>
    <table border="1">
        <tr class="warna-head">
            <th>no</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>
        <?php 
        $no = 1;
        while ($row = mysqli_fetch_assoc($hasil)) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['telp']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td>
                    <a class="edit" href="edit.php?id=<?= $row['id']; ?>">edit</a>
                    <a class="delete" href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus supplier ini?')">delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>