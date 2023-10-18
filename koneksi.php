<?php
$servername = "prognet.localnet";
$username = "2205551086";
$password = "2205551086";
$database = "db_2205551086";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
?>