<?php
session_start();
include "koneksi.php";
ceklogin();






$nim = $_POST["nim"];
$password = $_POST["password"];
$nama = $_POST["nama"];
$tanggalLahir = $_POST["tanggalLahir"];
$telp = $_POST["telp"];
$email = $_POST["email"];
$id = $_POST["id"];

$namafile = $_FILES['foto']['name'];
$tmpname = $_FILES['foto']['tmp_name'];

$ekstensifoto = explode('.', $namafile);
$ekstensifoto = strtolower(end($ekstensifoto));

$namaFileBaru = $nim;
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensifoto;

move_uploaded_file($tmpname, 'assets/img/' . $namaFileBaru);

$hashPass = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO mahasiswa (nim, nama, tanggalLahir, telp, email, id, password, foto)
 VALUES ('$nim', '$nama', '$tanggalLahir', '$telp', '$email', '$id', '$hashPass', '$namaFileBaru')";


mysqli_query($conn, $query);
header("location: index.php");
