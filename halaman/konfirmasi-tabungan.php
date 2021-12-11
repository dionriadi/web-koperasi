<?php
      //mengambil input user dari form
      // include("../koneksi/koneksi.php");
        $jenis = $_POST['jenis'];
        $nominal = $_POST['nominal'];
        $metode = $_POST['metode'];
        $id_anggota=$_SESSION['id_user'];
        $jenis_bayar = "Tabungan";
        $tgl = date("Y-m-d");
      //mengambil data dari database
      if(empty($jenis)){
	    header("Location:tabungan_kosong_jenis-tabungan");
        }else if(empty($nominal)){
            header("Location:tabungan_kosong_nominal");
        }else if(empty($metode)){
            header("Location:tabungan_kosong_metode");
        }else{    
          $sql = "INSERT INTO simpanan (id_anggota,id_jenis_simpanan, id_metode, jumlah) 
                  values ('$id_anggota','$jenis','$metode', '$nominal')";
                  mysqli_query($koneksi,$sql);

          $sql_t = "INSERT INTO transaksi (id_anggota,jenis_pembayaran, tgl_transaksi, jumlah_pembayaran) 
                  values ('$id_anggota','$jenis_bayar','$tgl', '$nominal')";
                  mysqli_query($koneksi,$sql_t);
        header("location:tabungan_berhasil_info");	
        }
            
    
?>
