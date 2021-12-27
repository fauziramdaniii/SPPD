<?php
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
        <a href="spt.php" class="btn btn-primary">Data SPT</a>
        <a href="inputspt.php" class="btn btn-primary">Input Surat Perintah Tugas </a>

      </div>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nomor Surat</th>
            <th scope="col">Kepada</th>
            <th scope="col">Tanggal</th>
            <th><input id="search" class="search" type="text" placeholder="Cari SPT"></th>
          </tr>
        </thead>

        <tbody id="tampil">
          <?php
          $spt = $conn->query("SELECT spt.IdSPT, spt.NomorS, spt.Tanggal, pegawai.Nama from spt inner join pegawai on spt.Kepada=pegawai.IdPegawai");

          $no = 1;
          while ($data_spt = $spt->fetch_assoc()) :
            echo mysqli_error($conn);
          ?>
            <tr>
              <th scope="row"><?= $no++; ?></th>
              <td><?= $data_spt['NomorS'] ?></td>
              <td><?= $data_spt['Nama'] ?></td>
              <td><?= $data_spt['Tanggal'] ?></td>
              <input id="kode" type="text" value="<?= $data_spt['IdSPT'] ?>" hidden>
              <td><a href="inputspt.php?kode=<?= $data_spt['IdSPT'] ?>"> <input type="submit" name="submit" value="Detail" /></a>
                <a id="delete" href="function/spt_live.php?kode=<?= $data_spt['IdSPT'] ?>" onclick="return confirm('Apakah anda yakin ? (menghapus SPT akan menghapus SPPD yang berkaitan)')"><input type="submit" name="submit" value="Hapus" /></a>
                <a target="_blank" href="function/export_spt.php?kode=<?= $data_spt['IdSPT'] ?>"><input type="submit" name="submit" value="Export Excel" /> </a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>

      </table>
      <script src="js/jquery-3.6.0.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/sweetalert.min.js"></script>
      <script src="js/main.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {
          $('#search').on('keyup', function() {
            $.ajax({
              type: 'POST',
              url: 'function/spt_live.php',
              data: {
                search: $(this).val()
              },
              cache: false,
              success: function(data) {
                $('#tampil').html(data);
              }
            });
          });
        });
      </script>
</body>

</html>
<?php $conn->close(); ?>