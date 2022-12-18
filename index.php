<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbName = 'crud-native';

$koneksi = mysqli_connect($host, $username, $password, $dbName);

if (mysqli_errno($koneksi)) {
  echo "Database gagal terhubung";
} else {
  // echo "Berhasil terhubung";
}
?>

<?php $id = isset($_GET['id']) ? $_GET['id'] : ""; ?>
<?php if ($id) : ?>

  <?php $getDataById = mysqli_query($koneksi, "select * from mahasiswa where id=$id"); ?>
  <?php while ($data = mysqli_fetch_array($getDataById)) : ?>
    <a href="index.php">home</a>
    <br>
    <a href="alundry.php">Laundry</a>
    <form action="" method="post">
      <input type="hidden" name="id" value="<?= $data['id']; ?>">
      <label for="">Nim <input type="text" name="nim" autofocus value="<?= $data['nim']; ?>"></label><br>
      <label for="">Nama <input type="text" name="nama" value="<?= $data['nama']; ?>"></label><br>
      <label for="">Alamat <input type="text" name="alamat" value="<?= $data['alamat']; ?>"></label><br>
      <input type="submit" name="ubah" value="ubah">
    </form>
    <?php
    if (isset($_POST['ubah'])) {
      $id = $_POST['id'];
      $nim = $_POST['nim'];
      $nama = $_POST['nama'];
      $alamat = $_POST['alamat'];
      mysqli_query($koneksi, "update mahasiswa set nim='$nim', nama='$nama', alamat='$alamat' where id=$id");
      header('Location:index.php');
    }
    ?>
  <?php endwhile; ?>

<?php else :  ?>

  <a href="index.php">home</a>
  <a href="home.php">home app</a>
  <form action="" method="post">
    <label for="">Nim <input type="text" name="nim" autofocus></label><br>
    <label for="">Nama <input type="text" name="nama"></label><br>
    <label for="">Alamat <input type="text" name="alamat"></label><br>
    <input type="submit" name="simpan" value="simpan">
  </form>
  <?php
  if (isset($_POST['simpan'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    if (empty($nim) && empty($nama) && empty($alamat)) {
      echo "Kolom harus di isi";
    } else {
      $simpan = mysqli_query($koneksi, "insert into mahasiswa(nim, nama, alamat) values('$nim','$nama','$alamat')");
      header('Location:index.php');
    }
  }
  ?>
  <table border="1">
    <tr>
      <th>No</th>
      <th>Nim</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Aksi</th>
    </tr>
    <?php $i = 1;
    $getAllData = mysqli_query($koneksi, "select * from mahasiswa"); ?>
    <?php while ($data = mysqli_fetch_array($getAllData)) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $data['nim']; ?></td>
        <td><?= $data['nama']; ?></td>
        <td><?= $data['alamat']; ?></td>
        <td>
          <a href="index.php?id=<?= $data['id'] ?>">ubah</a> |
          <a href="index.php?nama=<?= $data['nama'] ?>">hapus</a>
        </td>
      </tr>
    <?php endwhile; ?>

    <?php
    if (isset($_GET['nama'])) {
      $nama = $_GET['nama'];
      mysqli_query($koneksi, "delete from mahasiswa where nama='$nama'");
      header('Location:index.php');
    }
    ?>

  </table>
<?php endif; ?>