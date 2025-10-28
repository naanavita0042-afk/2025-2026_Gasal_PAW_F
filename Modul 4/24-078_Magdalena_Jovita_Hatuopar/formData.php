<?php
require 'validate.inc';

$errors = [];
$message = '';
$surname = '';
$email = '';
$url = '';
$age = '';
$birth = '';
$isSubmitted = ($_SERVER['REQUEST_METHOD'] === 'POST');

if ($isSubmitted) {
    $surname = trim($_POST['surname'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $url     = trim($_POST['url'] ?? '');
    $age     = trim($_POST['age'] ?? '');
    $birth   = trim($_POST['birth'] ?? '');

    $validName  = validateName($_POST, 'surname', $errors);
    $validEmail = validateEmail($_POST, 'email', $errors);
    $validURL   = validateURL($_POST, 'url', $errors);
    $validAge   = validateAge($_POST, 'age', $errors);
    $validBirth = validateBirthDate($_POST, 'birth', $errors);

    if ($validName && $validEmail && $validURL && $validAge && $validBirth) {
        $message = "<p style='color:green;'>Semua data valid! Form berhasil dikirim.</p>";
    } else {
        $message = "<p style='color:red;'>Terdapat kesalahan pada input. Periksa kembali.</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Validasi Server-side Lengkap</title>
    <style>
        .error { color: red; margin: 4px 0; }
        label { font-weight: bold; display: block; margin-top: 10px; }
        input[type="text"] { width: 250px; }
    </style>
</head>
<body>
    <h2>Form Validasi Server-side Lengkap</h2>
    <?php if (!empty($message)) echo $message; ?>
    <?php include 'form.inc'; ?>
</body>
</html>
