<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("location:login.html");
}

include "koneksi.php";

$query = "SELECT * FROM prodi";
$datamahasiswa = ambildata($query);
$nim = $_GET['nim'];
$query = "SELECT * FROM mahasiswa WHERE nim ='$nim'";
$datamahasiswa = ambildata($query);

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
          <h3 class="mb-0">Edit mahasiswa</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php">Data Mahasiswa</a></li>

            <li class="breadcrumb-item active" aria-current="page">Edit mahasiswa</li>
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
              <h3 class="card-title"> Edit Mahasiswa</h3>
            </div>

            <!-- /.card-header -->
            <form action="tambahaksimahasiswa.php" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="nim" class="form-label">NIM</label>
                  <input type="text" name="nim" id="nim" class="form-control" Required>
                </div>
                <div class=" form-group">
                  <label for="password" class="form-label">Pasword</label>
                  <input type="password" name="password" id="password" class="form-control" Required value="<?= $datamahasiswa[0]['nim']  ?>">
                </div>
                <div class=" form-group">
                  <label for="nama" class="form-label">NAMA</label>
                  <input type="text" name="nama" id="nama" class="form-control" Required value="<?= $datamahasiswa[0]['nama'] ?>" />
                </div>

                <div class=" form-group">
                  <label for="TanggalLahir" class="form-label">TanggalLahir</label>
                  <input type="date" name="TanggalLahir" id="TanggalLahir" class="form-control" Required value="<?= $datamahasiswa[0]['TanggalLahir'] ?>" />

                </div>
                <div class=" form-group">
                  <label for="telp" class="form-label">Telp</label>
                  <input type="text" name="telp" id="telp" class="form-control" Required value="<?= $datamahasiswa[0]['telp'] ?>" />
                </div>
                <div class=" form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" id="email" class="form-control" Required value="<?= $datamahasiswa[0]['email'] ?>" />
                </div>

                <div class=" form-group">
                  <label for="prodi" class="form-label">prodi</label>
                  <select class="form-select" name="prodi" id="prodi">
                    <?php foreach ($data as $d) : ?>
                      <option value="<?php echo $d['id'] ?>"><?php echo $d['nama'] ?></option>
                    <?php endforeach ?>
                  </select>
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
        <td><input type="text" name="nama" value="<?= $datamahasiswa[0]['nama'] ?>"></td>
      </tr>

      <tr>
        <td>tanggalLahir</td>
        <td><input type="date" name="tanggalLahir" value="<?= $datamahasiswa[0]['tanggalLahir'] ?>" /></td>
      </tr>

      <tr>
        <td>telp</td>
        <td><input type="text" name="telp" value="<?= $datamahasiswa[0]['telp'] ?>"></td>
      </tr>

      <tr>
        <td>email</td>
        <td><input type="text" name="email" value="<?= $datamahasiswa[0]['email'] ?>"></td>
      </tr>
      <tr>
        <td>prodi</td>
        <td>
          <select name="id">
            <?php foreach ($data as $d) : ?>
              <option value="<?php echo $d['id'] ?>"
                <?=
                $d['id'] == $datamahasiswa[0]['id'] ?
                  "SELECTED" : ""
                ?>><?php echo $d['nama'] ?></option>
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