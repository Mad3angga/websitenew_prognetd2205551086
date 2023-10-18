<?php
require_once("koneksi.php");

// Periksa apakah ID dikirim melalui URL
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    $id = $_GET["id"];

    // Persiapkan pernyataan SQL untuk mengambil data berdasarkan ID
    $sql = "SELECT * FROM data_form WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                // Data ditemukan, ambil data
                $row = $result->fetch_assoc();
                ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Data</title>
<link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
<link rel="stylesheet" href="assets/css/meyawo.css">
              
</head>
 <body>
<section class="section" id="edit">
<div class="container text-center">
<p class="section-subtitle">Detail Data</p>
<h6 class="section-title mb-5">Mahasiswa</h6>
<div class="row">
        <div class="col-md-8 offset-md-2">
             <div class="result-container">
             <table class="table table-bordered">
                            <tr>
                                <th><strong>Nama:</strong></th>
                                <td><?php echo $row["name"]; ?></td>
                            </tr>
                            <tr>
                                <th><strong>NIM:</strong></th>
                                <td><?php echo $row["NIM"]; ?></td>
                            </tr>
                            <tr>
                                <th><strong>Tanggal Lahir:</strong></th>
                                <td><?php echo $row["birthdate"]; ?></td>
                            </tr>
                            <tr>
                                <th><strong>Nomor Telepon:</strong></th>
                                <td><?php echo $row["phone"]; ?></td>
                            </tr>
                            <tr>
                                <th><strong>Email:</strong></th>
                                <td><?php echo $row["email"]; ?></td>
                            </tr>
                            <tr>
                                <th><strong>Alamat:</strong></th>
                                <td><?php echo $row["address"]; ?></td>
                            </tr>
                            <tr>
                                <th><strong>Jenis Kelamin:</strong></th>
                                <td><?php echo $row["gender"]; ?></td>
                            </tr>
                            <tr>
                                <th><strong>Jurusan:</strong></th>
                                <td><?php echo $row["major"]; ?></td>
                            </tr>
                            <tr>
                                <th><strong>Kampus:</strong></th>
                                <td><?php echo $row["campus"]; ?></td>
                            </tr>
                            <tr>
                                <th><strong>Hobi:</strong></th>
                                <td><?php echo $row["hobbies"]; ?></td>
                            </tr>
                            <tr>
                                <th><strong>Cita-cita:</strong></th>
                                <td><?php echo $row["ambition"]; ?></td>
                            </tr>
                            <tr>
                                <th><strong>Minuman Favorit:</strong></th>
                                <td><?php echo $row["drink"]; ?></td>
                            </tr>
                        </table>
                        <!-- Tambahkan tombol untuk kembali ke hasilform.php -->
                        <a href="hasilform.php" class="btn btn-outline-primary rounded">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

                <?php
            } else {
                echo "Data tidak ditemukan.";
            }
        } else {
            echo "Terjadi kesalahan. Silakan coba lagi.";
        }
        $stmt->close();
    }
    $conn->close();
} else {
    echo "ID tidak valid.";
}
?>
