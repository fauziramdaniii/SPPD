<?php
require_once("../koneksi.php"); // file beres 
if (isset($_POST['id'])) {
    $update = $conn->query("UPDATE spt set verifikasi = 1 where `IdSPT` = {$_POST['id']}");
}
$verif = $conn->query("SELECT * from spt where verifikasi = 0");
$no = 1;
while ($hasil = $verif->fetch_assoc()) :
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
            <center><a href="" class="btn btn-primary"> Klik untuk setujui </a>
        </td>
    </tr>
<?php endwhile; ?>