<?php
$koneksi = mysqli_connect("localhost", "root", "", "store");

$barang = mysqli_query($koneksi, "SELECT * FROM barang INNER JOIN supplier ON barang.supplier_id = supplier.id"); $transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi INNER JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id");
$detail = mysqli_query($koneksi, "
    SELECT transaksi_detail.*, 
           barang.nama_barang, 
           barang.harga AS harga_barang, 
           transaksi.waktu_transaksi, 
           transaksi.id AS id_transaksi
    FROM transaksi_detail
    INNER JOIN barang ON transaksi_detail.barang_id = barang.id
    INNER JOIN transaksi ON transaksi_detail.transaksi_id = transaksi.id
");
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

        a.btn {
            display: inline-block;
            padding: 8px 14px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin: 5px;
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
            width: 80%;
            margin: 20px auto;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: greenyellow;
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
    </style>
</head>

<body>
    <h1>Data Barang</h1>
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
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($barang)) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['kode_barang']; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['harga']; ?></td>
                <td><?= $row['stok']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td>
                    <a class="delete" href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus supplier ini?')">delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br/>
    <h1>Data Transaksi</h1>
    <a href="form_transaksi.php" class="btn">Tambah Transaksi</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>ID Transaksi</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Total</th>
            <th>Pelanggan</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($transaksi)) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['id']; ?></td>
                <td><?= $row['waktu_transaksi']; ?></td>
                <td><?= htmlspecialchars($row['keterangan']); ?></td>
                <td><?= number_format($row['total'], 0, ',', '.'); ?></td>
                <td><?= $row['nama']; ?></td>
            </tr>
        <?php } ?>
    </table>
    <br/>
    <h1>Data Detail Transaksi</h1>
    <a href="form_transaksidetail.php" class="btn">Tambah Detail Transaksi</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>ID Transaksi</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Qty</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($detail)) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['transaksi_id']; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= number_format($row['harga'], 0, ',', '.'); ?></td>
                <td><?= $row['qty']; ?></td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>