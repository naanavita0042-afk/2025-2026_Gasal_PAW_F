<?php
    // ini echo biasa
    $number = 10;
    echo 'hello word'. $number; 
    echo "hello word $number <br>";

    #ini print
    print("Ini make print<br>");

    /*teknik
    infor */
    printf("ini menggunakan printf<br>");

    //variable
    $name = "Najwa Faizah";
    $name_org = "dewi";

    function tampil(): void {
        global $name;
        echo $name;
    }
    
    //global session variables
    session_start();
    echo "<br>";

    $_SESSION['name'] = 'hengki';
    echo $_SESSION['name'];

    unset($_SESSION['name']);
    //session_destroy();

    //string manipulation
    $name = "Najwa Faizah";
    echo "<br>Before";
    $n = str_replace("Dewi", "Hajar", $name);
    echo "<br>After: " . $n;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo "hello dunia" ?></h1>
    <h1><?php echo "hello dunia" ?></h1>
    <h1><?= "hello dunia" ?></h1>

    <table border = 1>
        <tr>
            <td>Nma barang</td>
            <td>Harga</td>
            <td>Total</td>
            <td>Quantity</td>
            <td>Total harga</td>
        </tr>
        <tr>
            <td><?php echo $barang1;?> </td>
            <td><?php echo $harga1;?></td>
            <td><?php echo $quantity;?></td>
            <td><?php echo total_harga(x: $harga1, y: $quantity);?></td>
        </tr>
    </table>
    <p>Diskon 5%</p>
    <p>total : <?= total_harga</p>
</body>
</html>
