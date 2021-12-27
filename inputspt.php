<?php
require_once("koneksi.php"); // file beres 
$cek = false; // var untuk mengecek input / update
// variabel BELUM terisi untuk input
$id = "";
$dasar = "";
$kepada = '';
$kepada2 = 'null';
$kepada3 = 'null';
$kepada4 = 'null';
$untuk = "";
$keterangan = "";
$tanggal = "";
$button = "Tambah";

// cek null kepada 
if (isset($_POST['kepada2']) && isset($_POST['kepada3']) && isset($_POST['kepada4'])) {
  echo "jadi";
  if ($_POST['kepada2'] != 'null' && $_POST['kepada3'] != 'null' && $_POST['kepada4'] != 'null') {
    echo "k2";
    $kepada2 = "'{$_POST['kepada2']}'";
    $kepada3 = "'{$_POST['kepada3']}'";
    $kepada4 = "'{$_POST['kepada4']}'";
  } elseif ($_POST['kepada3'] != 'null' && $_POST['kepada4'] != 'null') {
    echo "k3";
    $kepada3 = "'{$_POST['kepada3']}'";
    $kepada4 = "'{$_POST['kepada4']}'";
  } elseif ($_POST['kepada2'] != 'null' && $_POST['kepada3'] != 'null') {
    echo "k3";
    $kepada2 = "'{$_POST['kepada2']}'";
    $kepada3 = "'{$_POST['kepada3']}'";
  } elseif ($_POST['kepada4'] != 'null') {
    echo "k4";
    $kepada4 = "'{$_POST['kepada4']}'";
  } elseif ($_POST['kepada2'] != 'null') {
    $kepada2 = "'{$_POST['kepada2']}'";
  } elseif ($_POST['kepada3'] != 'null') {
    $kepada3 = "'{$_POST['kepada3']}'";
  }
}


