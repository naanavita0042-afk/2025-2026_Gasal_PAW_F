<?php
require 'validate.inc';
$errors = [];
if (validateName($_POST, 'surname', $errors)){
    echo 'Data OK!';
}
else{
    echo 'Data Invalid!<br>';
    if(isset($errors['surname'])){
        echo $errors['surname'];
    }
}
?>