<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Absensi Sekolah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- HEADER -->
        <div class="header">
            <div>
                <h2>Dashboard Absensi</h2>
                <p>Sistem absensi sekolah</p>
            </div>
            <div class="header-right">
                <span class="admin">
                    <?= htmlspecialchars($_SESSION['username']); ?>
                </span>
                <a href="logout.php" class="logout">Logout</a>
            </div>
        </div>

        <!-- MENU -->
        <div class="menu">
            <a href="dashboard.php" class="menu-active">Input Absensi</a>
            <a href="data_absensi.php">Data Absensi</a>
        </div>

        <?php if (isset($_GET['error'])) { ?>
            <div class="error">
                Data gagal disimpan. Pastikan semua field wajib diisi.
            </div>
        <?php } ?>

        <!-- FORM -->
        <div class="card">
            <h3>Form Absensi</h3>
            <form action="simpan.php" method="post">
                <label>Nama Siswa</label>
                <input type="text" name="nama" placeholder="Masukkan nama siswa" required>

                <label>Kelas</label>
                <select name="kelas" required>
                    <option value="">-- Pilih Kelas --</option>
                    <option value="X TKJ 1">X TKJ 1</option>
                    <option value="X TKJ 2">X TKJ 2</option>
                    <option value="X TKJ 3">X TKJ 3</option>
                    <option value="X TKJ 4">X TKJ 4</option>
                    <option value="X DKV 1">X DKV 1</option>
                    <option value="X DKV 2">X DKV 2</option>
                    <option value="X DKV 3">X DKV 3</option>
                    <option value="X DKV 4">X DKV 4</option>
                    <option value="X PPLG 1">X PPLG 1</option>
                    <option value="X PPLG 2">X PPLG 2</option>
                    <option value="X PPLG 3">X PPLG 3</option>
                    <option value="X PPLG 4">X PPLG 4</option>
                    <option value="XI TKJ 1">XI TKJ 1</option>
                    <option value="XI TKJ 2">XI TKJ 2</option>
                    <option value="XI TKJ 3">XI TKJ 3</option>
                    <option value="XI DKV 1">XI DKV 1</option>
                    <option value="XI DKV 2">XI DKV 2</option>
                    <option value="XI DKV 3">XI DKV 3</option>
                    <option value="XI PPLG 1">XI PPLG 1</option>
                    <option value="XI PPLG 2">XI PPLG 2</option>
                </select>

                <label>Tanggal</label>
                <input type="date" name="tanggal" value="<?= date('Y-m-d'); ?>" required>

                <label>Status Kehadiran</label>
                <select name="status" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Hadir">Hadir</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Alpa">Alpa</option>
                </select>

                <label>Keterangan</label>
                <textarea name="keterangan" placeholder="Masukkan keterangan jika ada" rows="4"></textarea>

                <button type="submit" class="button">Simpan Absensi</button>
            </form>
        </div>
    </div>
</body>
</html>
