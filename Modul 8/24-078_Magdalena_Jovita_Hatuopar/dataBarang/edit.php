<?php 
include "koneksi.php"; 
$id = $_GET['id'];
$data = mysqli_query($koneksi,"SELECT * FROM barang WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<?php
if(isset($_POST['update'])){
    mysqli_query($koneksi,"UPDATE barang SET 
        kode_barang='$_POST[kode_barang]', 
        nama_barang='$_POST[nama_barang]', 
        harga='$_POST[harga]', 
        stok='$_POST[stok]', 
        supplier_id='$_POST[supplier_id]'
        WHERE id='$_POST[id]'");

    header("Location: index.php?edit_sukses=1");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Barang</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: "Segoe UI", Arial, sans-serif;
}

body{
    background: #e3e7f1;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}

.form-box{
    width:400px;
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0px 6px 25px rgba(0,0,0,0.1);
    animation:fadeIn .6s ease-in-out;
}

h2{
    text-align:center;
    margin-bottom:20px;
    font-size:22px;
    color:#333;
    font-weight:600;
}

input, select{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border:1.5px solid #cccccc;
    border-radius:8px;
    outline:none;
    transition:.2s ease-in-out;
    font-size:15px;
}

input:focus, select:focus{
    border-color:#2196F3;
    box-shadow:0px 0px 6px rgba(33,150,243,0.3);
}

button{
    width:100%;
    padding:12px;
    border:none;
    background:#2196F3;
    color:white;
    font-size:16px;
    border-radius:8px;
    cursor:pointer;
    transition:.25s ease-in-out;
    font-weight:bold;
}

button:hover{
    background:#1976D2;
    transform:scale(1.02);
}

a{
    text-decoration:none;
    display:block;
    text-align:center;
    margin-top:12px;
    font-size:14px;
    color:#444;
    transition:.2s ease;
}

a:hover{
    color:#000;
}

</style>

</head>
<body>

<div class="form-box">
    <h2>Edit Barang</h2>

    <form method="POST">
        
        <input type="hidden" name="id" value="<?= $row['id']; ?>">

        <input type="text" name="kode_barang" value="<?= $row['kode_barang']; ?>" required>
        <input type="text" name="nama_barang" value="<?= $row['nama_barang']; ?>" required>
        <input type="number" name="harga" value="<?= $row['harga']; ?>" required>
        <input type="number" name="stok" value="<?= $row['stok']; ?>" required>

        <select name="supplier_id" required>
            <?php 
            $supplier=mysqli_query($koneksi,"SELECT * FROM supplier");
            while($s=mysqli_fetch_assoc($supplier)){ ?>
                <option value="<?= $s['id']; ?>" <?= ($s['id']==$row['supplier_id'])?'selected':'' ?>>
                    <?= $s['nama']; ?>
                </option>
            <?php } ?>
        </select>

        <button type="submit" name="update">Update</button>
        <a href="index.php">← Kembali</a>
    </form>
</div>

</body>
</html>
