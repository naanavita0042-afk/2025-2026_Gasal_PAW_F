<?php
require 'validate.inc';

$errors = [];
$message = '';
$surname = '';
$email = '';
$age = '';
$isSubmitted = ($_SERVER['REQUEST_METHOD'] === 'POST');

if ($isSubmitted) {
    $surname = trim($_POST['surname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $age = trim($_POST['age'] ?? '');

    $validName  = validateName($_POST, 'surname', $errors);
    $validEmail = validateEmail($_POST, 'email', $errors);
    $validAge   = validateAge($_POST, 'age', $errors);

    if ($validName && $validEmail && $validAge) {
        $message = "<p style='color:green;'>Semua data valid. Form berhasil dikirim!</p>";
    } else {
        $message = "<p style='color:red;'>Terdapat kesalahan pada input!</p>";
        if (!$validName) $surname = '';
        if (!$validEmail) $email = '';
        if (!$validAge) $age = '';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Validasi Multi Field</title>
    <style>
        .error { color: red; margin: 4px 0; }
        label { font-weight: bold; }
    </style>
</head>
<body>
    <h2>Form Validasi Multi Field</h2>

    <?php if (!empty($message)) echo $message; ?>

    <?php include 'form.inc'; ?>

</body>
</html>
