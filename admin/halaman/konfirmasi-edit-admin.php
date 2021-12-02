<?php 

	$id_admin = $_POST['id_admin'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$level = $_POST['level'];
	$nama_file = $_FILES['foto']['name'];
	$lokasi_file = $_FILES['foto']['tmp_name'];
	$direktori = 'foto/'.$nama_file;
	$username = mysqli_real_escape_string($koneksi, $user);
	$password = mysqli_real_escape_string($koneksi, MD5($pass));
   
    //get foto 
    $sql_f = "SELECT `foto`, `password` FROM `admin` WHERE `id_admin`='$id_admin'";
    $query_f = mysqli_query($koneksi,$sql_f);
    while($data_f = mysqli_fetch_row($query_f)){
        $foto = $data_f[0];
		$passlama=$data_f[1];
    }
	
	if(empty($nama)){
	    header("Location:edit-admin_kosong_nama_$id_admin");
	}else if(empty($email)){
	    header("Location:edit-admin_kosong_email_$id_admin");
	}
	else if(empty($username)){
	    header("Location:edit-admin_kosong_username_$id_admin");	
	}
	else if(empty($level)){
	    header("Location:edit-admin_kosong_level_$id_admin");	
	}
	else{
		//pengecekan foto
        $lokasi_file = $_FILES['foto']['tmp_name'];
		$nama_file = $_FILES['foto']['name'];
		$direktori = 'foto/'.$nama_file;
		if(move_uploaded_file($lokasi_file,$direktori)){
            if(!empty($foto)){
                     unlink("foto/$foto");
            }
				$sql = "UPDATE `admin` set `nama`='$nama', `email`='$email' , `level`='$level', `username`='$username', `foto` = '$nama_file'
				where `id_admin`='$id_admin'";
				 //echo $sql;
		  		mysqli_query($koneksi,$sql);
			}else {
		$sql = "UPDATE `admin` set `nama`='$nama', `email`='$email' , `level`='$level', `username`='$username'
				where `id_admin`='$id_admin'";
				 //echo $sql;
		  		mysqli_query($koneksi,$sql);
	
		}
	header("Location:atur-admin_editberhasil");
}
?>
