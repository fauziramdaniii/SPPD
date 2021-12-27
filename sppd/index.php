<?php require_once("koneksi.php");
	$jumlah_pegawai = $conn -> query("SELECT count(nip) as 'jumlah' from pegawai") -> fetch_assoc();
	$jumlah_spt = $conn -> query("SELECT count(IdSPT) as 'jumlah' from spt") -> fetch_assoc();
	$jumlah_sppd = $conn -> query("SELECT count(IdSPPD) as 'jumlah' from sppd") -> fetch_assoc();
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
		  		<a href="index.php"class="img logo rounded mb-5" style="background-image: url(images/logo.png);"></a>
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
				<a href="login.php" class="btn btn-primary">Log Out</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <h2 class="mb-4"><center>DASHBOARD</center></h2>
        <p><center>SELAMAT DATANG DI WEBSITE SPPD DPMPTSP CIAMIS</p></center>
        <p><center>INI ADALAH HALAMAN UTAMA DASHBOARD SPPD</p></center>
  <div class="row">
	<div class="col-sm-4">
		<div class="card text-center">
		  <div class="card-body">
		    <h5 class="card-title">Pegawai</h5>
		    <p class="card-text">Jumlah Pegawai = <?= $jumlah_pegawai["jumlah"]?></p>
		    <a href="pegawai.php" class="btn btn-primary">Data Pegawai</a>
		  </div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="card text-center">
		  <div class="card-body">
		    <h5 class="card-title">SPT</h5>
		    <p class="card-text">Total SPT = <?=$jumlah_spt["jumlah"]?> </p>
		    <a href="sppd.php" class="btn btn-primary">Data SPT</a>
		  </div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="card text-center">
		  <div class="card-body">
		    <h5 class="card-title">SPPD</h5>
		    <p class="card-text">Total SPPD = <?=$jumlah_sppd["jumlah"]?></p>
		    <a href="laporan.php" class="btn btn-primary">Data SPPD</a>
		  </div>
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
<?php $conn -> close();?>