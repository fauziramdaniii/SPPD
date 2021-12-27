<?php
require_once '../koneksi.php';
if (isset($_POST['jenis'])) {

    if ($_POST['jenis'] == 2) {
?>
        <div class="mb-3">
            <label for="Golongan" class="form-label">Golongan</label>
            <input type="text" class="form-control" name="Golongan" id="Golongan" aria-describedby="emailHelp" value="Non PNS" readonly required>
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" aria-describedby="emailHelp" value="Non PNS" readonly required>
        </div>
    <?php } elseif (isset($_POST['kode']) && $_POST['kode'] != "") {

        require_once("../koneksi.php");
        $data_pegawai = $conn->query("SELECT * from pegawai where IdPegawai='{$_POST['kode']}'")->fetch_assoc();
        $golongan = "value='" . $data_pegawai['Golongan'] . "'";
        $jabatan = "value='" . $data_pegawai['jabatan'] . "'";

    ?> <div class="mb-3">
            <label for="Golongan" class="form-label">Golongan</label>
            <input type="text" class="form-control" name="Golongan" id="Golongan" aria-describedby="emailHelp" <?= $golongan ?> required>
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" aria-describedby="emailHelp" <?= $jabatan ?> required>
        </div>
    <?php } else { ?>
        <div class="mb-3">
            <label for="Golongan" class="form-label">Golongan</label>
            <input type="text" class="form-control" name="Golongan" id="Golongan" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" aria-describedby="emailHelp" required>
        </div>
    <?php } ?>
<?php
}
$conn->close();
?>