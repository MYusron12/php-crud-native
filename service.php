<!-- koneksi ke php -->
<?php $koneksi = mysqli_connect("localhost", "root", "", "crud-native"); ?>
<?= mysqli_errno($koneksi) ? "Database gagal terhubung" : "Database berhasil terhubung"; ?>

<!-- ambil data service -->
<?php $getAllDataService = mysqli_query($koneksi, "select * from service") ?>

<!-- tampilkan data dari tabel service -->
<table border="1">
  <tr>
    <th>Kode Service</th>
    <th>Tanggal Service</th>
    <th>Nama Pelanggan</th>
    <th>Jenis Service</th>
    <th>Nama Montir</th>
    <th>Harga Srvice</th>
  </tr>
  <?php while ($data = mysqli_fetch_array($getAllDataService)) : ?>
    <tr>
      <td><?= $data['kode_service']; ?></td>
      <td><?= $data['tanggal_service']; ?></td>
      <td><?= $data['nama_pelanggan']; ?></td>
      <td><?= $data['jenis_service']; ?></td>
      <td><?= $data['nama_montir']; ?></td>
      <td><?= $data['harga_service']; ?></td>
    </tr>
  <?php endwhile; ?>
</table>