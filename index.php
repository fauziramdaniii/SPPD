<?php require_once("koneksi.php");
$jumlah_pegawai = $conn->query("SELECT count(nip) as 'jumlah' from pegawai")->fetch_assoc();
$jumlah_spt = $conn->query("SELECT count(IdSPT) as 'jumlah' from spt")->fetch_assoc();
$jumlah_sppd = $conn->query("SELECT count(IdSPPD) as 'jumlah' from sppd")->fetch_assoc();

session_start();
$_SESSION['last_login'] = date('d');
// echo $_SESSION['username'];
if (isset($_SESSION['username'])) {
	// echo $_SESSION['last_login'];

	if ($_SESSION['last_login'] >= $_SESSION['dibuat'] + 1) {
		echo "<script>
			alert('Sesi anda habis');
			window.location.replace('login.php');
		</script>";
	}
} else {
	echo "<script>
        alert('Anda belum login');
		window.location.replace('login.php');
    </script>";
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
			<div class="row">
				<div class="col-sm-4">
					<div class="card text-center">
						<div class="card-body">
							<h5 class="card-title">Pegawai</h5>
							<p class="card-text">Jumlah Pegawai = <?= $jumlah_pegawai["jumlah"] ?></p>
							<a href="pegawai.php" class="btn btn-primary">Data Pegawai</a>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="card text-center">
						<div class="card-body">
							<h5 class="card-title">SPT</h5>
							<p class="card-text">Total SPT = <?= $jumlah_spt["jumlah"] ?> </p>
							<a href="spt.php" class="btn btn-primary">Data SPT</a>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="card text-center">
						<div class="card-body">
							<h5 class="card-title">SPPD</h5>
							<p class="card-text">Total SPPD = <?= $jumlah_sppd["jumlah"] ?></p>
							<a href="sppd.php" class="btn btn-primary">Data SPPD</a>
						</div>
					</div>
				</div>
			</div>
			<br>
			<h4 class="mb-2">
				<center>
					<font face="times new roman">SPT Belum di Approve</font>
				</center>
				</h2>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">
								<center>Nomor SPT
							</th>
							<th scope="col">
								<center>Dasar
							</th>
							<th scope="col">
								<center>Tanggal Terbit
							</th>
							<th scope="col">
								<center>Terbitkan SPPD
							</th>
						</tr>
					</thead>
					<tbody id="tbody_verif">
						<?php
						$verif = $conn->query("SELECT * from spt where verifikasi = 0");
						$no = 1;
						while ($hasil = $verif->fetch_assoc()) :
							$tanggal_buat = date_create($hasil['Tanggal']);
							$tanggal_sekarang = date_create('today');
							$interval = date_diff($tanggal_buat, $tanggal_sekarang);
							if ($interval->format('%a') > 5) {
								$conn->query("DELETE from spt where `IdSPT` = {$hasil['IdSPT']}");
							}
						?>
							<tr>
								<th scope="row"><?= $no++; ?></th>
								<td>
									<center><?= $hasil['NomorS'] ?>
								</td>
								<td>
									<center><?= $hasil['Dasar'] ?>
								</td>
								<td>
									<center><?= $hasil['Tanggal'] ?>
								</td>
								<td>
									<center><a id="verifikasi_button" href="inputsppd.php" data-id="<?= $hasil['IdSPT'] ?>" class="btn btn-primary"> Klik untuk setujui </a>
								</td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>

				<script src="js/jquery-3.6.0.min.js"></script>
				<script src="js/popper.js"></script>
				<script src="js/bootstrap.min.js"></script>
				<script src="js/main.js"></script>
				<!-- Dependencies -->
				<script>
					$(document).ready(function() {
						// ajax update
						$('#verifikasi_button').click(function() {
							var id = $(this).attr("data-id");
							console.log(id);
							$.ajax({
								method: "POST",
								url: "function/index_live.php",
								data: {
									id: id
								},
								success: function(data) {
									$('#tbody_verif').html(data);
								}
							});
						});
					});
				</script>
</body>

</html>
<?php $conn->close(); ?>