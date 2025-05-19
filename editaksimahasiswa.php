<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.html");
}

include "koneksi.php";

$nim = $_POST["nim"];
$nama = $_POST["nama"];
$tanggalLahir = $_POST["tanggalLahir"];
$telp = $_POST["telp"];
$email = $_POST["email"];
$id = $_POST["id"];


$query = "UPDATE mahasiswa SET nama = '$nama', tanggalLahir = '$tanggalLahir', telp = '$telp', email = 
'$email', id = '$id' WHERE nim = '$nim'";

 mysqli_query($conn, $query);
 header("location: index.php");
?>