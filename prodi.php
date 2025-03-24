<?php
include "koneksi.php";
$servername = "localhost";
$database = "4ami";
$username = "root";
$password = "";

$query = "SELECT * FROM prodi";
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
                <th>id</th>
                <th>nama </th>
                <th>kaprodi</th>
                <th>jurusan</th>
        </thead>
        <tbody>
            
            <?php 
            
            foreach($data as $d) : ?>
            <tr>
                
                <td><?php echo $d["id"]?></td>
                <td><?php echo $d["nama"]?></td>
                <td><?php echo $d["kaprodi"]?></td>
                <td><?php echo $d["jurusan"]?></td>
            </tr>
            <?php endforeach; ?>
           
        </tbody>
</body>
</html>
