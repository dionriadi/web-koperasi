<div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Riwayat Transaksi</h3>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Riwayat Transaksi</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
          <section class="section">
            <div class="card">
              <div class="card-body">
                <table class="table table-bordered mt-4" id="table1">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jenis Pembayaran</th>
                      <th>Jumlah Nominal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $id_anggota= $_SESSION['id_user'];
                      $posisi=0;
                        $sql_k = "SELECT `id_transaksi`,`jenis_pembayaran`, `jumlah_pembayaran`FROM `transaksi` WHERE id_anggota='$id_anggota' ORDER BY `tgl_transaksi` DESC ";
                        $query_k = mysqli_query($koneksi,$sql_k);
                        $posisi+1;
                        while($data_k = mysqli_fetch_row($query_k)){
                          $id_transaksi = $data_k[0];
                          $jenis = $data_k[1];
                          $jumlah = $data_k[2];
                      ?>
                    <tr>
                        <td><?php echo $posisi+1; ?></td>
                        <td><?php echo $jenis; ?></td>
                        <td><?php echo "Rp. ".number_format($jumlah); ?></td>
                        <td align="center">
                          <a href="detail-proses_<?php echo $id_transaksi;?>" class="btn btn-xs btn-info" title="Detail"><i class="bi bi-eye"></i></a>
                        </td>
                      </tr>
                      <?php $posisi++; }?>
                  </tbody>
                </table>
                
              </div>
            </div>
          </section>
        </div>

