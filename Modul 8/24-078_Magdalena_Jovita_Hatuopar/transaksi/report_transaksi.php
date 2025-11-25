<?php
$koneksi = mysqli_connect("localhost", "root", "", "store");

$hasil = mysqli_query($koneksi, "SELECT * FROM transaksi");
$jumlah_pelanggan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pelanggan"));
$query_pendapatan = mysqli_query($koneksi, "SELECT SUM(total) AS pendapatan FROM transaksi");
$total_pendapatan = mysqli_fetch_assoc($query_pendapatan);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Grafik Batang dengan Chart.js</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        th {
            background-color: #4CAF50;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        table {
            border-collapse: collapse;
            width: 50%;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }
    </style>
</head>

<body>
    <style>
        .c {
            display: inline-block;
            position: relative;
            width: 70%;
        }
    </style>
    <form action="laporan.php" method="post">
        <input type="date" name="awal">
        <input type="date" name="akhir">
        <button type="submit">Tampilkan</button>
    </form>
    <div class="c">
        <canvas id="myChart"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var ctx = document.getElementById("myChart");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: [

                    <?php
                    $tanggal = mysqli_query($koneksi, "SELECT tanggal FROM transaksi");
                    while ($row = mysqli_fetch_array($tanggal)) {
                    ?> '<?= $row["tanggal"]; ?>',
                    <?php } ?>
                ],
                datasets: [{
                    label: "Data pelanggan",
                    data: [
                        <?php
                        $total = mysqli_query($koneksi, "SELECT total FROM transaksi");
                        while ($row = mysqli_fetch_array($total)) {
                        ?>
                            <?= $row["total"]; ?>,
                        <?php } ?>
                    ],
                    backgroundColor: [
                        "rgba(75, 192, 192, 0.2)",
                        "rgba(255, 99, 123, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                        "rgba(255, 206, 86, 1)",
                    ],
                    borderColor: [
                        "rgba(75, 192, 192, 1)",
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                    ],
                    borderWidth: 1,
                }, ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    </script>

    <h1>Data</h1>
    <table border=1>
        <tr>
            <th>No</th>
            <th>Total</th>
            <th>Tanggal</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($hasil)) {
        ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["total"] ?></td>
                <td><?= $row["tanggal"] ?></td>
            </tr>
        <?php } ?>
    </table>

    <table border="1" class="info">
        <tr>
            <th>Jumlah Pelanggan</th>
            <th>Jumlah Pendapatan</th>
        </tr>
        <tr>
            <td><?= $jumlah_pelanggan; ?></td>
            <td><?= $total_pendapatan["pendapatan"]; ?></td>
        </tr>
    </table>
</body>

</html>