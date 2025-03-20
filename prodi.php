<?php
include "koneksi.php";
$servername = "localhost";
$database = "4ami";
$username = "root";
$password = "";

$query = "SELECT * FROM mahasiswa";
$data = ambildata($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPADU</title>
</head>
<body>
    <h1>Data prodi</h1>
    <table border="1" cellspasing="0" cellpadding="5" >
        <thead>
                <th>No</th>
                <th>nama </th>
                <th>kaprodi</th>
                <th>jurusan</th>
        </thead>
        <tbody>
            
            <?php 
            $i = 1;
            foreach($data as $d) : ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?= $data[0]["nama"]?></td>
                <td><?php echo $data[0]["kaprodi"]?></td>
                <td><?php echo $data[0]["jurusan"]?></td>
            </tr>
            <?php endforeach; ?>
           
        </tbody>
</body>
</html>
