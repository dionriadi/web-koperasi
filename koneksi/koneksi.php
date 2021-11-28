<?php
$koneksi = mysqli_connect("localhost","root","","koperasi_simpan_pinjam");
// cek koneksi
if (!$koneksi){
  die("Error koneksi: " . mysqli_connect_errno());
}
?>
