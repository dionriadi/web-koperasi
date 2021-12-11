<?php 

$id_userlogin = $_SESSION['id_user'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$penulis = $_POST['penulis'];

$tgl = date('Y/m/d');

if(empty($judul)){
	header("Location:tambah-info_kosong_judul");
}else if(empty($penulis)){
	header("Location:tambah-info_kosong_penulis");
}else if(empty($isi)){
	header("Location:tambah-info_kosong_isi");
}
else{
	$sql = "INSERT INTO pengumuman (judul, isi, id_admin, tanggal) 
	values ('$judul', '$isi', '$penulis','$tgl')";
	mysqli_query($koneksi,$sql);
 
    $lokasi_file = $_FILES['cover']['tmp_name'];
	$nama_file = $_FILES['cover']['name'];
	$direktori = 'cover/'.$nama_file;
		if(move_uploaded_file($lokasi_file,$direktori)){
                     $sql= "UPDATE  pengumuman set cover= '$nama_file' where `judul` = '$judul'"; 
                     mysqli_query($koneksi,$sql);
		   
		}
header("Location:info_berhasil");	
}
?>
