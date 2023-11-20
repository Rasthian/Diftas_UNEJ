<?php 
$host = 'localhost';
$username = 'root';
$password = '';
<<<<<<< HEAD
<<<<<<< HEAD
$dbname = 'projek_akhir';
=======
$dbname = 'forum_unej';
>>>>>>> 059c445546dfd42cee99b2a98ad7f327e6e45fd2
=======
$dbname = 'forum_unej';
>>>>>>> 059c445546dfd42cee99b2a98ad7f327e6e45fd2

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die('koneksi gagal'. $conn->connect_error);
}