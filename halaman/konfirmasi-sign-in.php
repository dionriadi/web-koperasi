<?php
      //mengambil input user dari form
      // include("../koneksi/koneksi.php");
        $nama = $_POST['nama'];
        $user = $_POST['username'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $email = $_POST['email'];
        $kerja = $_POST['pekerjaan'];
        $tgl = date('Y-m-d');
        $username = mysqli_real_escape_string($koneksi, $user);
        $password = mysqli_real_escape_string($koneksi, MD5($pass));
        
      //mengambil data dari database

            $sql = "INSERT INTO anggota (nama_anggota, tgl_daftar, no_hp, email, username, password, alamat, pekerjaan) 
            values ('$nama','$tgl','$telp','$email','$username','$password','$alamat','$kerja')";
            mysqli_query($koneksi,$sql);
        
            $lokasi_file = $_FILES['foto']['tmp_name'];
            $nama_file = $_FILES['foto']['name'];
            $direktori = 'foto/'.$nama_file;
                if(move_uploaded_file($lokasi_file,$direktori)){
                            $sql= "UPDATE  anggota set foto= '$nama_file' where `nama_anggota` = '$nama'"; 
                            mysqli_query($koneksi,$sql);
                
                }
            
        header("location:sukses");	
    
?>
