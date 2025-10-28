<?php
// 1. Regular Expression: validasi nama hanya huruf dan spasi
function validateName($field_list, $field_name, &$errors)
{
    $value = trim($field_list[$field_name] ?? '');
    if ($value === '') {
        $errors[$field_name] = "Nama wajib diisi.";
        return false;
    }
    if (!preg_match("/^[a-zA-Z\s'-]+$/", $value)) {
        $errors[$field_name] = "Nama hanya boleh berisi huruf, spasi, tanda petik, atau tanda hubung.";
        return false;
    }
    return true;
}

// 2. String Function: ubah huruf jadi lowercase, lalu validasi email
function validateEmail($field_list, $field_name, &$errors)
{
    $value = strtolower(trim($field_list[$field_name] ?? '')); // gunakan trim dan strtolower
    if ($value === '') {
        $errors[$field_name] = "Email wajib diisi.";
        return false;
    }
    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = "Format email tidak valid.";
        return false;
    }
    return true;
}

// 3. Filter: validasi URL
function validateURL($field_list, $field_name, &$errors)
{
    $value = trim($field_list[$field_name] ?? '');
    if ($value === '') {
        $errors[$field_name] = "URL wajib diisi.";
        return false;
    }
    if (!filter_var($value, FILTER_VALIDATE_URL)) {
        $errors[$field_name] = "Format URL tidak valid.";
        return false;
    }
    return true;
}

// 4. Type Testing: pastikan usia berupa angka
function validateAge($field_list, $field_name, &$errors)
{
    $value = trim($field_list[$field_name] ?? '');
    if ($value === '') {
        $errors[$field_name] = "Usia wajib diisi.";
        return false;
    }
    if (!is_numeric($value) || $value <= 0) {
        $errors[$field_name] = "Usia harus berupa angka positif.";
        return false;
    }
    return true;
}

// 5. Date Validation: validasi tanggal lahir 
function validateBirthDate($field_list, $field_name, &$errors)
{
    $value = trim($field_list[$field_name] ?? '');
    if ($value === '') {
        $errors[$field_name] = "Tanggal lahir wajib diisi.";
        return false;
    }

    $parts = explode('/', $value);
    if (count($parts) !== 3) {
        $errors[$field_name] = "Format tanggal harus dd/mm/yyyy.";
        return false;
    }

    list($day, $month, $year) = $parts;

    if (!checkdate((int)$month, (int)$day, (int)$year)) {
        $errors[$field_name] = "Tanggal tidak valid.";
        return false;
    }

    return true;
}
?>
