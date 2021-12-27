<?php
$servername = "localhost"; // pilih nama server
$username = "root"; // username login database dieseuaikan
$password = ""; // password diisi jika ada
$dbname =  "sppd"; // sesuaikan nama database

/**
 * variabel conn berfungsi untuk menampung koneksi ke 
 * database dengan memanggil class mysqli
 * dengan mengisi argumen servername, username, password, db name
 */
$conn = new mysqli($servername, $username, $password, $dbname);

// pengecekan jika koneksi tidak tersambung, bisa juga pakai tenery
if ($conn -> connect_error){
    /**
     * fungsi die untuk menghentikan / menahana statement
     * connect_ error untuk memunculkan pesan error koneksi ke db
     * jika koneksi gagal
     */
    die("connection failed: ".$conn->connect_error);
}else{
    //echo "Berhasil";
    // menampilkan pesan berhasil apabila koneksi berhasil
}
?>