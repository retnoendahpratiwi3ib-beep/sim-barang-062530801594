<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

require_once 'Barang.php';

// Fungsi menghitung total estimasi nilai aset
function hitungTotal($jumlah, $harga) {
    return $jumlah * $harga;
}

// Pastikan halaman dibuka lewat pengiriman form (POST)
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

// Tangkap data dari form
$kode     = htmlspecialchars($_POST["kode"]);
$nama     = htmlspecialchars($_POST["nama"]);
$kategori = htmlspecialchars($_POST["kategori"]);
$jumlah   = (int) $_POST["jumlah"];
$kondisi  = htmlspecialchars($_POST["kondisi"]);
$harga    = (int) $_POST["harga"];

// Hitung total
$total = hitungTotal($jumlah, $harga);
$barang = new Barang($kode, $nama, $jumlah);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ringkasan Barang</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Ringkasan Barang</h1>
    <p>Data berhasil diterima oleh server</p>
  </header>

  <main>
    <section>
      <h2>Hasil Pemrosesan</h2>
      <div class="tabel-wrap">
        <table>
          <thead>
            <tr>
              <th>Kode</th>
              <th>Nama Barang</th>
              <th>Kategori</th>
              <th>Jumlah</th>
              <th>Kondisi</th>
              <th>Harga Satuan</th>
              <th>Total Nilai Aset</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?= $kode ?></td>
              <td><?= $nama ?></td>
              <td><?= $kategori ?></td>
              <td><?= $jumlah ?></td>
              <td><?= $kondisi ?></td>
              <td>Rp <?= number_format($harga, 0, ',', '.') ?></td>
              <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <p><strong>Info Barang (OOP):</strong> <?= $barang->tampilInfo() ?></p>
      <p><a href="index.php">&laquo; Kembali ke daftar</a></p>
    </section>
  </main>
</body>
</html>