<?php
      //mengambil input user dari form
      // include("../koneksi/koneksi.php");
        $hp = $_POST['hp'];
        $nominal = $_POST['nominal'];
        $metode = $_POST['metode'];
        $id_anggota=$_SESSION['id_user'];
        $jenis_bayar = "Pengambilan Tabungan";
        $tgl = date("Y-m-d");
      //mengambil data dari database
      if(empty($nominal)){
	    header("Location:ambil-dana_kosong_nominal");
        }else if(empty($metode)){
            header("Location:ambil-dana_kosong_metode");
        }else if(empty($hp)){
            header("Location:ambil-dana_kosong_nomor-tujuan");
        }else{  
          $tabunganDb = "SELECT total_tabungan from anggota WHERE id_anggota='$id_anggota'";
          $query = $koneksi->query($tabunganDb);
          $row = $query->fetch_assoc();
          $ambil = $row['total_tabungan']-$nominal;
        
          $sql = "UPDATE anggota SET total_tabungan='$ambil' where id_anggota='$id_anggota'";
                  mysqli_query($koneksi,$sql);

          $sql_t = "INSERT INTO transaksi (id_anggota,jenis_pembayaran, tgl_transaksi, jumlah_pembayaran) 
                  values ('$id_anggota','$jenis_bayar','$tgl', '$nominal')";
                  mysqli_query($koneksi,$sql_t);
        header("location:beranda_berhasil_Pengambilan-tabungan");	
        }
            
    
?>
