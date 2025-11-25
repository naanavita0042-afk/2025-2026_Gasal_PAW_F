<?php
include "koneksi.php";

$id = $_GET['id'];
$q = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id'");
$data = mysqli_fetch_assoc($q);

if (!$data) {
    echo "Data user tidak ditemukan!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $level = $_POST['level'];
    
    mysqli_query($koneksi, "UPDATE user SET 
        username='$username',
        nama='$nama',
        alamat='$alamat',
        hp='$hp',
        level='$level'
        WHERE id_user='$id'
    ");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
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
        h2 { 
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
            margin-top: 20px;
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
        }
        .btn-batal {
            background: #d40f0fff; 
            color: white; 
            text-decoration: none;
            padding: 8px 15px; 
            border-radius: 5px; 
            display: inline-block;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Edit User</h2> 
    <form method="POST">
        
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="<?= htmlspecialchars($data['username']) ?>" required>
        </div>

        <div class="form-group">
            <label>Nama User</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
        </div>
        
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" required><?= htmlspecialchars($data['alamat']) ?></textarea>
        </div>

        <div class="form-group">
            <label>Nomor HP</label>
            <input type="text" name="hp" value="<?= htmlspecialchars($data['hp']) ?>" required>
        </div>

        <div class="form-group">
            <label>Jenis User</label>
            <select name="level" required>
                <option value="">-- Pilih Jenis User --</option>
                <option value="1" <?= $data['level'] == 1 ? 'selected' : '' ?>>Admin</option>
                <option value="2" <?= $data['level'] == 2 ? 'selected' : '' ?>>User</option>
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