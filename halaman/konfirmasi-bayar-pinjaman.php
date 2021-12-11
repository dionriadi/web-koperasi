<?php
      //mengambil input user dari form

        $tagihan = $_POST['tagihan'];
        $nominal = $_POST['nominal'];
        $metode = $_POST['metode'];
        
        $id_anggota=$_SESSION['id_user'];
        $jenis_bayar = "Pembayaran Pinjaman";
        $tgl = date("Y-m-d");
      //mengambil data dari database
      if(empty($nominal)){
	    header("Location:pinjaman_kosong_tagihan");
        }else if(empty($nominal)){
            header("Location:pinjaman_kosong_nominal");
        }else if(empty($metode)){
            header("Location:pinjaman_kosong_nomor-metode");
        }else{
          $keterangan="lunas";
          //mengambil nilai pinjaman dari akun pribadi anggota 
          $pinjamanAnggota = "SELECT total_pinjaman from anggota WHERE id_anggota='$id_anggota'";
          $query = $koneksi->query($pinjamanAnggota);
          $row = $query->fetch_assoc();
          $pinjamAnggota = $row['total_pinjaman']-$nominal;
            //pengecekan apakah selisih negatif
            if($pinjamanAnggota<=0){
                $pinjamanAnggota=0;
            }
           
            //mengurangi dari dana total pinjaman koperasi
          $pinjamanKoperasi = "SELECT total_dana from total_dana WHERE id_total=2";
          $query_k = $koneksi->query($pinjamanKoperasi);
          $row = $query_k->fetch_assoc();
          $pinjamKoperasi= $row['total_dana']-$nominal;
            //pengecekan apakah selisih negatif
            if($pinjamKoperasi<=0){
                $pinjamKoperasi=0;
            }

        //menambah  dana total tabungan koperasi
          $tabunganKoperasi = "SELECT total_dana from total_dana WHERE id_total=1";
          $query_tabung = $koneksi->query($tabunganKoperasi);
          $row = $query_tabung->fetch_assoc();
          $tabungKoperasi= $row['total_dana']+$nominal;

            //mengedit data pinjaman anggota
          $sql_pinjaman= "UPDATE pinjaman SET keterangan='$keterangan' WHERE id_pinjaman='$tagihan'";
                mysqli_query($koneksi,$sql_pinjaman);
          
          //tambah tabungan pada akun pribadi anggota
          $sql_anggota = "UPDATE anggota SET total_pinjaman='$pinjamanAnggota' where id_anggota='$id_anggota'";
                  mysqli_query($koneksi,$sql_anggota);

          //mengurangi total pinjaman pada dana total koperasi
          $sql_koperasi = "UPDATE total_dana SET total_dana='$pinjamKoperasi' where id_total=2";
                  mysqli_query($koneksi,$sql_koperasi);
          //menambah total tabungan pada dana total koperasi
          $sql_koperasi = "UPDATE total_dana SET total_dana='$tabungKoperasi' where id_total=1";
                  mysqli_query($koneksi,$sql_koperasi);
          
          //menambahkan untuk keperluan riwayat transaksi
          $sql_t = "INSERT INTO transaksi (id_anggota,jenis_pembayaran, tgl_transaksi, jumlah_pembayaran) 
                  values ('$id_anggota','$jenis_bayar','$tgl', '$nominal')";
                  mysqli_query($koneksi,$sql_t);
        header("location:beranda_berhasil_Pembayaran-Pinjaman");	
        }
            
    
?>
