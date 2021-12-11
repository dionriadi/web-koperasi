<?php 
$id_transaksi = $_GET['data'];
//get profil
$sql_k = "SELECT transaksi.id_transaksi, transaksi.jenis_pembayaran,transaksi.tgl_transaksi,
          transaksi.jumlah_pembayaran,transaksi.id_anggota, anggota.id_anggota,
          anggota.nama_anggota
          FROM `transaksi` JOIN anggota ON transaksi.id_anggota=anggota.id_anggota
          ORDER BY `tgl_transaksi` DESC ";
            $query_k = mysqli_query($koneksi,$sql_k);
            while($data_k = mysqli_fetch_array($query_k)){
            $id_transaksi=$data_k['id_transaksi'];
            $jenis = $data_k['jenis_pembayaran'];
            $tanggal = $data_k['tgl_transaksi'];
            $nama=$data_k['nama_anggota'];
            $jumlah=$data_k['jumlah_pembayaran'];
            }
                           
?>
      <!-- sidebar -->
      <!-- sidebar -->

      <!-- isi -->
        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Bukti Transaksi</h3>
                
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="transaksi">Transaksi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Transaksi</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>

          <!-- bagian isi -->
          <section id="basic-vertical-layouts">
            <div class="col-md-6 col-sm-12">
              <div class="card">
              <div class="card-header">
                    <div class="col-12 d-flex justify-content-end">
                      <a href="transaksi" class="btn btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    </div>
                  </div>
                <div class="card-content">
                  <div class = "card-body">
                  <table class="table table-bordered">
                    <tbody>  
                      <tr>
                        <td colspan="2"><i class="fas fa-user-circle"></i>  
                         <strong>Bukti Transaksi<strong></td>
                      </tr> 
                      <tr>
                        <td width="20%"><strong>Tanggal Transaksi<strong></td>
                        <td width="80%"><?php echo $tanggal;?></td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>ID Transaksi<strong></td>
                        <td width="80%"><?php echo $id_transaksi;?></td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Nama<strong></td>
                        <td width="80%"><?php echo $nama;?></td>
                      </tr>                
                      <tr>
                          <td width="20%"><strong>Jenis Pembayaran<strong></td>
                          <td width="80%"><?php echo $jenis; ?></td>
                      </tr>                
                      <tr>
                          <td width="20%"><strong>Nominal Pembayaran<strong></td>
                          <td width="80%"><?php echo "Rp. ".number_format($jumlah);?></td>
                      </tr>
                    </tbody>
                  </table>  
                    </div>
                </div>
              </div>
            </div>
          </section>
        </div>

        <!-- footer -->
        <!-- footer -->

