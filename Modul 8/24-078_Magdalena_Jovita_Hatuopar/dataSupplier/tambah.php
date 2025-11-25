<?php
$koneksi = mysqli_connect("localhost", "root", "", "store");

$nama = "";
$telp = "";
$alamat = "";
$errors = [];

if (isset($_POST['submit'])) {
    $nama = trim($_POST['nama']);
    $telp = trim($_POST['telp']);
    $alamat = trim($_POST['alamat']);

    if (empty($nama)) {
        $errors['nama'] = "Nama tidak boleh kosong!";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        $errors['nama'] = "Nama hanya boleh berisi huruf dan spasi!";
    }

    if (empty($telp)) {
        $errors['telp'] = "Nomor telepon tidak boleh kosong!";
    } elseif (!preg_match("/^[0-9]+$/", $telp)) {
        $errors['telp'] = "Nomor telepon hanya boleh berisi angka!";
    }

    if (empty($alamat)) {
        $errors['alamat'] = "Alamat tidak boleh kosong!";
    } elseif (!preg_match("/^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9\s]+$/", $alamat)) {
        $errors['alamat'] = "Alamat harus mengandung huruf dan angka (alfanumerik)!";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
        $hasil = mysqli_query($koneksi, $sql);

        if ($hasil) {
            header("Location: data.php");
            exit;
        } else {
            echo "<p style='color:red; text-align:center;'>Data gagal ditambahkan!</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>Tambah Data Supplier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding-top: 40px;
        }

        form {
            width: 320px;
            margin: 0 auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="tel"] {
            width: 100%;
            border: 1px solid #ccc;
            padding: 7px 10px;
            box-sizing: border-box;
            margin-bottom: 5px;
            margin-top: 5px;
        }

        button,
        .button2 {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }

        button {
            background-color: #4CAF50;
        }

        .button2 {
            background-color: #ff0000;
            text-decoration: none;
            display: inline-block;
        }

        .error {
            color: red;
            font-size: 13px;
            text-align: left;
            margin-bottom: 8px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form div {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <h2>Tambah Data Supplier</h2>

        <div>
            Nama
            <input type="text" name="nama" placeholder="Nama" value="<?= htmlspecialchars($nama); ?>" required>
            <?php if (isset($errors['nama'])) echo "<div class='error'>{$errors['nama']}</div>"; ?>
        </div>

        <div>
            Telp
            <input type="tel" name="telp" placeholder="Telp" value="<?= htmlspecialchars($telp); ?>" required>
            <?php if (isset($errors['telp'])) echo "<div class='error'>{$errors['telp']}</div>"; ?>
        </div>

        <div>
            Alamat
            <input type="text" name="alamat" placeholder="Alamat" value="<?= htmlspecialchars($alamat); ?>" required>
            <?php if (isset($errors['alamat'])) echo "<div class='error'>{$errors['alamat']}</div>"; ?>
        </div>

        <button type="submit" name="submit">Simpan</button>
        <a href="data.php" class="button2">Batal</a>
    </form>
</body>

</html>
