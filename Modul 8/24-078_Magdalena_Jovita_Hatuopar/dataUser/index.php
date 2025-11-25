<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$id'");
    header("Location: index.php");
    exit;
}

$query = "SELECT id_user, username, nama, level FROM user"; 
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar User</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0;
            padding: 20px;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0 auto 15px;
            width: 80%;
            max-width: 900px;
        }
        h2 { 
            color: #3f9bebff; 
            font-size: 24px;
            margin: 0;
        }
        
        table { 
            border-collapse: collapse; 
            width: 80%; 
            margin: 0 auto;
            max-width: 900px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td { 
            border: 1px solid #ddd; 
            padding: 10px; 
            text-align: left; 
        }
        th { 
            background-color: #cde2f9; 
            color: #333;
            text-align: center;
            font-weight: bold;
        }
        td:first-child { 
            text-align: center; 
        } 
        
        /* Styling Tombol */
        .btn-tambah {
            background-color: #5cb85c; 
            padding: 8px 15px;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }
        .btn {
            padding: 6px 10px;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            margin: 0 2px;
            display: inline-block; 
            font-size: 13px;
            cursor: pointer;
        }
        .edit { 
            background: #f0ad4e;
        } 
        .hapus { 
            background: #d9534f; 
        }
        
        /* Penyesuaian lebar kolom header */
        .table-header th:nth-child(1) { width: 5%; }
        .table-header th:nth-child(2) { width: 20%; }
        .table-header th:nth-child(3) { width: 30%; }
        .table-header th:nth-child(4) { width: 20%; }
        .table-header th:nth-child(5) { width: 25%; text-align: center; }

    </style>
</head>
<body>
    
    <div class="header-container">
        <h2>Daftar User</h2>
        <a class="btn-tambah" href="tambah.php">Tambah User</a>
    </div>

    <table>
        <tr class="table-header">
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Level</th>
            <th>Tindakan</th>
        </tr>

        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            // Logika konversi level sesuai permintaan pengguna (tidak diubah)
            if ($row['level'] == 1) {
                $level_teks = "Owner";
            } 
            else{
                $level_teks = "Kasir";
            }
            
            echo "
            <tr>
                <td>$no</td>
                <td>{$row['username']}</td>
                <td>{$row['nama']}</td>
                <td>{$level_teks}</td>
                <td style='text-align: center;'>
                    <a class='btn edit' href='edit.php?id={$row['id_user']}'>Edit</a>
                    <a class='btn hapus' href='index.php?hapus={$row['id_user']}' onclick=\"return confirm('Hapus data {$row['username']}?');\">Hapus</a>
                </td>
            </tr>";
            $no++;
        }
        ?>

    </table>

</body>
</html>