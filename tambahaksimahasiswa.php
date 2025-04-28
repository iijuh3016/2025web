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

$query = "INSERT INTO mahasiswa (nim, nama, tanggalLahir, telp, email, id)
 VALUES ('$nim', '$nama', '$tanggalLahir', '$telp', '$email', '$id')";

 mysqli_query($conn, $query);
 header("location: index.php");
?>