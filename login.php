<!DOCTYPE HTML>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>
            <center>SPPD DPMPTSP KABUPATEN CIAMIS </center>
        </h1>
        <form action="function/login_proses.php" method="post">
            <label>NIP</label><br>
            <input name="username" type="text" required><br>
            <label>Password</label><br>
            <input name="password" type="password" required><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>