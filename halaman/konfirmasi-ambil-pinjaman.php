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
        $keterangan="belum";
        $sql = "INSERT INTO pinjaman (id_anggota, tgl_pinjaman, batas_bayar, jumlah_pinjaman,keterangan) 
            values ('$id_user','$tgl_hutang','$tgl','$nominal','$keterangan')";
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
        
        $pinjamanAnggota = "SELECT total_pinjaman from anggota WHERE id_anggota='$id_user'";
        $query = $koneksi->query($pinjamanAnggota);
        $row = $query->fetch_assoc();
        $pinjamAnggota = $row['total_pinjaman']+$nominal;

        //menambah dari dana total pinjaman koperasi
        $pinjamanKoperasi = "SELECT total_dana from total_dana WHERE id_total=2";
        $query_k = $koneksi->query($pinjamanKoperasi);
        $row = $query_k->fetch_assoc();
        $pinjamKoperasi= $row['total_dana']+$nominal;


      //mengurangi  dana total tabungan koperasi
        $tabunganKoperasi = "SELECT total_dana from total_dana WHERE id_total=1";
        $query_tabung = $koneksi->query($tabunganKoperasi);
        $row = $query_tabung->fetch_assoc();
        $tabungKoperasi= $row['total_dana']-$nominal;

        //tambah pinjaman pada akun pribadi anggota
        $sql_anggota = "UPDATE anggota SET total_pinjaman='$pinjamAnggota' where id_anggota='$id_user'";
        mysqli_query($koneksi,$sql_anggota);
        //menambah total pinjaman pada dana total koperasi
        $sql_koperasi = "UPDATE total_dana SET total_dana='$pinjamKoperasi' where id_total=2";
        mysqli_query($koneksi,$sql_koperasi);
        //mengurangi total tabungan pada dana total koperasi
        $sql_koperasi = "UPDATE total_dana SET total_dana='$tabungKoperasi' where id_total=1";
        mysqli_query($koneksi,$sql_koperasi);

        header("location:beranda_berhasil_Pengambilan-pinjaman");
        
        
	}
}
 
?>
