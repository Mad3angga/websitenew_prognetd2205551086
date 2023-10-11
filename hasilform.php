<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Result</title>
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Meyawo main styles -->
    <link rel="stylesheet" href="assets/css/meyawo.css">
</head>
<body>
    <section class="section" id="result">
        <div class="container text-center">
            <p class="section-subtitle">Hasil Pengisian Formulir</p>
            <h6 class="section-title mb-5">Terima kasih!</h6>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="result-container">
                        <h4>Terima kasih, berikut adalah data yang Anda masukkan:</h4>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

                            echo "<p><strong>Nama:</strong> $name</p>";
                            echo "<p><strong>NIM:</strong> $nim</p>";
                            echo "<p><strong>Tanggal Lahir:</strong> $birthdate</p>";
                            echo "<p><strong>Nomor Telepon:</strong> $phone</p>";
                            echo "<p><strong>Email:</strong> $email</p>";
                            echo "<p><strong>Alamat:</strong> $address</p>";
                            echo "<p><strong>Jenis Kelamin:</strong> $gender</p>";
                            echo "<p><strong>Jurusan:</strong> $major</p>";
                            echo "<p><strong>Kampus:</strong> $campus</p>";
                            echo "<p><strong>Hobi:</strong> $hobbies</p>";
                            echo "<p><strong>Cita-cita:</strong> $ambition</p>";
                            echo "<p><strong>Minuman Favorit:</strong> $drink</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
