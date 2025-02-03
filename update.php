<?php
require 'config.php';

// Ambil ID Waifu dari parameter URL
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM waifu WHERE id = ?");
$stmt->execute([$id]);
$waifu = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $series = $_POST['series'];
    $image_url = $_POST['image_url'];
    $description = $_POST['description'];

    // Update data waifu di database
    $stmt = $pdo->prepare("UPDATE waifu SET name = ?, series = ?, image_url = ?, description = ? WHERE id = ?");
    $stmt->execute([$name, $series, $image_url, $description, $id]);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Waifu</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Edit Waifu</h1>

    <form action="" method="POST">
        <label>Nama Waifu:</label><br>
        <input type="text" name="name" value="<?= $waifu['name'] ?>" required><br>
        
        <label>Series:</label><br>
        <input type="text" name="series" value="<?= $waifu['series'] ?>" required><br>

        <label>URL Gambar:</label><br>
        <input type="text" name="image_url" value="<?= $waifu['image_url'] ?>"><br>

        <label>Deskripsi:</label><br>
        <textarea name="description" rows="4"><?= $waifu['description'] ?></textarea><br><br>

        <button type="submit">Update</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
