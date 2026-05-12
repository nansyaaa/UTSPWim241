<?php 
include 'config/database.php';
include 'includes/header.php';

// Hitung total untuk Dashboard sesuai Soal Hal 7
$q_ruang = mysqli_query($conn, "SELECT COUNT(*) as total FROM m_ruangan");
$total_ruang = mysqli_fetch_assoc($q_ruang)['total'];
?>
<div style="display:flex; gap:20px;">
    <div class="card"><h3>Total Ruangan: <?= $total_ruang; ?></h3></div>
    <div class="card"><h3>Digunakan: 0</h3></div> </div>
<?php include 'includes/footer.php'; ?>