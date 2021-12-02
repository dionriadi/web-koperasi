<?php 
$id_pengumuman = $_GET['data'];

$sql_k = "SELECT pengumuman.id_pengumuman ,pengumuman.judul, pengumuman.isi, pengumuman.tanggal,
    admin.id_admin, admin.nama FROM pengumuman join admin  on pengumuman.id_admin = admin.id_admin where `id_pengumuman`='$id_pengumuman'";
    $query_k = mysqli_query($koneksi,$sql_k);
    while($data_k = mysqli_fetch_array($query_k)){
      $judul = $data_k['judul'];
      $isi = $data_k['isi'];
      $tanggal = $data_k['tanggal'];
    }
    $sql_u = "SELECT admin.id_admin, pengumuman.id_admin, admin.nama  FROM pengumuman 
    join admin  on admin.id_admin = pengumuman.id_admin where `id_pengumuman`='$id_pengumuman'";
    $query_u = mysqli_query($koneksi,$sql_u);
    while($data_u = mysqli_fetch_array($query_u)){
      $penulis = $data_u['nama'];
    }
?>
      <!-- sidebar -->
      <!-- sidebar -->

      <!-- isi -->
        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Pengumuman</h3>
                
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="info">Detail Pengumuman</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pengumuman</li>
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
                      <a href="info" class="btn btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-content">
                  <div class = "card-body">
                  
                  <table class="table table-bordered">
                    <tbody>  
                      <tr>
                        <td colspan="2"><i class="fas fa-user-circle"></i>  
                         <strong>Detail Admin<strong></td>
                      </tr> 
                      <tr>
                        <td width="20%"><strong>Judul<strong></td>
                        <td width="80%"><?php echo $judul; ?></td>
                      </tr>                
                      <tr>
                          <td width="20%"><strong>Isi<strong></td>
                          <td width="80%"><?php echo $isi; ?></td>
                      </tr>                
                      <tr>
                          <td width="20%"><strong>Penulis<strong></td>
                          <td width="80%"><?php echo $penulis;?></td>
                      </tr>
                      <tr>
                          <td width="20%"><strong>Tanggal<strong></td>
                          <td width="80%"><?php echo $tanggal; ?></td>
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
        <footer>
          <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
              <p>2021 &copy; Kelompok 3 TIK 3A</p>
            </div>
            <div class="float-end"></div>
          </div>
        </footer>
        <!-- footer -->
      </div>
      <!-- isi -->
    </div>
