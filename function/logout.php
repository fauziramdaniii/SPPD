<?php
    session_start();
    $_SESSION['username'] = "";
    $_SESSION['last_login'] = 0;
    $_SESSION['dibuat'] = 0;
    session_destroy();
    header("location: ../login.php");
