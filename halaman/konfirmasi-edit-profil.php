<?php 

if(isset($_SESSION['id_user'])){
	$id_user = $_SESSION['id_user'];
	$nama = $_POST['nama'];
    $user = $_POST['username'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];
    $kerja = $_POST['pekerjaan'];
    $username = mysqli_real_escape_string($koneksi, $user);
    $password = mysqli_real_escape_string($koneksi, MD5($pass));

    //get foto 
    $sql_f = "SELECT `foto` FROM `anggota` WHERE `id_anggota`='$id_user'";
    $query_f = mysqli_query($koneksi,$sql_f);
    while($data_f = mysqli_fetch_row($query_f)){
        $foto = $data_f[0];
        //echo $foto;
    }
 
	if(empty($nama)){
	    header("Location:edit-profil_kosong_nama");
	}else if(empty($username)){
	    header("Location:edit-profil_kosong_username");
	}else if(empty($alamat)){
	    header("Location:edit-profil_kosong_alamat");
	}else if(empty($telp)){
	    header("Location:edit-profil_kosong_nomor");
	}else if(empty($kerja)){
	    header("Location:edit-profil_kosong_pekerjaan");
    }else if(empty($email)){
	    header("Location:edit-profil_kosong_email");
	}else{
        $lokasi_file = $_FILES['foto']['tmp_name'];
		$nama_file = $_FILES['foto']['name'];
		$direktori = 'foto/'.$nama_file;
		if(move_uploaded_file($lokasi_file,$direktori)){
            	   if(!empty($foto)){
                     unlink("foto/$foto");
                  }
		   $sql = "update `anggota` set `nama_anggota`='$nama', 
                  `email`='$email',`alamat`='$alamat', `no_hp`='$telp',
                  `pekerjaan`='$kerja', `foto`='$nama_file', `username`= '$username'
                  where `id_anggota`='$id_user'";
                  //echo $sql;
		   mysqli_query($koneksi,$sql);
		}else{
		   $sql = "update `anggota` set `nama_anggota`='$nama', 
                  `email`='$email',`alamat`='$alamat', `no_hp`='$telp',
                  `pekerjaan`='$kerja', `foto`='$nama_file', `username`= '$username'
                  where `id_anggota`='$id_user'";
                  //echo $sql;
		   mysqli_query($koneksi,$sql);
		}
      	    header("Location:profil_berhasil");
	}
}
 
?>
