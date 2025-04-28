<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.html");
}

include "koneksi.php";

$query = "SELECT * FROM prodi";
$data = ambildata($query);

$nim = $_GET['nim'];
$querymahasiswa = "SELECT * FROM mahasiswa WHERE nim ='$nim'";
$datamahasiswa  = ambildata ($querymahasiswa );


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    
<body>
    <h1>Edit Data Mahasiswa</h1>   
    <form action="editaksimahasiswa.php" method="post">
    <table>
    <tr>
          <td>nim</td>
          <td><input type="text" name="nim" value="<?= $datamahasiswa[0]['nim'] ?>" readonly></td>
        </tr>

        <tr>
          <td>nama</td>
          <td><input type="text" name="nama" value="<?= $datamahasiswa[0]['nama'] ?>" ></td>
        </tr>

        <tr>
          <td>tanggalLahir</td>
          <td><input type="date" name="tanggalLahir" value="<?= $datamahasiswa[0]['tanggalLahir'] ?>"/></td>
        </tr>

        <tr>
          <td>telp</td>
          <td><input type = "text" name="telp" value="<?= $datamahasiswa[0]['telp'] ?>"></td>
        </tr>

        <tr>
          <td>email</td>
          <td><input type = "text" name ="email" value="<?= $datamahasiswa[0]['email'] ?>"></td>
        </tr>
        <tr>
          <td>prodi</td>
          <td>
          <select name="id">
            <?php foreach($data as $d) :?>
              <option value="<?php echo $d['id'] ?>"
              <?=
              $d['id'] == $datamahasiswa[0]['id'] ?
              "SELECTED" : ""
              ?>

              ><?php echo $d['nama'] ?></option>
              <?php endforeach ?>
            </select>
          </td>
        </tr>
        <tr>
            <input type="reset" value="Batal" />
            <input type="submit" value="Simpan" />
        </tr>
        <tr>
          <td><a href="index.php">kembali</a></td>
        </tr>
    </table>
    </form>
    
</body>
</html>