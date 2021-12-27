<?php
  require_once("koneksi.php");
  $data_pegawai = $conn -> query("SELECT * from pegawai where NIP='{$_GET['nip']}'") -> fetch_assoc();
?>
<form class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">NIP</label>
    <input type="text" class="form-control" id="inputEmail4" value="<?=$data_pegawai['NIP']?>" readonly>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Nama</label>
    <input style="" type="text" class="form-control" id="inputPassword4" value="<?=$data_pegawai['Nama']?>" readonly>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Golongan </label>
    <input type="text" class="form-control" id="inputEmail4" value="<?=$data_pegawai['Golongan']?>" readonly>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">tmt</label>
    <input type="text" class="form-control" id="inputPassword4" value="<?=$data_pegawai['tmt']?>" readonly>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Jabatan</label>
    <input type="text" class="form-control" id="inputEmail4" value="<?=$data_pegawai['jabatan']?>" readonly>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Pendidikan Terakhir</label>
    <input type="text" class="form-control" id="inputPassword4" value="<?=$data_pegawai['pendidikanT']?>" readonly>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Jurusan</label>
    <input type="text" class="form-control" id="inputEmail4" value="<?=$data_pegawai['jurusan']?>" readonly>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Universitas</label>
    <input type="text" class="form-control" id="inputPassword4" value="<?=$data_pegawai['univ']?>" readonly>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Keterangan</label>
    <input type="text" class="form-control" id="inputEmail4" value="<?=$data_pegawai['ket']?>" readonly>
  </div>
</form>
<?php $conn -> close();?>