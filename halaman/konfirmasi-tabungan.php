<?php
      //mengambil input user dari form
      // include("../koneksi/koneksi.php");
        $jenis = $_POST['jenis'];
        $nominal = $_POST['nominal'];
        $metode = $_POST['metode'];
        $id_anggota=$_SESSION['id_user'];
        $jenis_bayar = "Pembayaran Simpanan";
        $tgl = date("Y-m-d");
      //mengambil data dari database
      if(empty($jenis)){
	    header("Location:tabungan_kosong_jenis-tabungan");
        }else if(empty($nominal)){
            header("Location:tabungan_kosong_nominal");
        }else if(empty($metode)){
            header("Location:tabungan_kosong_metode");
        }else{   
          //mengambil total tabungan dari akun pribadi anggota 
          $tabunganAnggota = "SELECT total_tabungan from anggota WHERE id_anggota='$id_anggota'";
          $query = $koneksi->query($tabunganAnggota);
          $row = $query->fetch_assoc();
          $tambah_anggota = $row['total_tabungan']+$nominal;
          
          //menambahkan total tabungan dari dana total koperasi
          $tabunganKoperasi = "SELECT total_dana from total_dana WHERE id_total=1";
          $query_k = $koneksi->query($tabunganKoperasi);
          $row = $query_k->fetch_assoc();
          $tambah_koperasi = $row['total_dana']+$nominal;
          
          //menambahkan ke database pinjaman
          $sql_simpanan= "INSERT INTO simpanan (id_anggota,id_jenis_simpanan, id_metode, jumlah) 
                         values ('$id_anggota','$jenis','$metode', '$nominal')";
                        mysqli_query($koneksi,$sql_simpanan);
          
          //tambah tabungan pada akun pribadi anggota
          $sql_anggota = "UPDATE anggota SET total_tabungan='$tambah_anggota' where id_anggota='$id_anggota'";
                  mysqli_query($koneksi,$sql_anggota);

          //tambah tabungan pada dana total koperasi
          $sql_koperasi = "UPDATE total_dana SET total_dana='$tambah_koperasi' where id_total=1";
                  mysqli_query($koneksi,$sql_koperasi);
          
          //menambahkan untuk keperluan riwayat transaksi
          $sql_t = "INSERT INTO transaksi (id_anggota,jenis_pembayaran, tgl_transaksi, jumlah_pembayaran) 
                  values ('$id_anggota','$jenis_bayar','$tgl', '$nominal')";
                  mysqli_query($koneksi,$sql_t);
        header("location:beranda_berhasil_Penambahan-tabungan");	
        }
            
    
?>
