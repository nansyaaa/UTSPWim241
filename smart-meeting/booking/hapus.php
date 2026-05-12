<?php
include '../config/database.php';

if (isset($_POST['konfirmasi'])) {
    $id = $_GET['id'];
    $kode = $_POST['kode_konfirmasi'];

    if ($kode === "HAPUS") {
        // 1. Hapus data booking
        $sqlDelete = "DELETE FROM t_booking WHERE id_booking = $id";
        
        if (mysqli_query($conn, $sqlDelete)) {
            // 2. Insert ke t_log_aktivitas (Audit Trail)
            $keterangan = "User menghapus data booking ID: $id pada " . date('Y-m-d H:i:s');
            $sqlLog = "INSERT INTO t_log_aktivitas (keterangan) VALUES ('$keterangan')";
            mysqli_query($conn, $sqlLog);

            header("Location: index.php?msg=success");
        }
    } else {
        echo "<script>alert('Kode salah! Ketik HAPUS untuk mengonfirmasi'); window.history.back();</script>";
    }
}
?>