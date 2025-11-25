<?php
session_start();
include "koneksi.php";

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); 

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($query);

    if ($cek == 1) {
        // Jika login berhasil
        $_SESSION['login'] = true;
        $_SESSION['user'] = mysqli_fetch_assoc($query);
        header("Location: index.php"); 
        exit;
    } else {
        // Jika login gagal
        $error = "Username atau password salah";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f2f2f2; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-box {
            width: 300px; 
            background: white; 
            padding: 20px 25px;
            border: 1px solid #ccc; 
            border-radius: 8px; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h2 { 
            text-align: center; 
            color: #3f9bebff;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] { 
            width: 100%; 
            padding: 10px; 
            margin: 7px 0 15px 0; 
            box-sizing: border-box; 
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group {
            text-align: left;
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        button { 
            width: 100%; 
            padding: 10px; 
            background: #3f9bebff; 
            color: white; 
            border: 0; 
            border-radius: 5px; 
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #2b7bc4;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login Admin</h2> 

        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

        <form method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit">Login</button>
        </form>
    </div>
    
    </body>
</html>