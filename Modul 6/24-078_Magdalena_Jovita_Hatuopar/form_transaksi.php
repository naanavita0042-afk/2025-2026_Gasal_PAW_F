<?php
$koneksi = mysqli_connect("localhost", "root", "", "store");

if (isset($_POST['submit'])) {
    $waktu_transaksi = $_POST['waktu_transaksi'];
    $keterangan = trim($_POST['keterangan']);
    $pelanggan_id = $_POST['pelanggan_id'];
    $today = date('Y-m-d');

    if ($waktu_transaksi < $today) {
        echo "<script>alert('Tanggal transaksi tidak boleh sebelum hari ini!');</script>";
    } elseif (strlen($keterangan) < 3) {
        echo "<script>alert('Keterangan minimal 3 karakter!');</script>";
    } else {
        $sql = "INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id)
                VALUES ('$waktu_transaksi', '$keterangan', 0, $pelanggan_id)";
        $hasil = mysqli_query($koneksi, $sql);

        if ($hasil) {
            header("Location: form_transaksi.php");
            exit;
        } else {
            echo "Data gagal ditambahkan";
        }
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Form Transaksi</title>
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
    <h1>Form Transaksi</h1>
    <form action="" method="post">
        <div>
            Waktu Transaksi
            <input type="date" name="waktu_transaksi" placeholder="Waktu Transasksi" required>
        </div>
        <div>
            Keterangan
            <textarea name="keterangan" placeholder="Keterangan transaksi" required></textarea>
        </div>
        <div>
            Total
            <input type="number" name="total" placeholder="Total" required>
        </div>
        <div>
            Pelanggan
            <select class="select" name="pelanggan_id">
                <?php
                $pilih = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                while ($row = mysqli_fetch_assoc($pilih)) {
                ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nama']; ?></option>
                <?php } ?>
            </select>
        </div>

        <button type="submit" name="submit">Tambah</button>
        <a href="form_transaksi.php" class="button2">Batal</a>
    </form>
</body>

</html>