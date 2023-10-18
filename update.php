<?php
require_once("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $nim = $_POST["nim"];
    $birthdate = $_POST["birthdate"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];
    $major = $_POST["major"];
    $campus = $_POST["campus"];
    $hobbies = $_POST["hobbies"];
    $ambition = $_POST["ambition"];
    $drink = $_POST["drink"];

    $sql = "UPDATE data_form SET 
            NAME = '$name',
            nim = '$nim',
            birthdate = '$birthdate',
            phone = '$phone',
            email = '$email',
            address = '$address',
            gender = '$gender',
            major = '$major',
            campus = '$campus',
            hobbies = '$hobbies',
            ambition = '$ambition',
            drink = '$drink'
            
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Data berhasil diperbarui, tampilkan pesan pop-up
        echo '<script>alert("Data berhasil diperbarui.");</script>';
        echo '<script>window.location = "hasilform.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Permintaan tidak valid.";
}

$conn->close();
?>
