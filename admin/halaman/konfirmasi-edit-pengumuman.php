<?php 

$id_userlogin = $_SESSION['id_user'];
$id_pengumuman = $_POST['id'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$penulis = $_POST['penulis'];
$tgl = date('Y/m/d');

if(empty($judul)){
	header("Location:edit-info_kosong_judul_$id_pengumuman");
}else if(empty($penulis)){
	header("Location:edit-info_kosong_penulis_$id_pengumuman");
}else if(empty($isi)){
	header("Location:edit-info_kosong_isi_$id_pengumuman");
}
else{
	$sql = "INSERT INTO pengumuman (judul, isi, id_admin, tanggal) 
	values ('$judul', '$isi', '$penulis', '$tgl')";
	mysqli_query($koneksi,$sql);
header("Location:info_berhasil");	
}
?>
