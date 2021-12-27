
<?php
    require_once '../koneksi.php';
    $button = "Tambah";
    if (isset($_GET["kode"])){
      echo $button;
      $button = "Ubah";
    }
    if (isset($_POST['search'])) {
        

        $no = 1;
        $search = '%'. $_POST['search'] .'%';

        $query = mysqli_query($conn, "SELECT `IdSPT`, pegawai.Nama, pegawai.jabatan, pegawai.Golongan, `Dasar`, `Kepada`, `kepada2`, `kepada3`, `kepada4`, `Untuk`, `Keterangan`, `Tanggal`, `NomorS` FROM `spt` 
        inner join pegawai on  pegawai.IdPegawai = spt.Kepada where IdSPT like  '{$search}'");
        $query_pengikut = $conn -> query("SELECT pegawai.Nama as 'pengikut' FROM `spt` 
        inner join pegawai on  pegawai.IdPegawai = spt.kepada2 where IdSPT like  '{$search}'") -> fetch_assoc();
        if(empty($query_pengikut)){
          $pengikut = "Tidak ada";
        }else{
          $pengikut = $query_pengikut['pengikut'];
        }
        $no = 0;
        while($data_spt = $query->fetch_assoc()) {
        $no = 1;
        mysqli_error($conn);
       
            
?>

      <input type="text" class="form-control" id="id" name="id" value="<?=$data_spt['IdSPT']?>" hidden>
      <div class="col-md-6">
        <label for="berwenang" class="form-label">Pejabat berwenang yang memberi perintah </label>
        <input style="" type="text" class="form-control" id="berwenang" name="berwenang" value="Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kab. Ciamis" readonly>
      </div>
      
    
        <div class="col-md-6" id="">
          <label for="pegawai" class="form-label">Nama/NIP.Pegawai yang diperintahkan </label>
          <input type="text" class="form-control" id="pegawai" name="pegawai" value="<?=$data_spt['Nama']?>">
        </div>

        <div class="col-md-6" id="">
          <label for="pangkat" class="form-label" >Pangkat dan Golongan</label>
          <input type="text" class="form-control" id="pangkat" name="pangkat" value="<?=$data_spt['Golongan']?>">
        </div>

        <div class="col-md-6" id="">
          <label for="jabatan" class="form-label">Jabatan/Instansi</label>
          <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?=$data_spt['jabatan']?>">
        </div>

        <div class="col-md-6" id="pengikutJS">
          <label for="pengikut" class="form-label">Pengikut</label>
          <input type="text" class="form-control" id="pengikut" name="pengikut" value="<?=$pengikut?>">
        </div>

      <div class="col-md-6">
        <label for="biaya" class="form-label">Tingkat Biaya Perjalanan Dinas</label>
        <input type="text" class="form-control" id="biaya" name="biaya">
      </div>

      <div class="col-md-6">
        <label for="maksud" class="form-label">Maksud Perjalanan Dinas</label>
        <input type="text" class="form-control" id="maksud" name="maksud">
      </div>

      <div class="col-md-6">
        <label for="alat" class="form-label">Alat Angkut Kendaraan yang digunakan</label>
        <input type="text" class="form-control" id="alat" name="alat">
      </div>

      <div class="col-md-6">
        <label for="berangkat" class="form-label">Tempat Berangkat</label>
        <input type="text" class="form-control" id="berangkat" name="berangkat">
      </div>

      <div class="col-md-6">
        <label for="tujuan" class="form-label">Tempat Tujuan</label>
        <input type="text" class="form-control" id="tujuan" name="tujuan">
      </div>

      <div class="col-md-6">
        <label for="lama" class="form-label">Lamanya Perjalanan Dinas (hari)</label>
        <input type="number" class="form-control" id="lama" name="lama">
      </div>

      <div class="col-md-6">
        <label for="tanggalB" class="form-label">Tanggal Berangkat</label>
        <input type="date" class="form-control" id="tanggalB" name="tanggalB">
      </div>

      <div class="col-md-6">
        <label for="tanggalK" class="form-label">Tanggal Harus Kembali</label>
        <input type="date" class="form-control" id="tanggalK" name="tanggalK">
      </div>


      <div class="col-md-6">
        <label for="instansi" class="form-label">Instansi</label>
        <input type="text" class="form-control" id="instansi" name="instansi">
      </div>

      <div class="col-md-6">
        <label for="rekening" class="form-label">Kode Rekening Anggaran</label>
        <input type="text" class="form-control" id="rekening" name="rekening">
      </div>

      <div class="col-md-6">
        <label for="ket" class="form-label">Keterangan Lain-Lain</label>
        <input type="text" class="form-control" id="ket" name="ket">
      </div>

      <div class="col-md-6">
        <label for="tanggalD" class="form-label">Di Keluarkan pada tanggal</label>
        <input type="date" class="form-control" id="tanggalD" name="tanggalD" value="<?=$data_spt['Tanggal']?>" readonly>
      </div>
  
    

<?php }
} ?>
