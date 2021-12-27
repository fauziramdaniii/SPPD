<?php
    require_once '../koneksi.php';
    if(isset($_POST['nomor'])):
        $nomor = $conn -> query("SELECT * from spt where IdSPT = '{$_POST['nomor']}'") -> fetch_assoc();
        echo "masuk";
    
?>
<input id="search" list="nomor" class="form-control" id="nomor" name="nomor" value="<?=$nomor['NomorS']?>">
<?php endif;?>
