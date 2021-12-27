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
          <li>
            <a href="kwitansi.php">Form Kwitansi</a>
          </li>
          <li>
            <a href="laporan.php">Form Laporan</a>
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
                <a href="login.php" class="btn btn-primary">Log Out</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="card-body">
        <a href="kwitansi.php" class="btn btn-primary">Data Kwitansi</a>
        <a href="inputkwitansi.php" class="btn btn-primary">Input Kwitansi </a>
      </div>
      <form class="row g-3">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Nomor SPPD</label>
          <input type="text" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Pejabat berwenang yang memberi perintah </label>
          <input type="text" class="form-control" id="inputPassword4">
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Nama/NIP.Pegawai yang diperintahkan </label>
          <input type="text" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Pangkat dan Golongan</label>
          <input type="text" class="form-control" id="inputPassword4">
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Jabatan/Instansi</label>
          <input type="text" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Tingkat Biaya Perjalanan Dinas</label>
          <input type="text" class="form-control" id="inputPassword4">
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Maksud Perjalanan Dinas</label>
          <input type="text" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Alat Angkut Kendaraan yang digunakan</label>
          <input type="text" class="form-control" id="inputPassword4">
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Tempat Berangkat</label>
          <input type="text" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Tempat Tujuan</label>
          <input type="text" class="form-control" id="inputPassword4">

          <br>
          <div><button type="submit" class="btn btn-primary">Tambah</button></div>
      </form>
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
</body>

</html>