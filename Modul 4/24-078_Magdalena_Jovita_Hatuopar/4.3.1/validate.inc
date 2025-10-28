<?php
function validateName($field_list, $field_name)
{
    if (!isset($field_list[$field_name]) || $field_list[$field_name] == ''){
        $errors[$field_name] = "Field $field_name wajib diisi.";
        return false;
    }

    $pattern = "/^[a-zA-Z'-]+$/"; 

    if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = "Field $field_name hanya boleh berisi huruf alfabet, tanda petik, tanda hubung.";
        return false;
    }

    return true;
}
?>
