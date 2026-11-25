<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$file = "data/absensi.txt";
$data = [];

if (file_exists($file)) {
    $data = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absensi - Absensi Sekolah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- HEADER -->
        <div class="header">
            <div>
                <h2>Data Absensi</h2>
                <p>Daftar kehadiran siswa</p>
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
            <a href="dashboard.php">Input Absensi</a>
            <a href="data_absensi.php" class="menu-active">Data Absensi</a>
        </div>

        <?php if (isset($_GET['success'])) { ?>
            <div class="success">
                Data absensi berhasil disimpan!
            </div>
        <?php } ?>

        <!-- TABLE -->
        <div class="card">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (count($data) > 0) {
                        $no = 1;
                        foreach ($data as $baris) {
                            $isi = explode("|", $baris);

                            if (count($isi) >= 5) {
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($isi[0]); ?></td>
                                <td><?= htmlspecialchars($isi[1]); ?></td>
                                <td><?= htmlspecialchars($isi[2]); ?></td>
                                <td>
                                    <?php
                                    $status = $isi[3];
                                    if ($status === "Hadir") {
                                        echo '<span class="hadir">Hadir</span>';
                                    } elseif ($status === "Izin") {
                                        echo '<span class="izin">Izin</span>';
                                    } elseif ($status === "Sakit") {
                                        echo '<span class="sakit">Sakit</span>';
                                    } else {
                                        echo '<span class="alpa">Alpa</span>';
                                    }
                                    ?>
                                </td>
                                <td><?= htmlspecialchars($isi[4]); ?></td>
                            </tr>
                    <?php
                            }
                        }
                    } else {
                    ?>
                        <tr>
                            <td colspan="6" class="empty-data">Belum ada data absensi</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
