<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.html");
}



include "koneksi.php";
$servername = "localhost";
$database = "4ami";
$username = "root";
$password = "";

$query = "SELECT m .*, p.nama namaProdi FROM `mahasiswa`m JOIN prodi p ON m.id = p.id";
$data = ambildata($query);

include "template/header.php";
include "template/sidebar.php";

?>

<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Data Mahasiswa</h3>
                            <div class="card-tools">
                                <a href="tambahmahasiswa.php" class="btn btn-primary">Tambah</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>tanggalLahir</th>
                                    <th>telp</th>
                                    <th>email</th>
                                    <th>prodi</th>
                                    <th>Aksi</th>

                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($data as $d) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $d["nim"] ?></td>
                                            <td><?php echo $d["nama"] ?></td>
                                            <td><?php echo $d["tanggalLahir"] ?></td>
                                            <td><?php echo $d["telp"] ?></td>
                                            <td><?php echo $d["email"] ?></td>
                                            <td><?php echo $d["namaProdi"] ?></td>
                                            <td><a href="editmahasiswa.php?nim=<?php echo $d['nim'] ?>" class="btn btn-warning">Edit</a> |
                                                <a href="deletemahasiswa.php?nim=<?php echo $d['nim'] ?>"
                                                    onclick="return confirm('handak mehapus kah?')" class="btn btn-danger">delete</a>
                                            </td>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->


<?php
include "template/footer.php";
?>