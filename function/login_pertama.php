<?php
require_once("../koneksi.php");
session_start();
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['password3'])) {

    $cek = $conn->query("SELECT * from pengguna where Username='{$_POST['username']}' and Pass=password('{$_POST['password']}')")->fetch_assoc();


    if (!empty($cek)) {
        $conn->query("UPDATE `pengguna` SET `IdPengguna`={$cek['IdPengguna']},
            `Username`='{$_POST['username']}',
            `Pass`=password('{$_POST['password3']}'),`baru`=0 WHERE `IdPengguna`={$cek['IdPengguna']}");
        $_SESSION["username"] = $_POST['username'];
        $_SESSION["dibuat"] = date('d');

        header("location: ../index.php");
    } else {
        echo "<script>
            alert('NIP / password lama salah');
    
        </script>";
    }
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container">
        <h1>
            <center>Silahkan Masukkan Password Baru </center>
        </h1>
        <form name="form_ulang" id="form_ulang" method="post">
            <label>NIP</label><br>
            <input class="username" id="username" name="username" type="text"><br>

            <label>Password Lama</label><br>
            <input name="password" type="password"><br>

            <label>Password Baru</label><br>
            <input class="pass2" id="pass2" name="password2" type="password"><br>

            <label>Ulangi Password Baru</label><br>
            <input class="pass3" id="pass3" name="password3" type="password"><br>
            <button id="submitBtn" type="button">Ubah</button>
        </form>
    </div>
</body>

</html>
<script src="../js/jquery-3.6.0.min.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#submitBtn', function() {
            console.log("test");
            var pass2 = document.getElementsByClassName("pass2")[0].value;
            var pass3 = document.getElementsByClassName("pass3")[0].value;
            var test = document.getElementsByClassName("username")[0].value;
            // document.form_ulang.submit();
            if (pass2 != pass3) {

                alert("Password baru tidak sama!");

            } else {
                console.log("sukses");
                $("#form_ulang").submit();
            }

        })

    });
</script>