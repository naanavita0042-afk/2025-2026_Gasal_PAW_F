<!DOCTYPE html>
<html>
<head>
    <title>Pertemuan 1</title>
</head>
<body>
        <?php
    // echo "halooo <br>"; //tidak mengembalikan nilai
    // print('hello world <br>'); //mengembalikan nilai 1
    // printf('Print Format <br>');
    // ?>
     <?= "hallo dunia <br>" ?>

    <?php
    // $number =  18;
    // // echo "Aku umur ".$number;
    // echo "aku umur $number <br>";

    // $namaku = 'Aini Tendean';

    // function nama(){
    //     global $namaku;
    //     echo $namaku;
    // }
    // nama();

    // session_start();
    // echo "<br>";
    // $_SESSION['nama'] = 'Aini';
    // echo $_SESSION['nama'];

    // $nama = 'Aini Tendean';
    // $n = str_replace('Aini', 'Rachelia', $nama);
    // echo $n;

    $barang1 = 'Laptop';
    $harga = 1000;
    $qty = '5';
    $diskon = 5;
    
    function total_harga($harga,$qty){
        $hasil = $harga * $qty;
        return $hasil;
    }

    function diskon($totalharga, $diskon){
        $hasilAkhir = $totalharga - 
    }
    ?>
    <table border="1">
        <tr>
            <td>Nama Barang</td>
            <td>Harga</td>
            <td>Quantity</td>
            <td>Total Harga</td>
        </tr>
        <tr>
            <td><?php echo $barang1 ?></td>
            <td><?php echo $harga ?></td>
            <td><?php echo $qty ?></td>
            <td><?php echo total_harga($harga, $qty ) ?></td>
        </tr>
    </table>

</body>
</html>