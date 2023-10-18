<?php
require_once("koneksi.php");

if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    $id = $_GET["id"];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirmed"])) {
        // Pengguna telah mengonfirmasi penghapusan
        $sql = "DELETE FROM data_form WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                header("location: hasilform.php");
                exit();
            } else {
                echo "Terjadi kesalahan saat menghapus data.";
            }
            $stmt->close();
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Tambahkan bagian JavaScript untuk menampilkan popup konfirmasi -->
    <script>
        function confirmDelete() {
            return confirm("Anda yakin ingin menghapus data ini?");
        }
    </script>
</head>
<body>
    <section class="section" id="delete">
        <div class="container text-center">
            <p class="section-subtitle">Hapus Data</p>
            <h6 class="section-title mb-5">Hapus data mahasiswa</h6>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="result-container">
                        <form action="" method="post">
                            <p>Apakah Anda yakin ingin menghapus data ini?</p>
                            <input type="hidden" name="confirmed" value="true">
                            <div class="form-group">
                                <a href="hasilform.php" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-danger" onclick="return confirmDelete()">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>


