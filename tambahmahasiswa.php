<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("location:login.html");
}

include "koneksi.php";

$query = "SELECT * FROM prodi";
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
          <h3 class="mb-0">Data Mahasiswa</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php">Data Mahasiswa</a></li>

            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
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
              <h3 class="card-title"> Tambah Mahasiswa</h3>
            </div>

            <!-- /.card-header -->
            <form action="tambahaksimahasiswa.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <form action="tambahaksimahasiswa.php" method="post">

                  <div class="form-group">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" name="nim" id="nim" class="form-control" Required>
                  </div>
                  <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" Required>
                  </div>
                  <div class="form-group">
                    <label for="nama" class="form-label">NAMA</label>
                    <input type="text" name="nama" id="nama" class="form-control" Required>
                  </div>

                  <div class="form-group">
                    <label for="tanggalLahir" class="form-label">tanggalLahir</label>
                    <input type="date" name="tanggalLahir" id="tanggalLahir" class="form-control" Required>

                  </div>
                  <div class="form-group">
                    <label for="telp" class="form-label">Telp</label>
                    <input type="text" name="telp" id="telp" class="form-control" Required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" Required>
                  </div>

                  <div class="form-group">
                    <label for="prodi" class="form-label">prodi</label>
                    <select class="form-select" name="id" id="prodi">
                      <?php foreach ($data as $d) : ?>
                        <option value="<?php echo $d['id'] ?>"><?php echo $d['nama'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="foto">Upload Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" Required>
                  </div>

              </div>
              <div class="card-footer">
                <a href="index.php" class="btn btn-warning">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
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