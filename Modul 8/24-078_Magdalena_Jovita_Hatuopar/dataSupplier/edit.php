<?php
$koneksi = mysqli_connect("localhost", "root", "", "store");
$id = $_GET['id'];
$query = "SELECT * FROM supplier WHERE id = $id";
$hasil = mysqli_query($koneksi, $query);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE supplier SET 
    id = '$id',nama = '$nama',
    telp = '$telp',alamat = '$alamat' WHERE id = $id";

    $hasil = mysqli_query($koneksi, $sql);
    if ($hasil) {
        header("Location: data.php");
    } else {
        echo "data gagal diubah";
    }
}


?>
<!DOCTYPE html>
<html>

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
    <?php
    while ($baris = mysqli_fetch_assoc($hasil)) :
    ?>
        <form action="" method="post">
            <div>
                Nama
                <input type="text" name="nama" value="<?= $baris['nama']  ?>" placeholder="Nama" required>
            </div>
            <div>
                Telp
                <input type="tel" name="telp" value="<?= $baris['telp']  ?>" placeholder="Telp" required>
            </div>
            <div>
                Alamat
                <input type="text" name="alamat" value="<?= $baris['alamat']  ?>" placeholder="Alamat" required>
            </div>

            <button type="submit" name="submit">Update</button>
            <a href="data.php" class="button2">Batal</a>
        </form>
    <?php endwhile; ?>
</body>

</html>