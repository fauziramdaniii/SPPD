<?php
  require_once("koneksi.php"); // file beres 
  $cek = false; // var untuk mengecek input / update
  // variabel BELUM terisi untuk input
  $nip = "" ;
  $nama = "";
  $golongan = "";
  $jabatan = "";
  $jenis1 = "";
  $jenis2 = "";
  $button = "Tambah";

  if (isset($_GET["kode"])){
    $cek = true; // submit jd update
    $data_pegawai = $conn -> query("SELECT * from pegawai where IdPegawai='{$_GET['kode']}'") -> fetch_assoc();
    // variabel terisi untuk input
    $nip = "value='".$data_pegawai['NIP']."'"; 
    $nama = "value='".$data_pegawai['Nama']."'";
    $golongan = "value='".$data_pegawai['Golongan']."'";
    $jabatan = "value='".$data_pegawai['jabatan']."'";
    // cek jenis untuk select nanti
      if ($data_pegawai['jenis'] == 'PNS')
        { $jenis1 = "selected";
          $jenis2 = "";
        }elseif($data_pegawai['jenis'] == 'Non PNS'){
          $jenis1 = "";
          $jenis2 = "selected";
        }
    $button = "Ubah";
    // cek post submit
    if (isset($_POST["NIP"]) && isset($_POST["Nama"]) && isset($_POST["Golongan"]) && isset($_POST["jabatan"])){
      mysqli_query($conn, "UPDATE pegawai set NIP='{$_POST['NIP']}', Nama='{$_POST['Nama']}', Golongan='{$_POST['Golongan']}', 
      jabatan='{$_POST['jabatan']}', jenis='{$_POST['jenis']}' where IdPegawai='{$_GET["kode"]}'");
      echo"<script>alert('Data berhasil di rubah');
      window.location='pegawai.php';</script>"; // notif berhasil js
    }
    // echo $_GET["kode"];
    // print_r($data_pegawai);
  }elseif(isset($_POST["NIP"]) && isset($_POST["Nama"]) && isset($_POST["Golongan"]) && isset($_POST["jabatan"])){
    mysqli_query($conn, "INSERT into pegawai (`IdPegawai`, `NIP`, `Nama`, `Golongan`, `tmt`, `jabatan`, `pendidikanT`, `jurusan`, `univ`, `ket`, `jenis`)  
    values(null, '{$_POST['NIP']}', '{$_POST['Nama']}', '{$_POST['Golongan']}', null, '{$_POST['jabatan']}', null, null, null, null, '{$_POST['jenis']}')");
      echo"<script>alert('Data berhasil di input');
      window.location='pegawai.php';</script>"; // notif berhasil js
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
        <a href="pegawai.php" class="btn btn-primary">Data Pegawai</a>    
        <a href="inputpegawai.php" class="btn btn-primary">Input Pegawai</a>
		</div>
  <form action="" method="POST" id="form_submit">
    <div class="mb-3">
    </br><label for="jenis" class="form-label">Jenis Pegawai: </label>
      <select name="jenis" id="jenis">
              <option value="1" <?=$jenis1?>>PNS</option>
              <option value="2" <?=$jenis2?>>Non PNS</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="NIP" class="form-label">NIP</label>
      <input type="text" class="form-control" name="NIP" id="NIP" aria-describedby="emailHelp" <?=$nip?> placeholder="Format pengetikan: 12345678 123456 1 123">
    </div>
    <div class="mb-3">
      <label for="Nama" class="form-label">Nama</label>
      <input type="text" class="form-control" name="Nama" id="Nama" aria-describedby="emailHelp" <?=$nama?>>
    </div>
          


      <div id="input">
            <div class="mb-3">
              <label for="Golongan" class="form-label">Golongan</label>
              <input type="text" class="form-control" name="Golongan" id="Golongan" aria-describedby="emailHelp" <?=$golongan?>>
            </div>
            <div class="mb-3">
              <label for="jabatan" class="form-label">Jabatan</label>
              <input type="text" class="form-control" name="jabatan" id="jabatan" aria-describedby="emailHelp" <?=$jabatan?>>
            </div>
      </div>


    <button type="submit" class="btn btn-primary" id="update"><?=$button?></button>
  </form>
         
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- Ajax live ganti jenis -->
    <script type="text/javascript">
    // get data from url
    let params = new URLSearchParams(location.search);
    let kode = params.get('kode');
    // mulai fungsi ajax
    $(document).ready(function() {
        $('#jenis').change(function() {
            var jenis = $('#jenis').val();
            $.ajax({
                type: 'POST',
                url: 'function/inputP_live.php',
                data: {
                    jenis: jenis, kode: kode
                },
                cache: false,
                success: function(data) {
                    $('#input').html(data);
                    if(jenis == 2){
                      document.getElementById("NIP").value = "Non PNS";
                      document.getElementById("NIP").readOnly = true;
                    }else{
                      document.getElementById("NIP").value = "";
                      document.getElementById("NIP").readOnly = false;
                    }
                    
                }
            });
        });

    });
</script>
  </body>
</html>
<?php
  $conn -> close();
?>