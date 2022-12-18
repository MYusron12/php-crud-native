<!-- memanggil koneksi database mysql -->
<?php $koneksi = mysqli_connect("localhost", "root", "", "crud-native") ?>

<!-- cek koneksi skenario jika gagal -->
<?= mysqli_errno($koneksi) ? "Gagal terhubung ke database" : "Berhasil terhubung ke database"; ?>

<!-- ambil data dari table laundry -->
<?php $getDataAll = mysqli_query($koneksi, "select * from laundry") ?>

<!-- jumlah id untuk counter kode pesanan -->
<?php $sumIdQuery = mysqli_query($koneksi, "select sum(id)+1 as id from laundry") ?>
<?php $sumId = mysqli_fetch_array($sumIdQuery); ?>

<!-- hapus data -->
<?php
$kode_pesanan = isset($_GET['kode_pesanan']) ? $_GET['kode_pesanan'] : '';
if ($kode_pesanan) {
  mysqli_query($koneksi, "delete from laundry where kode_pesanan='$kode_pesanan'");
  header('Location:laundry.php');
}
?>

<!-- aksi tambah data -->
<?php
if (isset($_POST['simpan'])) {
  $kode_pesanan = $_POST['kode_pesanan'];
  $tanggal_pesanan = $_POST['tanggal_pesanan'];
  $nama_pemesan = $_POST['nama_pemesan'];
  $jenis_pesanan = $_POST['jenis_pesanan'];
  $jumlah = $_POST['jumlah'];
  $harga = $_POST['harga'];
  if (empty($nama_pemesan) && empty($jenis_pesanan) && empty($jumlah) && empty($harga)) {
    echo "Data tidak boleh kosong";
  } else {
    mysqli_query($koneksi, "insert into laundry(kode_pesanan, tanggal_pesanan, nama_pemesan, jenis_pesanan, jumlah, harga) values('$kode_pesanan','$tanggal_pesanan','$nama_pemesan','$jenis_pesanan','$jumlah','$harga')");
    header('Location:laundry.php');
  }
}
?>

<!-- ambil data by id untuk edit -->
<?php $id = isset($_GET['id']) ? $_GET['id'] : '' ?>
<?php $getDataById = mysqli_query($koneksi, "select * from laundry where id=$id") ?>
<?php
if (isset($_POST['ubah'])) {
  $id = $_POST['id'];
  $kode_pesanan = $_POST['kode_pesanan'];
  $tanggal_pesanan = $_POST['tanggal_pesanan'];
  $nama_pemesan = $_POST['nama_pemesan'];
  $jenis_pesanan = $_POST['jenis_pesanan'];
  $jumlah = $_POST['jumlah'];
  $harga = $_POST['harga'];
  mysqli_query($koneksi, "update laundry set kode_pesanan='$kode_pesanan', tanggal_pesanan='$tanggal_pesanan', nama_pemesan='$nama_pemesan', jenis_pesanan='$jenis_pesanan', jumlah='$jumlah', harga='$harga' where id=$id");
  header('Location:laundry.php');
}
?>

<?php if ($id) : ?>
  <!-- form edit data -->
  <?php while ($data = mysqli_fetch_array($getDataById)) : ?>
    <form action="" method="post">
      <input type="hidden" name="id" value="<?= $data['id']; ?>">
      <label for="">Kode Pesanan <br><input type="text" name="kode_pesanan" value="<?= $data['kode_pesanan']; ?>"></label><br>
      <label for="">Tanggal Pesanan <br><input type="date" name="tanggal_pesanan" value="<?= $data['tanggal_pesanan']; ?>"></label><br>
      <label for="">Nama Pemesan <br><input type="text" name="nama_pemesan" value="<?= $data['nama_pemesan']; ?>" autofocus></label><br>
      <label for="">Jenis Pesanan <br>
        <select name="jenis_pesanan" id="">
          <option value=""><?= $data['jenis_pesanan']; ?></option>
          <option value="regular">Regular</option>
          <option value="express">Express</option>
        </select>
      </label><br>
      <label for="">Jumlah <br><input type="text" name="jumlah" value="<?= $data['jumlah']; ?>"></label><br>
      <label for="">Harga <br><input type="number" name="harga" value="<?= $data['harga']; ?>"></label><br>
      <label for=""><br><input type="submit" name="ubah" value="ubah"></label><br>
    </form>
  <?php endwhile; ?>

<?php else : ?>

  <!-- form tambah data laundry -->
  <form action="" method="post">
    <label for="">Kode Pesanan <br><input type="text" name="kode_pesanan" value="LNDR00<?= $sumId['id']; ?>"></label><br>
    <label for="">Tanggal Pesanan <br><input type="date" name="tanggal_pesanan"></label><br>
    <label for="">Nama Pemesan <br><input type="text" name="nama_pemesan" autofocus></label><br>
    <label for="">Jenis Pesanan <br>
      <select name="jenis_pesanan" id="">
        <option value="">Pilih Jenis Laundry</option>
        <option value="regular">Regular</option>
        <option value="express">Express</option>
      </select>
    </label><br>
    <label for="">Jumlah <br><input type="text" name="jumlah"></label><br>
    <label for="">Harga <br><input type="number" name="harga"></label><br>
    <label for=""><br><input type="submit" name="simpan" value="simpan"></label><br>
  </form>

<?php endif; ?>

<!-- keluarkan isi dari data yang telah diambil dari table laundry -->
<table border="1">
  <tr>
    <th>No</th>
    <th>Kode Pesanan</th>
    <th>Tanggal Pesanan</th>
    <th>Nama Pemesan</th>
    <th>Jenis Pesanan</th>
    <th>Jumlah</th>
    <th>Harga</th>
    <th>Aksi</th>
  </tr>
  <?php $i = 1; ?>
  <?php while ($data = mysqli_fetch_array($getDataAll)) : ?>
    <tr>
      <td><?= $i++; ?></td>
      <td><?= $data['kode_pesanan']; ?></td>
      <td><?= $data['tanggal_pesanan']; ?></td>
      <td><?= $data['nama_pemesan']; ?></td>
      <td><?= $data['jenis_pesanan']; ?></td>
      <td><?= $data['jumlah']; ?></td>
      <td><?= $data['harga']; ?></td>
      <td>
        <a href="laundry.php?id=<?= $data['id']; ?>">ubah</a> |
        <a href="laundry.php?kode_pesanan=<?= $data['kode_pesanan']; ?>">hapus</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>