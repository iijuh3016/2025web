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
    <h1>DATA MAHASISWA</h1>
    <table border="1" cellspasing="0" cellpadding="5" >
        <thead>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>tanggalLahir</th>
                <th>telp</th>
                <th>email</th>
        </thead>
        <tbody>
            
            <?php 
            $i = 1;
            foreach($data as $d) : ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $d["nim"]?></td>
                <td><?php echo $d["nama"]?></td>
                <td><?php echo $d["tanggalLahir"]?></td>
                <td><?php echo $d["telp"]?></td>
                <td><?php echo $d["email"]?></td>
            </tr>
            <?php endforeach; ?>
           
        </tbody>
    </table>

</body>
</html>
