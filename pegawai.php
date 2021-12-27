<?php
// tinggal bag print, 
require_once("koneksi.php");
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
          </li>
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
        <select class="btn btn-primary" id="pilih">
          <option value="S"> Pegawai </option>
          <option value="PNS"> PNS </option>
          <option value="Non"> Non PNS</option>
        </select>
        <a href="inputpegawai.php" class="btn btn-primary">Input Pegawai</a>
      </div>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">NIP</th>
            <th scope="col">Nama Pegawai</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Pangkat dan Golongan</th>
            <th><input class="search" type="text" placeholder="Cari Pegawai" id="search" name="search"></th>
          </tr>
        </thead>
        <!-- <div class="data"></div> -->
        <tbody id="tampil">
          <?php $pegawai = $conn->query("SELECT * from pegawai");
          $no = 1;
          while ($data_pegawai = $pegawai->fetch_assoc()) :
          ?>
            <tr>
              <th scope="row"><?= $no++; ?></th>
              <td><?= $data_pegawai['NIP'] ?></td>
              <td><?= $data_pegawai['Nama'] ?></td>
              <td><?= $data_pegawai['jabatan'] ?></td>
              <td><?= $data_pegawai['Golongan'] ?></td>
              <td><a href="inputpegawai.php?kode=<?= $data_pegawai['IdPegawai'] ?>"> <input type="submit" name="submit" value="Detail" /></a>
                <a id="delete" href="function/pegawai_live.php?kode=<?= $data_pegawai['IdPegawai'] ?>" onclick="return confirm('Apakah anda yakin ? (data SPT dan SPPd yang berkaitan akan terhapus)')"><input type="submit" name="submit" value="Hapus" data-hapus="<?= $data_pegawai['NIP'] ?>" />
              </td>

            </tr>
          <?php endwhile; ?>
        </tbody>

      </table>

      <script src="js/jquery-3.6.0.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <!-- Ajax live search -->
      <script>
        $(document).ready(function() {

          // custom function
          function tampil_data(pilih, search) {
            $.ajax({
              method: "POST",
              url: "function/pegawai_live.php",
              data: {
                pilih: pilih,
                search: search
              },
              success: function(data) {
                $('#tampil').html(data);
              }
            });
          }
          $('#search').keyup(function() {
            let pilih = $('#pilih').val();
            let search = $('#search').val();
            tampil_data(pilih, search);
          });
          $('#pilih').change(function() {
            let pilih = $('#pilih').val();
            let search = $('#search').val();
            tampil_data(pilih, search);
          });
        });
      </script>

</body>

</html>
<?php $conn->close(); ?>