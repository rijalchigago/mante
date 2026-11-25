<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: dashboard.php");
    exit;
}

$error = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "rizal" && $password === "2010") {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Username atau password salah";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Absensi Sekolah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-page">
    <div class="login-box">
        <img src="logo.jpg" class="logo" alt="Logo SMK Mulia Hati Insani">
        <h2>ABSENSI SEKOLAH</h2>
        <p>Silakan masuk untuk melakukan absensi</p>

        <?php if ($error !== "") { ?>
            <div class="error">
                <?= htmlspecialchars($error); ?>
            </div>
        <?php } ?>

        <form method="post">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan username" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>

            <button type="submit" name="login" class="button">Masuk</button>
        </form>
    </div>
</body>
</html>
