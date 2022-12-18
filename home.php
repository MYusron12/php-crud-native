<?php $koneksi = mysqli_connect('localhost', 'root', '', 'crud-native'); ?>
<?= mysqli_errno($koneksi) ? "Koneksi gagal" : "Koneksi berhasil"; ?>
<a href="index.php" class="">home</a>
<br>
<a href="home.php">home app</a>
<br>
<a href="laundry.php">Laundry</a>
<br>

<?php $id = isset($_GET['id']) ? $_GET['id'] : ''; ?>
<?php if (!$id) : ?>
  <!-- form input tambah -->
  <form action="" method="post">
    <label for="">Nim <input type="text" name="nim" autofocus></label><br>
    <label for="">Nama <input type="text" name="nama"></label><br>
    <label for="">Alamat <input type="text" name="alamat"></label><br>
    <input type="submit" value="simpan" name="simpan">
  </form>
  <?php if (isset($_POST['simpan'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $save = "insert into mahasiswa(nim, nama, alamat) values('$nim','$nama','$alamat')";
    if (empty($nim) && empty($nama) && empty($alamat)) {
      echo "Data tidak boleh kosong";
    } else {
      mysqli_query($koneksi, $save);
      header('Location:home.php');
    }
  } ?>
  <!-- end form input tambah -->

<?php else : ?>

  <!-- form input edit -->
  <?php $getDataById = mysqli_query($koneksi, "select * from mahasiswa where id=$id"); ?>
  <?php while ($data = mysqli_fetch_array($getDataById)) : ?>
    <form action="" method="post">
      <input type="hidden" name="id" value="<?= $data['id']; ?>">
      <label for="">Nim <input type="text" name="nim" autofocus value="<?= $data['nim']; ?>"></label><br>
      <label for="">Nama <input type="text" name="nama" value="<?= $data['nama']; ?>"></label><br>
      <label for="">Alamat <input type="text" name="alamat" value="<?= $data['alamat']; ?>"></label><br>
      <input type="submit" value="ubah" name="ubah">
    </form>
  <?php endwhile; ?>
  <?php if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $edit = "update mahasiswa set nim='$nim', nama='$nama', alamat='$alamat' where id=$id";
    mysqli_query($koneksi, $edit);
    header('Location:home.php');
  } ?>
  <!-- end form input edit -->

<?php endif; ?>

<br>
<table border="1">
  <tr>
    <th>No</th>
    <th>Nim</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Aksi</th>
  </tr>
  <?php $i = 1; ?>
  <?php $getAllData = mysqli_query($koneksi, "select * from mahasiswa") ?>
  <?php while ($data = mysqli_fetch_array($getAllData)) : ?>
    <tr>
      <td><?= $i++; ?></td>
      <td><?= $data['nim']; ?></td>
      <td><?= $data['nama']; ?></td>
      <td><?= $data['alamat']; ?></td>
      <td>
        <a href="home.php?id=<?= $data['id']; ?>">edit</a> |
        <a href="home.php?nama=<?= $data['nama']; ?>">hapus</a>
        <?php
        $nama = isset($_GET['nama']) ? $_GET['nama'] : '';
        if ($nama) {
          mysqli_query($koneksi, "delete from mahasiswa where nama='$nama'");
          header('Location:home.php');
        } ?>
      </td>
    </tr>
  <?php endwhile; ?>
</table>