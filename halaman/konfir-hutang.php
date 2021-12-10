<?php 

if(isset($_SESSION['id_user'])){
	$id_user = $_SESSION['id_user'];
	$nominal = $_POST['nominal'];
    $tgl = $_POST['tgl'];
    $tgl_hutang= date("Y-m-d");
    $jenis="Peminjaman";
    //get foto 
	if(empty($nominal)){
	    header("Location:ambil-pinjam_kosong_nominal");
	}else if(empty($tgl)){
	    header("Location:ambil-pinjam_kosong_tanggal");
    }else{
        $sql = "INSERT INTO pinjaman (id_anggota, tgl_pinjaman, batas_bayar, jumlah_pinjaman) 
            values ('$id_user','$tgl_hutang','$tgl','$nominal')";
            mysqli_query($koneksi,$sql);
        
            $lokasi_file = $_FILES['foto']['tmp_name'];
            $nama_file = $_FILES['foto']['name'];
            $direktori = 'foto/'.$nama_file;
                if(move_uploaded_file($lokasi_file,$direktori)){
                            $sql= "UPDATE  pinjaman set bukti= '$nama_file' where `id_anggota` = '$id_user'"; 
                            mysqli_query($koneksi,$sql);
                
                }

        $sql_t = "INSERT INTO transaksi (id_anggota,jenis_pembayaran, tgl_transaksi, jumlah_pembayaran) 
                values ('$id_user','$jenis','$tgl_hutang', '$nominal')";
                mysqli_query($koneksi,$sql_t);
            
        header("location:sukses");	
	}
}
 
?>
