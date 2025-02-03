<?php
require 'config.php';

// Tambah data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $series = $_POST['series'];
    $image_url = $_POST['image_url'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO waifu (name, series, image_url, description) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $series, $image_url, $description]);
    header('Location: index.php');
}

// Hapus data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM waifu WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: index.php');
}

// Ambil semua data
$stmt = $pdo->query("SELECT * FROM waifu");
$waifus = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyWaifuList</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>MyWaifuList - CRUD Sederhana</h1>

    <!-- Form Tambah Waifu -->
    <h2>Tambah Waifu</h2>
    <form action="" method="POST">
        <label>Nama Waifu:</label><br>
        <input type="text" name="name" required><br>
        <label>Series:</label><br>
        <input type="text" name="series" required><br>
        <label>URL Gambar:</label><br>
        <input type="text" name="image_url"><br>
        <label>Deskripsi:</label><br>
        <textarea name="description" rows="4"></textarea><br><br>
        <button type="submit">Tambah</button>
    </form>

    <hr>

    <!-- Tabel Daftar Waifu -->
    <h2>Daftar Waifu</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Series</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($waifus as $waifu): ?>
                <tr>
                    <td><?= $waifu['id'] ?></td>
                    <td><?= $waifu['name'] ?></td>
                    <td><?= $waifu['series'] ?></td>
                    <td>
                        <?php if ($waifu['image_url']): ?>
                            <img src="<?= $waifu['image_url'] ?>" alt="<?= $waifu['name'] ?>" width="50">
                        <?php else: ?>
                            (Tidak ada gambar)
                        <?php endif; ?>
                    </td>
                    <td><?= $waifu['description'] ?></td>
                    <td>
                        <a href="update.php?id=<?= $waifu['id'] ?>">Edit</a> | 
                        <a href="?delete=<?= $waifu['id'] ?>" onclick="return confirm('Hapus waifu ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
