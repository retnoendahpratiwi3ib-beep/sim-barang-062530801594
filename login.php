<?php
session_start();

// Data pengguna disimpan di array asosiatif (username => password)
$users = [
    "admin" => "password123",
];

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Cek apakah username ada dan passwordnya cocok
    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION["user"] = $username;   // simpan "gelang" di session
        header("Location: index.php");   // pindah ke halaman utama
        exit;
    }

    $error = "Username atau password salah";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - SIM-Barang</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>SIM-Barang</h1>
    <p>Silakan login untuk melanjutkan</p>
  </header>

  <main>
    <section>
      <h2>Login</h2>

      <?php if ($error !== ""): ?>
        <p style="color: #dc2626; margin-bottom: 12px;"><?= $error ?></p>
      <?php endif; ?>

      <form method="post" action="login.php">
        <div>
          <label for="username">Username</label>
          <input type="text" id="username" name="username" required>
        </div>

        <div>
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Masuk</button>
      </form>
    </section>
  </main>
</body>
</html>