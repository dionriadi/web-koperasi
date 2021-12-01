<?php 

$nama = $_POST['nama'];
$email = $_POST['email'];
$user = $_POST['username'];
$pass = $_POST['password'];
$level = $_POST['level'];

$username = mysqli_real_escape_string($koneksi, $user);
$password = mysqli_real_escape_string($koneksi, MD5($pass));

if((empty($nama)) && (empty($email)) && (empty($username)) && (empty($password)) ){
	header("location:tambah-admin_kosong_semua");
}else if((empty($nama))){
    header("location:tambah-admin_kosong_nama");
}
else if((empty($email))){
    header("location:tambah-admin_kosong_email");
}
else if((empty($username))){
    header("location:tambah-admin_kosong_username");
}
else if((empty($password))){
    header("location:tambah-admin_kosong_password");
}
else{
    
	$sql = "INSERT INTO admin (nama, email, username, password, level) 
	values ('$nama', '$email', '$username','$password','$level')";
	mysqli_query($koneksi,$sql);
 
    $lokasi_file = $_FILES['foto']['tmp_name'];
	$nama_file = $_FILES['foto']['name'];
	$direktori = 'foto/'.$nama_file;
		if(move_uploaded_file($lokasi_file,$direktori)){
                     $sql= "UPDATE  admin set foto= '$nama_file' where `nama` = '$nama'"; 
                     mysqli_query($koneksi,$sql);
		   
		}
    
header("location:pengaturan-admin_berhasil");	
}
// }
?>
