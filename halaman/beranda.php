<?php 
$id_user = $_SESSION['id_user'];
//get profil admin
$sql = "select `nama_anggota`,`foto`,`username`,`total_pinjaman` from `anggota` where `id_anggota`='$id_user'";
$query = mysqli_query($koneksi, $sql);
while($data = mysqli_fetch_row($query)){
	$nama = $data[0];
	$foto = $data[1];
  $username = $data[2];
  $pinjaman = $data[3];
}

//get pengumuman
$sql = "select `isi` from `pengumuman` where `id_pengumuman`='1'";
$query = mysqli_query($koneksi, $sql);
while($data = mysqli_fetch_row($query)){
	$isi = $data[0];
}

$sql_koperasi = "select `total_dana` from `total_dana` where `id_total`= 1";
$query = mysqli_query($koneksi, $sql_koperasi);
while($data = mysqli_fetch_row($query)){
	$total = $data[0];
}
?>

<!-- menu beranda -->
        <div class="page-heading">
          <h3>Beranda</h3>
        </div>
        <div class="page-content">
          <section class="row">
            <div class="col-12 col-lg-9">
              <div class="row">
                <div class="col-6 col-lg-6 col-md-6">
                  <div class="card">
                    <div class="card-body px-3 py-4-5">
                      <div class="row">
                        <div class="col-md-4">
                        <div class="stats-icon blue">
                          <i class="bi bi-wallet"></i>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <h6 class="text-muted font-semibold">Dana Koperasi</h6>
                    
                          <h6 class="font-extrabold mb-0"><?php echo "Rp." .number_format($total);?></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-6 col-lg-6 col-md-6">
                  <div class="card">
                    <div class="card-body px-3 py-4-5">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="stats-icon green">
                            <i class="bi bi-cash-stack"></i>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <h6 class="text-muted font-semibold">Pinjaman Anda</h6>
                          <h6 class="font-extrabold mb-0"><?php echo "Rp." .number_format($pinjaman)  ;?></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
                    <?php if($_GET['notif']=="berhasil"){?>
                      <div class="alert alert-success"><i class="bi bi-check-circle"></i> <?php echo $_GET['jenis'];?> berhasil</div>
                    <?php }else if($_GET['notif']=="berhasil"){?>
                        <div class="alert alert-success mt-5">Berhasil Menyimpan Tabungan</div>
                    <?php }?>
                    <?php }?>
              <div class="row">
                <div class="col-12">
                <div class="card">
          <div class="card-header">
            <h4>Informasi Terkini</h4>
          </div>
          <div class="card-body">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
              <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="admin/assets/images/samples/1.png" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="foto/Screenshot (235).png" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
     </div>
          </div>
            <div class="col-12 col-lg-3">
            <div class="card">
              <div class="card-header py-4 px-5">
                      <h4>Halo, pengguna</h4>
                    </div>
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="foto/<?php echo $foto;?>" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold"><?php echo $nama;?></h5>
                            <h6 class="text-muted mb-0"><?php echo $username;?></h6>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="card">
                <div class="card-content pb-4">
                  <div class="recent-message d-flex px-4 py-3">
                    <div class="stats-icon red">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-safe" viewBox="0 0 16 16">
                        <path d="M1 1.5A1.5 1.5 0 0 1 2.5 0h12A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-12A1.5 1.5 0 0 1 1 14.5V13H.5a.5.5 0 0 1 0-1H1V8.5H.5a.5.5 0 0 1 0-1H1V4H.5a.5.5 0 0 1 0-1H1V1.5zM2.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5h-12z"/>
                        <path d="M13.5 6a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zM4.828 4.464a.5.5 0 0 1 .708 0l1.09 1.09a3.003 3.003 0 0 1 3.476 0l1.09-1.09a.5.5 0 1 1 .707.708l-1.09 1.09c.74 1.037.74 2.44 0 3.476l1.09 1.09a.5.5 0 1 1-.707.708l-1.09-1.09a3.002 3.002 0 0 1-3.476 0l-1.09 1.09a.5.5 0 1 1-.708-.708l1.09-1.09a3.003 3.003 0 0 1 0-3.476l-1.09-1.09a.5.5 0 0 1 0-.708zM6.95 6.586a2 2 0 1 0 2.828 2.828A2 2 0 0 0 6.95 6.586z"/>
                      </svg>
                    </div>
                 
                    <div class="name ms-4">
                      <h5 class="mb-1">Simpanan Pokok</h5>
                      <?php
                            $jumlah = mysqli_query($koneksi,"SELECT SUM(jumlah) FROM simpanan WHERE id_jenis_simpanan=2 and id_anggota='$id_user'");
                            while($data = mysqli_fetch_array($jumlah)) {
                      ?>
                      <h6 class="text-muted mb-0"><?php echo "Rp." . number_format($data['SUM(jumlah)']) ;}?></h6>
                    </div>
                  </div>
                  <div class="recent-message d-flex px-4 py-3">
                    <div class="stats-icon purple">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-safe" viewBox="0 0 16 16">
                        <path d="M1 1.5A1.5 1.5 0 0 1 2.5 0h12A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-12A1.5 1.5 0 0 1 1 14.5V13H.5a.5.5 0 0 1 0-1H1V8.5H.5a.5.5 0 0 1 0-1H1V4H.5a.5.5 0 0 1 0-1H1V1.5zM2.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5h-12z"/>
                        <path d="M13.5 6a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zM4.828 4.464a.5.5 0 0 1 .708 0l1.09 1.09a3.003 3.003 0 0 1 3.476 0l1.09-1.09a.5.5 0 1 1 .707.708l-1.09 1.09c.74 1.037.74 2.44 0 3.476l1.09 1.09a.5.5 0 1 1-.707.708l-1.09-1.09a3.002 3.002 0 0 1-3.476 0l-1.09 1.09a.5.5 0 1 1-.708-.708l1.09-1.09a3.003 3.003 0 0 1 0-3.476l-1.09-1.09a.5.5 0 0 1 0-.708zM6.95 6.586a2 2 0 1 0 2.828 2.828A2 2 0 0 0 6.95 6.586z"/>
                      </svg>
                    </div>
                    <div class="name ms-4">
                      <h5 class="mb-1">Simpanan Wajib</h5>
                      <?php
                            $jumlah = mysqli_query($koneksi,"SELECT SUM(jumlah) FROM simpanan WHERE id_jenis_simpanan=1 and id_anggota='$id_user'");
                            while($data = mysqli_fetch_array($jumlah)) {
                      ?>
                      <h6 class="text-muted mb-0"><?php echo "Rp." . number_format($data['SUM(jumlah)']) ;}?></h6>
                    </div>
                  </div>
                  <div class="recent-message d-flex px-4 py-3">
                    <div class="stats-icon blue">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                      <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    </div>
                 
                    <div class="name ms-4">
                      <h5 class="mb-1">Simpanan Sukarela</h5>
                      <?php
                            $jumlah = mysqli_query($koneksi,"SELECT SUM(jumlah) FROM simpanan WHERE id_jenis_simpanan=3 and id_anggota='$id_user'");
                            while($data = mysqli_fetch_array($jumlah)) {
                      ?>
                      <h6 class="text-muted mb-0"><?php echo "Rp." . number_format($data['SUM(jumlah)']) ;}?></h6>
                    </div>
                  </div>
             </div>
            </div>
          </section>

        <!-- akhir bagian isi -->
