<?php
    require_once("../koneksi.php");
    session_start();


    // cek db:
    $cek = $conn -> query("SELECT * from pengguna where Username='{$_POST['username']}' and Pass=password('{$_POST['password']}')") -> fetch_assoc();
    print_r($cek);
    if(!empty($cek)){
        
        $_SESSION["username"] = $_POST['username'];
        $_SESSION["password"] = $_POST['password'];
        $_SESSION["dibuat"] = date('d');
        if($cek['baru']==1){
            header("location: login_pertama.php");
        }else{
            header("location: ../index.php");
        }
    }else{
        echo "<script>
        alert('NIP / password tidak ditemukan');
        window.location.replace('../login.php');
    </script>";
        
    }
