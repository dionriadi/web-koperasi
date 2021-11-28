<?php 

if(isset($_SESSION['id_user'])){
	$id_user = $_SESSION['id_user'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
    $username = $_POST['username'];

    //get foto 
    $sql_f = "SELECT `foto` FROM `admin` WHERE `id_user`='$id_user'";
    $query_f = mysqli_query($koneksi,$sql_f);
    while($data_f = mysqli_fetch_row($query_f)){
        $foto = $data_f[0];
        //echo $foto;
    }
 
	if(empty($nama)){
	    header("Location:edit-profil_kosong_nama");
	}else if(empty($email)){
	    header("Location:edit-profil_kosong_email");
	}else if(empty($username)){
	    header("Location:edit-profil_kosong_username");
	}else{
        $lokasi_file = $_FILES['foto']['tmp_name'];
		$nama_file = $_FILES['foto']['name'];
		$direktori = 'foto/'.$nama_file;
		if(move_uploaded_file($lokasi_file,$direktori)){
            	   if(!empty($foto)){
                     unlink("foto/$foto");
                  }
		   $sql = "update `admin` set `nama`='$nama', 
                  `email`='$email', `foto`='$nama_file', `username`= '$username'
                  where `id_user`='$id_user'";
                  //echo $sql;
		   mysqli_query($koneksi,$sql);
		}else{
		   $sql = "update `admin` set `nama`='$nama', `email`='$email', `username`= '$username' 
                  where `id_user`='$id_user'";
                  //echo $sql;
		   mysqli_query($koneksi,$sql);
		}
      	    header("Location:profil_berhasil");
	}
}
 
?>
