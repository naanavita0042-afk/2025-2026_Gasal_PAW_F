<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); 
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $level = $_POST['level'];

    mysqli_query($koneksi, "INSERT INTO user (username, password, nama, alamat, hp, level) VALUES ('$username', '$password', '$nama', '$alamat', '$hp', '$level')");

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah User Baru</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: #f2f2f2; 
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 50px;
        }
        .box {
            width: 450px; 
            background: #fff;
            padding: 30px; 
            border-radius: 8px; 
            border: 1px solid #ccc;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h3 { 
            text-align: center; 
            color: #3f9bebff; 
            margin-bottom: 25px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        .form-group input, .form-group select, .form-group textarea { 
            width: 100%; 
            padding: 10px; 
            box-sizing: border-box; 
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }
        .form-actions {
            margin-top: 25px;
            text-align: right;
        }
        .btn-simpan { 
            background: #28a745;
            color: white; 
            border: none; 
            padding: 8px 15px; 
            border-radius: 5px; 
            cursor: pointer;
            margin-left: 10px;
            font-size: 14px;
        }
        .btn-batal {
            background: #d40f0fff; 
            color: white; 
            text-decoration: none;
            padding: 8px 15px; 
            border-radius: 5px; 
            display: inline-block;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="box">
    <h3>Tambah User Baru</h3>

    <form method="POST">
        
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="username" required>
        </div>
        
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="password" required>
        </div>

        <div class="form-group">
            <label>Nama User</label>
            <input type="text" name="nama" placeholder="Nama User" required>
        </div>
        
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" placeholder="" required></textarea>
        </div>

        <div class="form-group">
            <label>Nomor HP</label>
            <input type="text" name="hp" placeholder="Nomor HP" required>
        </div>

        <div class="form-group">
            <label>Jenis User</label>
            <select name="level" required>
                <option value="">-- Pilih Jenis User --</option>
                <option value="1">Owner</option>
                <option value="2">Kasir</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-simpan">Simpan</button>
            <a href="index.php" class="btn-batal">Batal</a>
        </div>
    </form>

</div>

</body>
</html>