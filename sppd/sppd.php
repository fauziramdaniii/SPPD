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
        <div class="card-body">
        <a href="sppd.php" class="btn btn-primary">Data SPPD</a>    
        <a href="inputsppd.php" class="btn btn-primary">Input Surat Perintah Perjalanan Dinas </a>
		</div>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nomor SPPD</th>
      <th scope="col">Tanggal SPPD</th>
      <th scope="col">Pegawai</th>  
      <th scope="col">Tujuan</th>
      <th><input id="search" class="search" type="text" placeholder="Cari SPPD"></th>
    </tr>
  </thead>
  
  <tbody id="tampil">
  <?php
    $sppd = $conn -> query("SELECT `IdSPPD`, spt.NomorS, spt.Tanggal, pegawai.Nama, `TempTujuan` FROM `sppd` inner join spt on sppd.IdSPPD = spt.IdSPT inner join pegawai on spt.Kepada = pegawai.IdPegawai");
    $no = 1;
    while($data_sppd = $sppd -> fetch_assoc()):
      echo mysqli_error($conn);
  ?>
    <tr>
      <th scope="row"><?=$no++;?></th>
      <td><?=$data_sppd['NomorS']?></td>
      <td><?=$data_sppd['Tanggal']?></td>
      <td><?=$data_sppd['Nama']?></td>
      <td><?=$data_sppd['TempTujuan']?></td>
      <td><a href="inputsppd.php?kode=<?=$data_sppd['IdSPPD']?>"> <input type="submit" name="submit" value="Detail"/>
      <a href="sppd_live.php"><input id="delete" type="submit" name="submit" value="Hapus" /></a> <input type="submit" name="submit" value="Export" /> </td>
    </tr>
    <?php endwhile;?>
  </tbody>
  
</table>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                $.ajax({
                    type: 'POST',
                    url: 'function/sppd_live.php',
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
    <!-- delete -->
    <script>
      $(document).ready(function(){
        $(document).on('click', '#delete', function(){
          confirm("Apakah anda yakin ?");
        });
      });
    </script>
  </body>
</html>