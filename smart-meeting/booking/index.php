<?php 
include '../config/database.php';
include '../includes/header.php';
?>

<h2>Data Peminjaman Ruangan</h2>
<input type="date" id="filterTanggal" class="form-control">
<br><br>

<table border="1" id="tabelBooking" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Waktu</th>
            <th>Nama Ruangan</th>
            <th>Peminjam</th>
            <th>Agenda</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT b.*, r.nama_ruangan, k.nama_karyawan 
                FROM t_booking b
                JOIN m_ruangan r ON b.id_ruang = r.id_ruangan
                JOIN m_karyawan k ON b.id_karyawan = k.id_karyawan";
        $res = mysqli_query($conn, $sql);
        $no = 1;
        while($row = mysqli_fetch_assoc($res)):
        ?>
        <tr data-tanggal="<?= $row['tanggal_rapat']; ?>">
            <td><?= $no++; ?></td>
            <td><?= $row['jam_mulai'] . " - " . $row['jam_selesai']; ?></td>
            <td><?= $row['nama_ruangan']; ?></td>
            <td><?= $row['nama_karyawan']; ?></td>
            <td><?= $row['agenda']; ?></td>
            <td>
                <a href="hapus.php?id=<?= $row['id_booking']; ?>">HPS</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<script>
// Filter JS sesuai Soal No. 3
document.getElementById('filterTanggal').addEventListener('change', function() {
    let tgl = this.value;
    let rows = document.querySelectorAll('#tabelBooking tbody tr');
    rows.forEach(row => {
        row.style.display = (tgl === "" || row.getAttribute('data-tanggal') === tgl) ? "" : "none";
    });
});
</script>
<?php include '../includes/footer.php'; ?>