<?php 
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'member48';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die('koneksi gagal'. $conn->connect_error);
}