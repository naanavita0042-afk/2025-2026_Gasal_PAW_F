<?php
$koneksi = mysqli_connect("localhost", "root", "", "store");

if (isset($_POST['submit'])) {
    $transaksi_id = $_POST['transaksi_id'];
    $barang_id = $_POST['barang_id'];
    $qty = $_POST['qyt'];

    $cek = mysqli_query($koneksi, "SELECT * FROM transaksi_detail WHERE transaksi_id = $transaksi_id AND barang_id = $barang_id
    ");

    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Barang ini sudah ada di transaksi tersebut!');</script>";
    } else {
        $data_barang = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT harga FROM barang WHERE id = $barang_id"));
        $harga_satuan = $data_barang['harga'];
        $harga_total = $harga_satuan * $qty;

        $sql = "INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty) VALUES ($transaksi_id, $barang_id, $harga_total, $qty)";
        $hasil = mysqli_query($koneksi, $sql);

        if ($hasil) {
            $update_total = "UPDATE transaksi SET total = (SELECT SUM(harga) FROM transaksi_detail WHERE transaksi_id = $transaksi_id) WHERE id = $transaksi_id";
            mysqli_query($koneksi, $update_total);
            echo "<script>alert('Detail transaksi berhasil ditambahkan!');</script>";
        } else {
            echo "Data gagal ditambahkan";
        }
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Transaksi Detail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f5f5f5;
        }

        h1 {
            color: #333;
        }

        form {
            width: 300px;
            margin: 0 auto;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            border: 1px solid #ccc;
            padding: 7px 10px;
            box-sizing: border-box;
            margin-bottom: 10px;
            margin-top: 5px;
        }

        .select {
            width: 100%;
            border: 1px solid #ccc;
            padding: 7px 10px;
            box-sizing: border-box;
            margin-bottom: 10px;
            margin-top: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .button2 {
            background-color: #ff0000;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        a {
            text-decoration: none;
        }

        form div {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h1>Form Transaksi Detail</h1>
    <form action="" method="post">
        <div>
            Nama Barang
            <select class="select" name="barang_id" required>
                <option value="">--Pilih Barang--</option>
                <?php
                $pilih = mysqli_query($koneksi, "SELECT * FROM barang");
                while ($row = mysqli_fetch_assoc($pilih)) {
                    echo "<option value='{$row['id']}'>{$row['nama_barang']}</option>";
                }
                ?>
            </select>
        </div>
        <div>
            Transaksi ID
            <select class="select" name="transaksi_id" required>
                <option value="">--Pilih ID--</option>
                <?php
                $pilih = mysqli_query($koneksi, "SELECT * FROM transaksi");
                while ($row = mysqli_fetch_assoc($pilih)) {
                    echo "<option value='{$row['id']}'>{$row['id']}</option>";
                }
                ?>
            </select>
        </div>
        <div>
            QTY
            <input type="number" name="qyt" placeholder="Masukkan jumlah barang" required>
        </div>

        <button type="submit" name="submit">Tambah</button>
        <a href="form_transaksidetail.php" class="button2">Batal</a>
    </form>
</body>

</html>