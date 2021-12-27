<?php
require_once '../koneksi.php';
$button = "Tambah";
if (isset($_GET["kode"])) {
  echo $button;
  $button = "Ubah";
}
if (isset($_POST['search'])) {


  $no = 1;
  $search = '%' . $_POST['search'] . '%';

  $query = mysqli_query($conn, "SELECT `IdSPT`, pegawai.Nama, pegawai.jabatan, pegawai.Golongan, `Dasar`, `Kepada`, `kepada2`, `kepada3`, `kepada4`, `Untuk`, `Keterangan`, `Tanggal`, `NomorS` FROM `spt` 
        inner join pegawai on  pegawai.IdPegawai = spt.Kepada where IdSPT like  '{$search}'");
  $query_pengikut = $conn->query("SELECT pegawai.Nama as 'pengikut' FROM `spt` 
        inner join pegawai on  pegawai.IdPegawai = spt.kepada2 where IdSPT like  '{$search}'")->fetch_assoc();

  $query_pengikut2 = $conn->query("SELECT pegawai.Nama as 'pengikut' FROM `spt` 
        inner join pegawai on  pegawai.IdPegawai = spt.kepada3 where IdSPT like  '{$search}'")->fetch_assoc();

  $query_pengikut3 = $conn->query("SELECT pegawai.Nama as 'pengikut' FROM `spt` 
        inner join pegawai on  pegawai.IdPegawai = spt.kepada4 where IdSPT like  '{$search}'")->fetch_assoc();
  if (empty($query_pengikut)) {
    $pengikut = "Tidak ada";
  } else {
    $pengikut = $query_pengikut['pengikut'];
  }

  if (empty($query_pengikut2)) {
    $pengikut2 = "Tidak ada";
  } else {
    $pengikut2 = $query_pengikut2['pengikut'];
  }

  if (empty($query_pengikut3)) {
    $pengikut3 = "Tidak ada";
  } else {
    $pengikut3 = $query_pengikut3['pengikut'];
  }
  $no = 0;
  while ($data_spt = $query->fetch_assoc()) {
    $no = 1;
    mysqli_error($conn);


?>

    <input type="text" class="form-control" id="id" name="id" value="<?= $data_spt['IdSPT'] ?>" hidden>
    <div class="col-md-6">
      <label for="berwenang" class="form-label">Pejabat berwenang yang memberi perintah </label>
      <input styles="" type="text" class="form-control" id="berwenang" name="berwenang" value="Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kab. Ciamis" readonly>
    </div>


    <div class="col-md-6" id="">
      <label for="pegawai" class="form-label">Nama/NIP.Pegawai yang diperintahkan </label>
      <input type="text" class="form-control" id="pegawai" name="pegawai" value="<?= $data_spt['Nama'] ?>" readonly required>
    </div>

    <div class="col-md-6" id="">
      <label for="pangkat" class="form-label">Pangkat dan Golongan</label>
      <input type="text" class="form-control" id="pangkat" name="pangkat" value="<?= $data_spt['Golongan'] ?>" readonly required>
    </div>

    <div class="col-md-6" id="">
      <label for="jabatan" class="form-label">Jabatan/Instansi</label>
      <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $data_spt['jabatan'] ?>" readonly required>
    </div>

    <div class="col-md-6" id="pengikutJS">
      <label for="pengikut" class="form-label">Pengikut 1</label>
      <input type="text" class="form-control" id="pengikut" name="pengikut" value="<?= $pengikut ?>" readonly required>
    </div>

    <div class="col-md-6" id="pengikutJS">
      <label for="pengikut2" class="form-label">Pengikut 2</label>
      <input type="text" class="form-control" id="pengikut2" name="pengikut2" value="<?= $pengikut2 ?>" readonly required>
    </div>

    <div class="col-md-6" id="pengikutJS">
      <label for="pengikut3" class="form-label">Pengikut 3</label>
      <input type="text" class="form-control" id="pengikut3" name="pengikut3" value="<?= $pengikut3 ?>" readonly required>
    </div>

    <div class="col-md-6">
      <label for="biaya" class="form-label">Tingkat Biaya Perjalanan Dinas</label>
      <input type="text" class="form-control" id="biaya" name="biaya" value=" ">
    </div>

    <div class="col-md-6">
      <label for="maksud" class="form-label">Maksud Perjalanan Dinas</label>
      <input type="text" class="form-control" id="maksud" name="maksud" required>
    </div>

    <div class="col-md-6">
      <label for="alat" class="form-label">Alat Angkut Kendaraan yang digunakan</label>
      <input type="text" class="form-control" id="alat" name="alat" required>
    </div>

    <div class="col-md-6">
      <label for="berangkat" class="form-label">Tempat Berangkat</label>
      <input type="text" class="form-control" id="berangkat" name="berangkat" required>
    </div>

    <div class="col-md-6">
      <label for="tujuan" class="form-label">Tempat Tujuan</label>
      <input type="text" class="form-control" id="tujuan" name="tujuan" required>
    </div>

    <div class="col-md-6">
      <label for="lama" class="form-label">Lamanya Perjalanan Dinas (hari)</label>
      <input type="number" class="form-control" id="lama" name="lama" required>
    </div>

    <div class="col-md-6">
      <label for="tanggalB" class="form-label">Tanggal Berangkat</label>
      <input type="date" class="form-control" id="tanggalB" name="tanggalB" required>
    </div>

    <div class="col-md-6">
      <label for="tanggalK" class="form-label">Tanggal Harus Kembali</label>
      <input type="date" class="form-control" id="tanggalK" name="tanggalK" required>
    </div>


    <div class="col-md-6">
      <label for="instansi" class="form-label">Instansi</label>
      <input type="text" class="form-control" id="instansi" name="instansi" value="Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kab. Ciamis" readonly required>
    </div>

    <div class="col-md-6">
      <label for="rekening" class="form-label">Kode Rekening Anggaran</label>
      <input type="text" class="form-control" id="rekening" name="rekening" required>
    </div>

    <div class="col-md-6">
      <label for="ket" class="form-label">Keterangan Lain-Lain</label>
      <input type="text" class="form-control" id="ket" name="ket">
    </div>

    <div class="col-md-6">
      <label for="tanggalD" class="form-label">Di Keluarkan pada tanggal</label>
      <input type="date" class="form-control" id="tanggalD" name="tanggalD" value="<?= $data_spt['Tanggal'] ?>" readonly required>
    </div>



  <?php }
} else {
  $cek = false; // var untuk mengecek input / update
  // variabel BELUM terisi untuk input
  $id = "";
  $nomorS = "";
  $pejabat = "";
  $nama_pegawai = "";
  $pangkat = "";
  $jabatan = "";
  $pengikut = ""; // beda query
  $pengikut2 = ""; // beda query
  $pengikut3 = ""; // beda query
  $biaya = " "; // kosong
  $maksud = "";
  $alat = "";
  $berangkat = "";
  $tujuan = "";
  $lama = "";
  $tanggalB = "";
  $tanggalK = "";
  $instansi = "";
  $rekening = "";
  $ket = " "; //kosong
  $tanggalD = "";
  $button = "Tambah";
  ?>
  <input type="text" class="form-control" id="id" name="id" <?= $id ?> hidden>

  <div class="col-md-6">
    <label for="berwenang" class="form-label">Pejabat berwenang yang memberi perintah </label>
    <input styles="" type="text" class="form-control" id="berwenang" name="berwenang" value="Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kab. Ciamis" readonly>
  </div>


  <div class="col-md-6" id="">
    <label for="pegawai" class="form-label">Nama/NIP.Pegawai yang diperintahkan </label>
    <input type="text" class="form-control" id="pegawai" name="pegawai" <?= $pejabat ?> required>
  </div>

  <div class="col-md-6" id="">
    <label for="pangkat" class="form-label">Pangkat dan Golongan</label>
    <input type="text" class="form-control" id="pangkat" name="pangkat" <?= $pangkat ?> required>
  </div>

  <div class="col-md-6" id="">
    <label for="jabatan" class="form-label">Jabatan/Instansi</label>
    <input type="text" class="form-control" id="jabatan" name="jabatan" <?= $jabatan ?> required>
  </div>

  <div class="col-md-6" id="pengikutJS">
    <label for="pengikut" class="form-label">Pengikut 1</label>
    <input type="text" class="form-control" id="pengikut" name="pengikut" <?= $pengikut ?> required>
  </div>

  <div class="col-md-6" id="pengikutJS">
    <label for="pengikut2" class="form-label">Pengikut 2</label>
    <input type="text" class="form-control" id="pengikut2" name="pengikut2" <?= $pengikut2 ?> required>
  </div>

  <div class="col-md-6" id="pengikutJS">
    <label for="pengikut3" class="form-label">Pengikut 3</label>
    <input type="text" class="form-control" id="pengikut3" name="pengikut3" <?= $pengikut3 ?> required>
  </div>

  <div class="col-md-6">
    <label for="biaya" class="form-label">Tingkat Biaya Perjalanan Dinas</label>
    <input type="text" class="form-control" id="biaya" name="biaya" <?= $biaya ?>>
  </div>

  <div class="col-md-6">
    <label for="maksud" class="form-label">Maksud Perjalanan Dinas</label>
    <input type="text" class="form-control" id="maksud" name="maksud" <?= $maksud ?> required>
  </div>

  <div class="col-md-6">
    <label for="alat" class="form-label">Alat Angkut Kendaraan yang digunakan</label>
    <input type="text" class="form-control" id="alat" name="alat" <?= $alat ?> required>
  </div>

  <div class="col-md-6">
    <label for="berangkat" class="form-label">Tempat Berangkat</label>
    <input type="text" class="form-control" id="berangkat" name="berangkat" <?= $berangkat ?> required>
  </div>

  <div class="col-md-6">
    <label for="tujuan" class="form-label">Tempat Tujuan</label>
    <input type="text" class="form-control" id="tujuan" name="tujuan" <?= $tujuan ?> required>
  </div>

  <div class="col-md-6">
    <label for="lama" class="form-label">Lamanya Perjalanan Dinas (hari)</label>
    <input type="number" class="form-control" id="lama" name="lama" <?= $lama ?> required>
  </div>

  <div class="col-md-6">
    <label for="tanggalB" class="form-label">Tanggal Berangkat</label>
    <input type="date" class="form-control" id="tanggalB" name="tanggalB" <?= $tanggalB ?> required>
  </div>

  <div class="col-md-6">
    <label for="tanggalK" class="form-label">Tanggal Harus Kembali</label>
    <input type="date" class="form-control" id="tanggalK" name="tanggalK" <?= $tanggalK ?> required>
  </div>


  <div class="col-md-6">
    <label for="instansi" class="form-label">Instansi</label>
    <input type="text" class="form-control" id="instansi" name="instansi" readonly value="Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kab. Ciamis" required>
  </div>

  <div class="col-md-6">
    <label for="rekening" class="form-label">Kode Rekening Anggaran</label>
    <input type="text" class="form-control" id="rekening" name="rekening" <?= $rekening ?> required>
  </div>

  <div class="col-md-6">
    <label for="ket" class="form-label">Keterangan Lain-Lain</label>
    <input type="text" class="form-control" id="ket" name="ket" <?= $ket ?>>
  </div>

  <div class="col-md-6">
    <label for="tanggalD" class="form-label">Di Keluarkan pada tanggal</label>
    <input type="date" class="form-control" id="tanggalD" name="tanggalD" <?= $tanggalD ?> readonly required>
  </div>

<?php
} ?>