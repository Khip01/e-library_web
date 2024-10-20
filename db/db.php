<?php 

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'e_library';

// deklarasi koneksi 
$conn = mysqli_connect($host, $user, $pass, $db) or die('Error connecting to MySQL Server');
?>