<?php
require_once("koneksi.php");

// Inisialisasi variabel untuk menyimpan data yang akan diedit
$name = $nim = $birthdate = $phone = $email = $address = $gender = $major = $campus = $hobbies = $ambition = $drink = "";

// Cek jika ID dikirim melalui URL
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    $id = $_GET["id"];

    // Ambil data dari database berdasarkan ID
    $sql = "SELECT * FROM data_form WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id); // Menggunakan "i" karena ID adalah integer

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                // Mengisi variabel dengan data yang diambil dari database
                $name = $row["name"];
                $nim = $row["NIM"];
                $birthdate = $row["birthdate"];
                $phone = $row["phone"];
                $email = $row["email"];
                $address = $row["address"];
                $gender = $row["gender"];
                $major = $row["major"];
                $campus = $row["campus"];
                $hobbies = $row["hobbies"];
                $ambition = $row["ambition"];
                $drink = $row["drink"];
            } else {
                echo "Data tidak ditemukan.";
                exit();
            }
        } else {
            echo "Terjadi kesalahan. Silakan coba lagi.";
            exit();
        }
        $stmt->close();
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/meyawo.css">
</head>
<body>
<section class="section" id="edit">
        <div class="container text-center">
            <p class="section-subtitle">Edit Data</p>
            <h6 class="section-title mb-5">Mahasiswa</h6>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="result-container">
                    <form action="update.php?id=<?php echo $id; ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Nama:</td>
                                    <td><input type="text" class="form-control" name="name" value="<?php echo $name; ?>"></td>
                                </tr>
                                <tr>
                                    <td>NIM (Nomor Induk Mahasiswa):</td>
                                    <td><input type="text" class="form-control" name="nim" value="<?php echo $nim; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir:</td>
                                    <td><input type="date" class="form-control" name="birthdate" value="<?php echo $birthdate; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon:</td>
                                    <td><input type="tel" class="form-control" name="phone" value="<?php echo $phone; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><input type="email" class="form-control" name="email" value="<?php echo $email; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Alamat:</td>
                                    <td><input type="text" class="form-control" name="address" value="<?php echo $address; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin:</td>
                                    <td>
                                        <select class="form-control" name="gender">
                                            <option value="Laki-Laki" <?php if ($gender == "Laki-Laki") echo "selected"; ?>>Laki-Laki</option>
                                            <option value="Perempuan" <?php if ($gender == "Perempuan") echo "selected"; ?>>Perempuan</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jurusan:</td>
                                    <td><input type="text" class="form-control" name="major" value="<?php echo $major; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Kampus:</td>
                                    <td><input type="text" class="form-control" name="campus" value="<?php echo $campus; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Hobi:</td>
                                    <td><input type="text" class="form-control" name="hobbies" value="<?php echo $hobbies; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Cita-cita:</td>
                                    <td><input type="text" class="form-control" name="ambition" value="<?php echo $ambition; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Minuman Favorit:</td>
                                    <td><input type="text" class="form-control" name="drink" value="<?php echo $drink; ?>"></td>
                                </tr>
                            </table>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary rounded">Simpan Perubahan</button>
                                <button type="button" class="btn btn-outline-primary rounded" onclick="window.location='hasilform.php'">Kembali</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>