<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Entri produk baru
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Menyimpan produk ke dalam session
    $_SESSION['produk'][] = ['nama' => $nama, 'harga' => $harga, 'stok' => $stok];
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entri Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Entri Data Produk</h1>

    <form method="post">
        <label for="nama_produk">Nama Produk:</label>
        <input type="text" name="nama_produk" required>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" required>

        <label for="stok">Stok:</label>
        <input type="number" name="stok" required>

        <input type="submit" value="Simpan Produk">
    </form>

    <h2>Daftar Produk</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
        <?php
        if (isset($_SESSION['produk'])) {
            foreach ($_SESSION['produk'] as $produk) {
                echo "<tr><td>{$produk['nama']}</td><td>{$produk['harga']}</td><td>{$produk['stok']}</td></tr>";
            }
        }
        ?>
    </table>
</div>

</body>
</html>