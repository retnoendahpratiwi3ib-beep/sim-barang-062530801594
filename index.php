<?php
session_start();

// Kalau belum login, lempar ke halaman login
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

require 'koneksi.php';

$sql = "SELECT barang.*, kategori.nama_kategori
        FROM barang
        JOIN kategori ON barang.kategori_id = kategori.id
        ORDER BY barang.id";
$daftar = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIM-Barang</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>SIM-Barang</h1>
    <p>Sistem Informasi Pengelolaan Inventaris Barang Jurusan</p>
  </header>

  <nav>
    <a href="#inventaris">Inventaris</a>
    <a href="#tambah-barang">Tambah Barang</a>
    <a href="logout.php">Logout (<?= htmlspecialchars($_SESSION["user"]) ?>)</a>
  </nav>

  <main>
    <section id="inventaris">
      <h2>Inventaris Barang</h2>
      <input type="text" id="cari" aria-label="Cari barang" placeholder="Cari barang (kode, nama, kategori)...">
      <div class="tabel-wrap">
        <table>
          <thead>
            <tr>
              <th>Kode</th>
              <th>Nama Barang</th>
              <th>Kategori</th>
              <th>Jumlah</th>
              <th>Kondisi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($daftar as $b): ?>
              <tr>
                <td><?= htmlspecialchars($b['kode']) ?></td>
                <td><?= htmlspecialchars($b['nama']) ?></td>
                <td><?= htmlspecialchars($b['nama_kategori']) ?></td>
                <td><?= (int) $b['jumlah'] ?></td>
                <td><?= htmlspecialchars($b['kondisi']) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </section>

    <section id="tambah-barang">
      <h2>Tambah Barang</h2>
      <form id="form-barang" action="simpan.php" method="post">
        <div>
          <label for="kode">Kode Barang</label>
          <input type="text" id="kode" name="kode" placeholder="Contoh: BRG-006" required>
        </div>

        <div>
          <label for="nama">Nama Barang</label>
          <input type="text" id="nama" name="nama" placeholder="Contoh: Casio G-Shock" required>
        </div>

        <div>
          <label for="kategori">Kategori</label>
          <select id="kategori" name="kategori" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="Analog">Analog</option>
            <option value="Digital">Digital</option>
            <option value="Smartwatch">Smartwatch</option>
          </select>
        </div>

        <div>
          <label for="jumlah">Jumlah</label>
          <input type="number" id="jumlah" name="jumlah" placeholder="Contoh: 5" required>
        </div>

        <div>
          <label for="kondisi">Kondisi</label>
          <select id="kondisi" name="kondisi" required>
            <option value="">-- Pilih Kondisi --</option>
            <option value="Baik">Baik</option>
            <option value="Rusak Ringan">Rusak Ringan</option>
            <option value="Rusak Berat">Rusak Berat</option>
          </select>
        </div>

        <div>
          <label for="harga">Harga Satuan (Rp)</label>
          <input type="number" id="harga" name="harga" placeholder="Contoh: 1500000" required>
        </div>

        <p id="pesan-error" class="error" hidden></p>

        <button type="submit">Simpan</button>
      </form>
    </section>
  </main>

  <footer>
    <p>&copy; 2026 SIM-Barang - Retno Endah Pratiwi, 062530801594</p>
  </footer>

  <div id="toast" role="status"></div>
  <script src="main.js"></script>
</body>
</html>