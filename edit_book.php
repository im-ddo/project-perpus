<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_buku = $_POST['id_buku'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $stok = $_POST['stok'];
    

    $sql = "UPDATE buku SET judul=?, penulis=?, penerbit=?, tahun_terbit=?, stok=? WHERE id_buku=?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssiii", $judul, $penulis, $penerbit, $tahun_terbit, $stok, $id_buku);

    if ($stmt->execute()) {
        header("Location: buku.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

if (isset($_GET['id_buku']) && !empty($_GET['id_buku'])) {
    $id = $_GET['id_buku'];
    $sql = "SELECT * FROM buku WHERE id_buku = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $buku = $result->fetch_assoc();
        } else {
            echo "Data tidak ditemukan.";
            exit();
        }
        $stmt->close();
    }
} else {
    header("location: buku.php");
    exit();
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-4">
        <h2>Edit Data Buku</h2>
        <form action="edit_book.php" method="post">
            <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>
                <input type="text" name="judul" class="form-control" id="judul" value="<?= $buku['judul']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" name="penulis" class="form-control" id="penulis" value="<?= $buku['penulis']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" name="penerbit" class="form-control" id="penerbit" value="<?= $buku['penerbit']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" class="form-control" id="tahun_terbit" value="<?= $buku['tahun_terbit']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" id="stok" value="<?= $buku['stok']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="buku.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
  </body>
</html>
