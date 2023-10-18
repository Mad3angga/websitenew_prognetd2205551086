<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Result</title>
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/meyawo.css">
    <style>
        .centered-table {
            margin: 0 auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .action-links {
            text-align: center;
        }

        .action-links a {
            margin: 0 5px;
            text-decoration: none;
        }

        .back-button {
            margin-top: 20px; 
        }
        
    </style>

    <script>
             function confirmDelete(id) {
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            window.location.href = "hasilform.php?delete_id=" + id;
        }
    }
            </script>
</head>
<body>
    <section class="section" id="result">
        <div class="container text-center">
            <p class="section-subtitle">Hasil Pengisian</p>
            <h6 class="section-title mb-5">Formulir Biodata</h6>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="result-container">
                        <h4>Terima kasih, berikut adalah data yang Anda masukkan:</h4>
                        <div class="container text-center">
       
                        <?php
                        require_once("koneksi.php");

                        // Tangani pengiriman data formulir
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
                        
                            // Perintah SQL INSERT untuk menyimpan data ke dalam tabel data_form
                            $sql = "INSERT INTO data_form (name, nim, birthdate, phone, email, address, gender, major, campus, hobbies, ambition, drink) 
                                    VALUES ('$name', '$nim', '$birthdate', '$phone', '$email', '$address', '$gender', '$major', '$campus', '$hobbies', '$ambition', '$drink')";
                        
                            if ($conn->query($sql) === TRUE) {
                                echo "";
                            } else {
                                echo "" . $conn->error;
                            }
                        }

                        // Handle penghapusan data
                        if (isset($_GET["delete_id"])) {
                            $id_to_delete = $_GET["delete_id"];
                        
                            // Lakukan operasi penghapusan data berdasarkan $id_to_delete
                            $sql = "DELETE FROM data_form WHERE id = ?";
                        
                            if ($stmt = $conn->prepare($sql)) {
                                $stmt->bind_param("i", $id_to_delete);
                                if ($stmt->execute()) {
                                    echo "";
                                } else {
                                    echo "" . $conn->error;
                                }
                                $stmt->close();
                            }
                        }

                        // Query untuk mengambil data dari tabel data_form
                        $query = "SELECT * FROM data_form";

                        // Eksekusi query
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            echo "<table class='table centered-table'>";
                            echo "<tr>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th class='action-links'>Action</th>
                                </tr>";

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["name"] . "</td>
                                        <td>" . $row["NIM"] . "</td>
                                        <td class='action-links'>
                                            <a href='edit.php?id=" . $row["id"] . "'>Edit</a> |
                                            <a href='javascript:void(0);' onclick='confirmDelete(" . $row["id"] . ")'>Delete</a> | 
                                            <a href='detail.php?id=" . $row["id"] . "'>Detail</a> |
                                        </td>
                                    </tr>";
                            }

                            echo "</table>";    
                        } else {
                            echo "Tidak ada data yang ditemukan.";
                        }

                        $conn->close();
                        ?>
                    </div> 
                </div>
            </div>
        </div>
        <div class="container text-center">
            <p class="back-button">
                <a href="form.html" class="btn btn-outline-primary rounded">Kembali ke Formulir</a>
            </p>
        </div>
    </div>
    </section>
</body>
</html>
