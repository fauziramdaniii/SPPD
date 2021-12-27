<?php
require_once '../koneksi.php';
if (isset($_POST['search'])) {

    $no = 1;
    $search = '%' . $_POST['search'] . '%';

    $query = mysqli_query($conn, "SELECT `IdSPPD`, spt.NomorS, spt.Tanggal, pegawai.Nama, `TempTujuan` FROM `sppd` 
        inner join spt on sppd.IdSPT = spt.IdSPT 
        inner join pegawai on spt.Kepada = pegawai.IdPegawai where IdSPPD 
        like '$search' or spt.NomorS like '$search' or spt.Tanggal like '$search' or pegawai.Nama like '$search' or TempTujuan like '$search' ");
    while ($data_sppd = $query->fetch_assoc()) {
        mysqli_error($conn);

?>
        <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $data_sppd['NomorS'] ?></td>
            <td><?= $data_sppd['Tanggal'] ?></td>
            <td><?= $data_sppd['Nama'] ?></td>
            <td><?= $data_sppd['TempTujuan'] ?></td>
            <td><a href="inputsppd.php?kode=<?= $data_sppd['IdSPPD'] ?>"> <input type="submit" name="submit" value="Detail" />
                    <a href="function/sppd_live.php?kode=<?= $data_sppd['IdSPPD'] ?>" onclick="return confirm('Apakah anda yakin ?')"><input id="delete" type="submit" name="submit" value="Hapus" /></a>
                    <a href="function/export_sppd.php?kode=<?= $data_sppd['IdSPPD'] ?>"><input type="submit" name="submit" value="Export Excel" /> </td></a>
        </tr>
<?php }
} ?>

<!-- delete -->
<?php
if (isset($_GET["kode"])) {
    $delete = mysqli_query($conn, "DELETE FROM sppd WHERE IdSPPD = '{$_GET['kode']}' ");
    if ($delete) {
        header("location:../sppd.php");
    }
}
?>
<?php $conn->close(); ?>