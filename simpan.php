<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: dashboard.php");
    exit;
}

$nama = trim($_POST['nama'] ?? '');
$kelas = trim($_POST['kelas'] ?? '');
$tanggal = trim($_POST['tanggal'] ?? '');
$status = trim($_POST['status'] ?? '');
$keterangan = trim($_POST['keterangan'] ?? '');

if ($nama === '' || $kelas === '' || $tanggal === '' || $status === '') {
    header("Location: dashboard.php?error=1");
    exit;
}

if ($keterangan === '') {
    $keterangan = "-";
}

$dir = "data";
if (!is_dir($dir)) {
    mkdir($dir, 0755, true);
}

$data = $tanggal . "|" . $nama . "|" . $kelas . "|" . $status . "|" . $keterangan . PHP_EOL;

file_put_contents("data/absensi.txt", $data, FILE_APPEND);

header("Location: data_absensi.php?success=1");
exit;
?>
