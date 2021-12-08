<?php
$id_user = $_SESSION['id_user'];
$passBaru   = $_POST['pass_baru'];
$passLama   = $_POST['pass_lama'];
$passKonfirm = $_POST['pass_konfirm']; 

$passEnkrip = mysqli_real_escape_string($koneksi, MD5($passLama));
$sql_d = "SELECT `password` from `anggota` where `id_anggota` = '$id_user' ";  
$query_d = mysqli_query($koneksi,$sql_d);

    while($data_d = mysqli_fetch_row($query_d)){
       $passDb= $data_d[0];
    }

if((empty($passLama))){
    header("Location:ganti-sandi_passlamakosong");
    }else if((empty($passBaru))){
        header("Location:ganti-sandi_passbarukosong");
    }else if((empty($passKonfirm))){
        header("Location:ganti-sandi_passkonfirmkosong");
    }else if($passEnkrip != $passDb){
        header("Location:ganti-sandi_passlamabeda");
    }else if($passBaru != $passKonfirm){
        header("Location:ganti-sandi_passbarubeda");
    }else{
        $passEnkripBaru = mysqli_real_escape_string($koneksi, MD5($passBaru));
        $sql_d = "UPDATE `anggota` set `password`='$passEnkripBaru' where `id_anggota`='$id_user'";
		mysqli_query($koneksi,$sql_d);
        header("Location:profil_ubahberhasil");
	}



?>