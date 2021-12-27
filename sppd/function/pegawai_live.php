<?php
    require_once '../koneksi.php';
    if (isset($_POST['search'])) {
        
        if ($_POST['pilih'] == 'S'){
            $pilih = '%'. $_POST['pilih'];
        }else{
            $pilih = $_POST['pilih'].'%';
        }
        $no = 1;
        $search = '%'. $_POST['search'] .'%';
        
        $query = mysqli_query($conn, "SELECT * FROM pegawai WHERE jenis like '$pilih' and (Nama LIKE '${search}' or NIP LIKE '${search}' or Golongan LIKE '${search}'
        or jabatan LIKE '${search}') order by NIP");
        while($data_pegawai = $query->fetch_assoc()) {
            
?>
      <tr>
        <th scope="row"><?=$no++;?></th>
        <td><?=$data_pegawai['NIP']?></td>
        <td><?=$data_pegawai['Nama']?></td>
        <td><?=$data_pegawai['jabatan']?></td>
        <td><?=$data_pegawai['Golongan']?></td>
        <td><a href="inputpegawai.php?kode=<?=$data_pegawai['IdPegawai']?>"> <input type="submit" name="submit" value="Detail" /></a>
        <a id="delete" href="function/pegawai_live.php?kode=<?=$data_pegawai['IdPegawai']?>"><input type="submit" name="submit" value="Hapus" data-hapus="<?=$data_pegawai['NIP']?>"/></a> </td>
      </tr>
<?php }
} ?>

<!-- delete -->
<?php
    if(isset($_GET["kode"])){
        $delete = mysqli_query($conn, "DELETE FROM pegawai WHERE IdPegawai = '{$_GET['kode']}' ");
        if($delete){
            header("location:../pegawai.php");
        }
    }
?>
<?php $conn -> close();?>