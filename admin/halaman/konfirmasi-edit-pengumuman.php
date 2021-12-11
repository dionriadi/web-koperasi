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
	$lokasi_file = $_FILES['cover']['tmp_name'];
		$nama_file = $_FILES['cover']['name'];
		$direktori = 'cover/'.$nama_file;
		if(move_uploaded_file($lokasi_file,$direktori)){
            	   if(!empty($cover)){
                     unlink("cover/$cover");
                  }
		   $sql = "update `pengumuman` set `id_admin`='$penulis', 
                  `isi`='$isi', `cover`='$nama_file', `judul`= '$judul'
                  where `id_pengumuman`='$id_pengumuman'";
                  //echo $sql;
		   mysqli_query($koneksi,$sql);
		}else{
		   $sql = "update `pengumuman` set `id_admin`='$penulis', 
				  `isi`='$isi', `judul`= '$judul'
				  where `id_pengumuman`='$id_pengumuman'";
                  //echo $sql;
		   mysqli_query($koneksi,$sql);
		}
header("Location:info_editberhasil");	
}
?>
