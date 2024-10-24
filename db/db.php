<?php 

//// MYSQL DATABASE MANAGEMENT SYSTEM CONNECT //// 
//// Credentials
// $host = 'localhost';
// $user = 'root';
// $pass = '';
// $db = 'e_library';

//// deklarasi koneksi 
// $conn = mysqli_connect($host, $user, $pass, $db);

//// SQL SERVER DATABASE MANEGEMENT SYSTEM CONNECT ////
// Credentials
$serverName = 'KHIP01\\sqlexpress';
$connectionInfo = array("Database"=>"e_library");

// deklarasi koneksi
$conn = sqlsrv_connect($serverName, $connectionInfo);

?>