if (isset($_GET["kode"])) {
  $cek = true; // submit jd update
  $data_spt = $conn->query("SELECT * from spt where IdSPT='{$_GET['kode']}'")->fetch_assoc();
  // variabel terisi untuk input
  $id = "value='{$data_spt['NomorS']}'";
  $dasar = "value='{$data_spt['Dasar']}'";
  $untuk = "value='{$data_spt['Untuk']}'";
  $keterangan = "value='{$data_spt['Keterangan']}'";
  $tanggal = "value='{$data_spt['Tanggal']}'";
  $button = "Ubah";
  // cek post submit
  if (isset($_POST['surat1']) && isset($_POST['surat2']) && isset($_POST['surat3']) && isset($_POST['surat4']) && isset($_POST['dasar']) && isset($_POST['kepada']) && isset($_POST['untuk']) && isset($_POST['ket']) && isset($_POST['tanggal'])) {
    // get pecahan surat
    $surat1 = $_POST['surat1'];
    $surat2 = $_POST['surat2'];
    $surat3 = $_POST['surat3'];
    $surat4 = $_POST['surat4'];
    // simpan array -> satukan ke string
    $array_nomor = array();
    array_push($array_nomor, $surat1, $surat2, $surat3, $surat4);
    $nomor_surat = implode("/", $array_nomor);

    mysqli_query($conn, "UPDATE `spt` SET `Dasar`='{$_POST['dasar']}', `Kepada`='{$_POST['kepada']}',`kepada2`={$kepada2},`kepada3`={$kepada3},
      `kepada4`={$kepada4},`Untuk`='{$_POST['untuk']}',`Keterangan`='{$_POST['ket']}',`Tanggal`='{$_POST['tanggal']}',`NomorS`='{$nomor_surat}' WHERE `IdSPT`='{$_GET['kode']}'");
    // echo "test";
    // echo mysqli_error($conn);
    echo "<script>alert('Data berhasil di rubah');
      window.location='spt.php';</script>"; // notif berhasil js
  }
  // echo $_GET["kode"];
  // print_r($data_pegawai);
} elseif (isset($_POST['surat1']) && isset($_POST['surat2']) && isset($_POST['surat3']) && isset($_POST['surat4']) && isset($_POST['dasar']) && isset($_POST['kepada']) && isset($_POST['untuk']) && isset($_POST['ket']) && isset($_POST['tanggal'])) {
  $surat1 = $_POST['surat1'];
  $surat2 = $_POST['surat2'];
  $surat3 = $_POST['surat3'];
  $surat4 = $_POST['surat4'];

  $array_nomor = array();
  array_push($array_nomor, $surat1, $surat2, $surat3, $surat4);
  $nomor_surat = implode("/", $array_nomor);

  mysqli_query($conn, "INSERT INTO `spt`(`IdSPT`, `Dasar`, `Kepada`, `kepada2`, `kepada3`, `kepada4`, `Untuk`, `Keterangan`, `Tanggal`, `NomorS`, `Verifikasi`) 
    VALUES (null,'{$_POST['dasar']}', '{$_POST['kepada']}', {$kepada2}, {$kepada3}, {$kepada4}, '{$_POST['untuk']}', '{$_POST['ket']}', '{$_POST['tanggal']}', '{$nomor_surat}', 0)");
  // echo mysqli_error($conn);
  // echo $_POST['kepada2'];
  echo "<script>alert('Data berhasil di input');
      window.location='spt.php';</script>"; // notif berhasil js
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>SPPD DPMPTSP CIAMIS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="p-4 pt-5">
        <a href="index.php" class="img logo rounded mb-5" style="background-image: url(images/logo.png);"></a>
        <ul class="list-unstyled components mb-5">
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            <a href="pegawai.php">Form Pegawai</a>
          </li>
          <li>
            <a href="spt.php">Form SPT</a>
          </li>
          <li>
            <a href="sppd.php">Form SPPD</a>
        </ul>


      </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

      <nav class="navbar navbar-expand-lg navbar-primary bg-dark">
        <div class="container-fluid">

          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
              <li class="nav-item active">
                <a href="function/logout.php" class="btn btn-primary">Log Out</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="card-body">
        <a href="spt.php" class="btn btn-primary">Data SPT</a>
        <a href="inputspt.php" class="btn btn-primary">Input Surat Perintah Tugas </a>
      </div>
      <form method="POST">
        <!-- <input type="text" name="<?= $button ?>" hidden> -->
        <!--  -->
        <div class="form-row">
          <?php
          if (isset($_GET['kode'])) {
            $nomor_surat_get = $conn->query("SELECT `NomorS` from `spt` where IdSPT = {$_GET['kode']}")->fetch_row();
            $array_nomor_get = explode("/", $nomor_surat_get[0]);
            $surat1 = $array_nomor_get[0];
            $surat2 = $array_nomor_get[1];
            $surat3 = $array_nomor_get[2];
            $surat4 = $array_nomor_get[3];
          } else {
            $surat1 = "";
            $surat2 = "";
            $surat3 = "";
            $surat4 = "";
          }
          ?>
          <div class="col" style="white-space:nowrap; display: inline-block;">
            <label for="Surat Tugas" class="form-label"> Surat Tugas </label>
            <input type="number" class="form-control" placeholder="090" value="<?= $surat1 ?>" name="surat1" required>
          </div>
          <div style="margin-top: 40px;">/</div>
          <div class="col">
            <label for="Surat Tugas" class="form-label"> Nomor Surat </label>
            <input type="number" class="form-control" placeholder="1" value="<?= $surat2 ?>" name="surat2" required>
          </div>
          <div style="margin-top: 40px;">/</div>
          <div class="col">
            <label for="Surat Tugas" class="form-label"> Dinas.KodeDinas </label>
            <input type="text" class="form-control" placeholder="DPMPTSTP.01" value="<?= $surat3 ?>" name="surat3" required>
          </div>
          <div style="margin-top: 40px;">/</div>
          <div class="col">
            <label for="Surat Tugas" class="form-label"> Tahun </label>
            <input type="number" class="form-control" placeholder="2021" value="<?= $surat4 ?>" name="surat4" required>
          </div>
        </div>
        <!--  -->
        <div class="mb-3">
          <label for="dasar" class="form-label">Dasar</label>
          <input type="text" class="form-control" name="dasar" id="dasar" aria-describedby="emailHelp" <?= $dasar ?> required>
          <div id="emailHelp" class="form-text"></div>
        </div>
        <!-- kepada -->
        <div class="mb-3">
          <div class="mb-3">
            <label for="kepada">Kepada</label></br>
            <?php
            $pegawai_spt = $conn->query("SELECT * from pegawai where jenis='PNS' order by Nama");
            ?>
            <select name="kepada" id="kepada" class="form-control">
              <?php if (isset($_GET['kode'])) {
                $pegawai_terpilih = $conn->query("SELECT pegawai.IdPegawai, pegawai.Nama from pegawai 
            inner join spt on pegawai.IdPegawai = spt.kepada where spt.IdSPT ='{$_GET['kode']}' order by pegawai.nama")->fetch_assoc();
                if (empty($pegawai_terpilih) == true) {
              ?>
                  <option value="null" selected>Pilih Pegawai PNS</option>
                <?php } else { ?>
                  <option value="<?= $pegawai_terpilih['IdPegawai'] ?>" selected><?= $pegawai_terpilih['Nama'] ?></option>
                <?php } ?>
              <?php } else { ?>
                <option value="null" selected>Pilih Pegawai PNS</option>
              <?php } ?>
              <?php

              while ($data_pegawai_spt = $pegawai_spt->fetch_assoc()) :
              ?>
                <option value="<?= $data_pegawai_spt['IdPegawai'] ?>" data-nip="<?= $data_pegawai_spt['NIP'] ?>"><?= $data_pegawai_spt['Nama'] ?></option>
              <?php endwhile; ?>
            </select>
            <!--  -->

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">NIP</span>
              </div>
              <input id="nip" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" readonly>
            </div>
          </div>

          <!-- kepada 2 -->
          <div class="mb-3">
            <label for="kepada2">Kepada 2</label></br>
            <?php
            $pegawai_spt = $conn->query("SELECT * from pegawai order by Nama");
            ?>
            <select name="kepada2" id="kepada2" class="form-control">
              <?php if (isset($_GET['kode'])) {
                $pegawai_terpilih = $conn->query("SELECT pegawai.IdPegawai, pegawai.Nama from pegawai 
            inner join spt on pegawai.IdPegawai = spt.kepada2 where spt.IdSPT ='{$_GET['kode']}' order by pegawai.nama")->fetch_assoc();
                if (empty($pegawai_terpilih) == true) {
              ?>
                  <option value="null" selected>Tidak Ada</option>
                <?php } else { ?>
                  <option value="<?= $pegawai_terpilih['IdPegawai'] ?>" selected><?= $pegawai_terpilih['Nama'] ?></option>
                <?php } ?>
              <?php } else { ?>
                <option value="null" selected>Tidak Ada</option>
              <?php } ?>
              <?php

              while ($data_pegawai_spt = $pegawai_spt->fetch_assoc()) :
              ?>
                <option value="<?= $data_pegawai_spt['IdPegawai'] ?>"><?= $data_pegawai_spt['Nama'] ?></option>
              <?php endwhile; ?>
            </select>
            <div id="emailHelp" class="form-text"></div>
          </div>

          <!-- kepada 3 -->
          <div class="mb-3">
            <label for="kepada3"> Kepada 3</label></br>
            <?php
            $pegawai_spt = $conn->query("SELECT * from pegawai order by Nama");
            ?>
            <select name="kepada3" id="kepada3" class="form-control">
              <?php if (isset($_GET['kode'])) {
                $pegawai_terpilih = $conn->query("SELECT pegawai.IdPegawai, pegawai.Nama from pegawai 
            inner join spt on pegawai.IdPegawai = spt.kepada3 where spt.IdSPT ='{$_GET['kode']}' order by pegawai.nama")->fetch_assoc();
                if (empty($pegawai_terpilih) == true) {
              ?>
                  <option value="null" selected>Tidak Ada</option>
                <?php } else { ?>
                  <option value="<?= $pegawai_terpilih['IdPegawai'] ?>" selected><?= $pegawai_terpilih['Nama'] ?></option>
                <?php } ?>
              <?php } else { ?>
                <option value="null" selected>Tidak Ada</option>
              <?php } ?>
              <?php

              while ($data_pegawai_spt = $pegawai_spt->fetch_assoc()) :
              ?>
                <option value="<?= $data_pegawai_spt['IdPegawai'] ?>"><?= $data_pegawai_spt['Nama'] ?></option>
              <?php endwhile; ?>
            </select>
            <div id="emailHelp" class="form-text"></div>
          </div>

          <!-- kepada 4 -->
          <div class="mb-3">
            <label for="kepada4" class="form-label">Kepada 4</label></br>
            <?php
            $pegawai_spt = $conn->query("SELECT * from pegawai order by Nama");
            ?>
            <select name="kepada4" id="kepada4" class="form-control">
              <?php if (isset($_GET['kode'])) {
                $pegawai_terpilih = $conn->query("SELECT pegawai.IdPegawai, pegawai.Nama from pegawai 
            inner join spt on pegawai.IdPegawai = spt.kepada4 where spt.IdSPT ='{$_GET['kode']}' order by pegawai.nama")->fetch_assoc();
                if (empty($pegawai_terpilih) == true) {
              ?>
                  <option value="null" selected>Tidak Ada</option>
                <?php } else { ?>
                  <option value="<?= $pegawai_terpilih['IdPegawai'] ?>" selected><?= $pegawai_terpilih['Nama'] ?></option>
                <?php } ?>
              <?php } else { ?>
                <option value="null" selected>Tidak Ada</option>
              <?php } ?>
              <?php

              while ($data_pegawai_spt = $pegawai_spt->fetch_assoc()) :
              ?>
                <option value="<?= $data_pegawai_spt['IdPegawai'] ?>"><?= $data_pegawai_spt['Nama'] ?></option>
              <?php endwhile; ?>
            </select>
            <div id="emailHelp" class="form-text"></div>
          </div>

          <div class="mb-3">
            <label for="untuk" class="form-label">Untuk</label>
            <input type="text" class="form-control" name="untuk" id="untuk" aria-describedby="emailHelp" <?= $untuk ?> required>
            <div id="emailHelp" class="form-text"></div>
          </div>
          <div class="mb-3">
            <label for="ket" class="form-label">Keterangan</label>
            <input type="text" class="form-control" name="ket" id="ket" aria-describedby="emailHelp" <?= $keterangan ?> required>
            <div id="emailHelp" class="form-text"></div>
          </div>
          <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" aria-describedby="emailHelp" <?= $tanggal ?> required>
            <div id="emailHelp" class="form-text"></div>
          </div>
          <button type="submit" class="btn btn-primary"><?= $button ?></button>
      </form>
      <script src="js/jquery-3.6.0.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <script>
        $(document).ready(function() {
          $(document).on('change', '#kepada', function() {
            var nip = $(this).find(":selected").attr('data-nip');
            $('#nip').val(nip);
            // console.log(nip);
          });
        });
      </script>

</body>

</html>