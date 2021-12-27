<?php
  require_once('koneksi.php');
  $cek = false; // var untuk mengecek input / update
  // variabel BELUM terisi untuk input
  $id = "" ;
  $nomorS = "";
  $pejabat = "";
  $nama_pegawai = "";
  $pangkat = "";  
  $jabatan = "";
  $pengikut = ""; // beda query
  $biaya = "";
  $maksud = "";
  $alat = "";
  $berangkat = "";
  $tujuan = "";
  $lama = "";
  $tanggalB = "";
  $tanggalK = "";
  $instansi = "";
  $rekening = "";
  $ket = "";
  $tanggalD = "";
  $button = "Tambah";


  if (isset($_GET["kode"])){
    $cek = true; // submit jd update
    $data_sppd = $conn -> query("SELECT `IdSPPD`, spt.NomorS, sppd.pejabatBerwenang, pegawai.Nama, pegawai.Golongan, pegawai.jabatan, sppd.Biaya, sppd.Maksud, sppd.Angkut, sppd.TempBerangkat, sppd.TempTujuan, sppd.Lama, sppd.TanggalBerangkat, sppd.TanggalKembali, sppd.Instansi, sppd.KodeRek, sppd.Keterangan, spt.Tanggal as 'TanggalD'  
    FROM `sppd` inner join spt on sppd.IdSPPD = spt.IdSPT inner join pegawai on spt.Kepada = pegawai.IdPegawai where IdSPPD = '{$_GET['kode']}'") -> fetch_assoc();
    $data_pengikut = $conn -> query("SELECT pegawai.Nama as 'pengikut' FROM `spt` 
    inner join pegawai on  pegawai.IdPegawai = spt.kepada2 where IdSPT  ='{$_GET['kode']}'") -> fetch_assoc();
    // variabel terisi untuk input
    $id = "value='".$data_sppd['IdSPPD']."' readonly"; 
    $nomorS = "value='".$data_sppd['NomorS']."' readonly";
    $pejabat = "value='".$data_sppd['pejabatBerwenang']."' readonly";
    $nama_pegawai = "value='".$data_sppd['Nama']."' readonly";
    $pangkat = "value='".$data_sppd['Golongan']."' readonly";
    $jabatan = "value='".$data_sppd['jabatan']."' readonly";
    $pengikut = "value='".$data_pengikut['pengikut']."' readonly";// beda query
    $biaya = "value='".$data_sppd['Biaya']."'";
    $maksud = "value='".$data_sppd['Maksud']."'";
    $alat = "value='".$data_sppd['Angkut']."'";
    $berangkat = "value='".$data_sppd['TempBerangkat']."'";
    $tujuan = "value='".$data_sppd['TempTujuan']."'";
    $lama = "value='".$data_sppd['Lama']."'";
    $tanggalB = "value='".$data_sppd['TanggalBerangkat']."'";
    $tanggalK = "value='".$data_sppd['TanggalKembali']."'";
    $instansi = "value='".$data_sppd['Instansi']."'";
    $rekening = "value='".$data_sppd['KodeRek']."'";
    $ket = "value='".$data_sppd['Keterangan']."'";
    $tanggalD = "value='".$data_sppd['TanggalD']."' readonly";

    $button = "Ubah";
    // cek post submit
    if (isset($_POST['id']) && isset($_POST['tanggalB']) && isset($_POST['maksud']) && isset($_POST['alat']) && isset($_POST['berangkat'])){
      mysqli_query($conn, "UPDATE `sppd` SET `IdSPPD`={$_POST['id']},`TanggalBerangkat`='{$_POST['tanggalB']}',`Maksud`='{$_POST['maksud']}',`Angkut`='{$_POST['alat']}',`TempBerangkat`='{$_POST['berangkat']}',
      `TempTujuan`='{$_POST['tujuan']}',`Lama`={$_POST['lama']},`Instansi`='{$_POST['instansi']}',`KodeRek`='{$_POST['rekening']}',`Keterangan`='{$_POST['ket']}',`pejabatBerwenang`='{$_POST['berwenang']}',
      `TanggalKembali`='{$_POST['tanggalK']}',`Biaya`='{$_POST['biaya']}' WHERE `IdSPPD`={$_POST['id']}");
      echo"<script>alert('Data berhasil di rubah');
      window.location='sppd.php';</script>"; // notif berhasil js
    }
    // echo $_GET["kode"];
    // print_r($data_pegawai);
  }elseif(isset($_POST['id']) && isset($_POST['tanggalB']) && isset($_POST['maksud']) && isset($_POST['alat']) && isset($_POST['berangkat'])){
    echo $_POST['id'];
    echo $_POST['tanggalB'];
    mysqli_query($conn, "INSERT INTO `sppd`(`IdSPPD`, `TanggalBerangkat`, `Maksud`, `Angkut`, `TempBerangkat`, `TempTujuan`, `Lama`, `Instansi`, `KodeRek`, `Keterangan`, `pejabatBerwenang`, `TanggalKembali`, `Biaya`) 
    VALUES ({$_POST['id']}, '{$_POST['tanggalB']}', '{$_POST['maksud']}', '{$_POST['alat']}', '{$_POST['berangkat']}', '{$_POST['tujuan']}', {$_POST['lama']}, '{$_POST['instansi']}', '{$_POST['rekening']}', '{$_POST['ket']}', '{$_POST['berwenang']}', '{$_POST['tanggalK']}', '{$_POST['biaya']}')");
     echo mysqli_error($conn);
      // echo"<script>alert('Data berhasil di input');
      // window.location='sppd.php';</script>"; // notif berhasil js
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
        <a href="sppd.php" class="btn btn-primary">Data SPPD</a>    
        <a href="inputsppd.php" class="btn btn-primary">Input Surat Perintah Perjalanan Dinas </a>
		</div>

    <form class="row g-3" action="">
    <?php 
      $id_spt = $conn -> query("SELECT * from spt") -> fetch_assoc();
    ?>
  
  <div class="col-md-6">
    <label for="nomor" class="form-label">Nomor SPPD</label>
    <div id="nomor_ganti">
    <input id="search" list="nomor" class="form-control" id="nomor" name="nomor" <?=$nomorS?>></div>
      <datalist id="nomor">
        <?php
          $nomor_spt = $conn -> query("SELECT * from spt");
          while($spt = $nomor_spt -> fetch_assoc()):
          
        ?>
          <option id="optionID" value="<?=$spt['IdSPT']?>"><?=$spt['NomorS']?></option>
        <?php endwhile; ?>
        <!-- <input id="hid" class="form-control" name="nomor" value=""> -->
    </datalist>
  </div>
      
  </form>

<form class="row g-3" method="POST" id="tampil">
    <input type="text" class="form-control" id="id" name="id" <?=$id?> hidden>

      <div class="col-md-6">
        <label for="berwenang" class="form-label">Pejabat berwenang yang memberi perintah </label>
        <input style="" type="text" class="form-control" id="berwenang" name="berwenang" value="Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kab. Ciamis" readonly>
      </div>
      
    
        <div class="col-md-6" id="">
          <label for="pegawai" class="form-label">Nama/NIP.Pegawai yang diperintahkan </label>
          <input type="text" class="form-control" id="pegawai" name="pegawai" <?=$pejabat?>>
        </div>

        <div class="col-md-6" id="">
          <label for="pangkat" class="form-label" >Pangkat dan Golongan</label>
          <input type="text" class="form-control" id="pangkat" name="pangkat" <?=$pangkat?>>
        </div>

        <div class="col-md-6" id="">
          <label for="jabatan" class="form-label">Jabatan/Instansi</label>
          <input type="text" class="form-control" id="jabatan" name="jabatan" <?=$jabatan?>>
        </div>

        <div class="col-md-6" id="pengikutJS">
          <label for="pengikut" class="form-label">Pengikut</label>
          <input type="text" class="form-control" id="pengikut" name="pengikut" <?=$pengikut?>>
        </div>

      <div class="col-md-6">
        <label for="biaya" class="form-label">Tingkat Biaya Perjalanan Dinas</label>
        <input type="text" class="form-control" id="biaya" name="biaya" <?=$biaya?>>
      </div>

      <div class="col-md-6">
        <label for="maksud" class="form-label">Maksud Perjalanan Dinas</label>
        <input type="text" class="form-control" id="maksud" name="maksud" <?=$maksud?>>
      </div>

      <div class="col-md-6">
        <label for="alat" class="form-label">Alat Angkut Kendaraan yang digunakan</label>
        <input type="text" class="form-control" id="alat" name="alat" <?=$alat?>>
      </div>

      <div class="col-md-6">
        <label for="berangkat" class="form-label">Tempat Berangkat</label>
        <input type="text" class="form-control" id="berangkat" name="berangkat" <?=$berangkat?>>
      </div>

      <div class="col-md-6">
        <label for="tujuan" class="form-label">Tempat Tujuan</label>
        <input type="text" class="form-control" id="tujuan" name="tujuan" <?=$tujuan?>>
      </div>

      <div class="col-md-6">
        <label for="lama" class="form-label">Lamanya Perjalanan Dinas (hari)</label>
        <input type="number" class="form-control" id="lama" name="lama" <?=$lama?>>
      </div>

      <div class="col-md-6">
        <label for="tanggalB" class="form-label">Tanggal Berangkat</label>
        <input type="date" class="form-control" id="tanggalB" name="tanggalB" <?=$tanggalB?>>
      </div>

      <div class="col-md-6">
        <label for="tanggalK" class="form-label">Tanggal Harus Kembali</label>
        <input type="date" class="form-control" id="tanggalK" name="tanggalK" <?=$tanggalK?>>
      </div>


      <div class="col-md-6">
        <label for="instansi" class="form-label">Instansi</label>
        <input type="text" class="form-control" id="instansi" name="instansi" <?=$instansi?>>
      </div>

      <div class="col-md-6">
        <label for="rekening" class="form-label">Kode Rekening Anggaran</label>
        <input type="text" class="form-control" id="rekening" name="rekening" <?=$rekening?>>
      </div>

      <div class="col-md-6">
        <label for="ket" class="form-label">Keterangan Lain-Lain</label>
        <input type="text" class="form-control" id="ket" name="ket" <?=$ket?>>
      </div>

      <div class="col-md-6">
        <label for="tanggalD" class="form-label">Di Keluarkan pada tanggal</label>
        <input type="date" class="form-control" id="tanggalD" name="tanggalD" <?=$tanggalD?> readonly>
      </div>
  
     

  
</form>
<div class="col-md-6">
    <br>
<button id="submit" type="submit" class="btn btn-primary"><?=$button?></button></div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
        let params = new URLSearchParams(location.search);
        let kode = params.get('kode');
       
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                $.ajax({
                    type: 'POST',
                    url: 'function/inputSPPD_live.php',
                    data: {
                        search: $(this).val(), kode: kode
                    },
                    cache: false,
                    success: function(data) {
                        $('#tampil').html(data);
                        
                    }
                });
                let nomor = $('#nomor').val();
                // $.ajax({
                //     type: 'POST',
                //     url: 'function/inputSPPD_nomor.php',
                //     data: {
                //         nomor: nomor
                //     },
                //     cache: false,
                //     success: function(data) {
                //         $('#nomor_ganti').html(data);
                      
                //     }
                // });
            });
        });
    </script>
    <script>
          $(document).ready(function() {
            $(document).on('click', '#submit', function(){	
              $('#tampil').submit();

		        });
        });
    </script>
  </body>
</html>
<?php $conn -> close();?>