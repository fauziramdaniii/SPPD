<!-- search -->
<?php
require_once '../koneksi.php';
if (isset($_POST['search'])) {


    $no = 1;
    $search = '%' . $_POST['search'] . '%';

    $query = mysqli_query($conn, "SELECT `IdSPT`, pegawai.Nama, `Tanggal`, `NomorS` FROM `spt` inner join pegawai 
        on spt.Kepada = pegawai.IdPegawai where IdSPT like '$search' or pegawai.Nama like '$search' or Tanggal like '$search' or NomorS like '$search' order by NomorS");
    while ($data_spt = $query->fetch_assoc()) {
        mysqli_error($conn);

?>
        <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $data_spt['NomorS'] ?></td>
            <td><?= $data_spt['Nama'] ?></td>
            <td><?= $data_spt['Tanggal'] ?></td>
            <td><a href="inputspt.php?kode=<?= $data_spt['IdSPT'] ?>"> <input type="submit" name="submit" value="Detail" /></a>
                <a id="delete" href="function/spt_live.php?kode=<?= $data_spt['IdSPT'] ?>" onclick="return confirm('Apakah anda yakin ?')"><input type="submit" name="submit" value="Hapus" /></a>
                <a target="_blank" href="function/export_spt.php?kode=<?= $data_spt['IdSPT'] ?>"><input type="submit" name="submit" value="Export Excel" />
            </td></a>
        </tr>
<?php }
} ?>


<!-- delete -->
<?php
if (isset($_GET["kode"])) {
    $delete2 = mysqli_query($conn, "DELETE FROM SPPD WHERE IdSPPD = '{$_GET['kode']}' ");
    $delete = mysqli_query($conn, "DELETE FROM spt WHERE IdSPT = '{$_GET['kode']}' ");
    print_r($delete);
    echo mysqli_error($conn);
    if ($delete) {
        header("location:../spt.php");
    }
}
?>
<?php $conn->close(); ?>