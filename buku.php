<<<<<<< HEAD
<?php
require_once "config.php";


$sql = "SELECT * FROM buku ORDER BY id_buku DESC";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manajemen Data Buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">
    <h1 class="mb-4">Manajemen Data Buku</h1>

    <!-- Tombol tambah -->
    <a href="add_book.php" class="btn btn-primary mb-3">Tambah Buku</a>

    <table class="table table-striped table-bordered align-middle">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Judul</th>
          <th scope="col">Penulis</th>
          <th scope="col">Penerbit</th>
          <th scope="col">Tahun Terbit</th>
          <th scope="col">Stok</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
          <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
            <tr>
              <th scope="row"><?= $no++; ?></th>
              <td><?= htmlspecialchars($row['judul']); ?></td>
              <td><?= htmlspecialchars($row['penulis']); ?></td>
              <td><?= htmlspecialchars($row['penerbit']); ?></td>
              <td><?= htmlspecialchars($row['tahun_terbit']); ?></td>
              <td><?= htmlspecialchars($row['stok']); ?></td>
              <td>
                <a href="edit_book.php?id_buku=<?= $row['id_buku']; ?>" class="btn btn-primary btn-sm">Edit</a>
                <a href="delete_book.php?id_buku=<?= $row['id_buku']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="7" class="text-center">Belum ada data buku.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SRI14xkILFYv47J16cr9ZwB07vP4J8+Lh7qKQnqukIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <table class="table table-striped">
            <!-- ini untuk heading table -->
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Stok</th>
                </tr>
            </thead>
            <tbody>
                <!-- isi data nanti ditambahkan di sini -->
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKycoFOrCGIvvvx9Hj00JCYn3nv7wiPv1ZYyw1rWvCX/BmnDVxM+D2scQbTTxT" crossorigin="anonymous"></script>
>>>>>>> 957214736dd9236ae424850e72f4560f9e3bd5fb
</body>
</html>
