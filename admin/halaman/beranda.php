<?php 
$id_user = $_SESSION['id_user'];
//get profil admin
$sql = "select `nama`,`foto`,`username` from `admin` where `id_admin`='$id_user'";
$query = mysqli_query($koneksi, $sql);
while($data = mysqli_fetch_row($query)){
	$nama = $data[0];
	$foto = $data[1];
  $username = $data[2];
}

//get pengumuman
$sql = "select `isi` from `pengumuman` where `id_pengumuman`='1'";
$query = mysqli_query($koneksi, $sql);
while($data = mysqli_fetch_row($query)){
	$isi = $data[0];
}

// mengambil data anggota
$data_anggota = mysqli_query($koneksi,"SELECT `id_anggota` FROM anggota"); 
// menghitung data anggota
$jumlah_anggota = mysqli_num_rows($data_anggota);

//get total dana
$sql_dana = "select `total_dana` from `total_dana` where `id_total`= 1";
$query = mysqli_query($koneksi, $sql_dana);
while($data = mysqli_fetch_row($query)){
	$dana = $data[0];
}
//get total dana
$sql_pinjam = "select `total_dana` from `total_dana` where `id_total`= 2";
$query = mysqli_query($koneksi, $sql_pinjam);
while($data = mysqli_fetch_row($query)){
	$pinjam = $data[0];
}

//ambil pengumuman
$hasil=$koneksi->query("SELECT `isi`,`judul`, `cover` FROM `pengumuman` ORDER BY `tanggal` DESC LIMIT 3");

//ambil anggota baru
$anggota=$koneksi->query("SELECT `nama_anggota`,`foto` FROM `anggota` ORDER BY `id_anggota` DESC LIMIT 3");
?>

<!-- menu beranda -->
<div class="page-heading"><h3>Beranda</h3></div>
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
                    <h6 class="text-muted font-semibold">Total Dana Koperasi</h6>
                    <h6 class="font-extrabold mb-0"><?php echo "Rp." .number_format($dana);?></h6>
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
                    <h6 class="text-muted font-semibold">Total Pinjaman</h6>
                    <h6 class="font-extrabold mb-0"><?php echo "Rp." .number_format($pinjam);?></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Informasi Terkini</h4>
              </div>
              <div class="card-body">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                  <ol class="carousel-indicators">
                    <?php
                      $i=0;
                      foreach($hasil as $row){
                        $actives="";
                        if($i==0){
                          $actives="active";
                        }
                      ?>
                      <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $i;?>" class="<?= $actives;?>"></li>
                    <?php $i++;}?>
                  </ol>
                <div class="carousel-inner">
                    <?php
                      $i=0;
                        foreach($hasil as $row){
                          $actives="";
                          if($i==0){
                            $actives="active";
                          }
                          
                        ?>
                <div class="carousel-item <?= $actives;?>">
                  <img src="cover/<?= $row['cover'];?>" class="d-block w-100" alt="...">
                  
                  <div class="carousel-caption d-none d-md-block">
                    <h5><?= $row['judul'];?></h5>
                    <p><?= $row['isi'];?></p>
                  </div>
                </div>
                <?php $i++;}?>
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
                      <h4>Halo, Admin</h4>
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
                    </div>
                    <div class="name ms-4">
                      <h5 class="mb-1">Total Anggota</h5>
                      <h6 class="text-muted mb-0"><?php echo $jumlah_anggota; ?></h6>
                    </div>
                  </div>
                            </div>
                            </div>
                            <div class="card">
                            <div class="card-header">
                            <h5 class="font-bold">Anggota Baru</h5>
                        </div>
                <div class="card-content pb-4">
                  <div class="recent-message d-flex px-4 py-3">
                  <?php
                      $j=0;
                      foreach($anggota as $data){
                        
                      ?>
                    <div class="avatar avatar-xl">
                    <img src="../foto/<?= $data['foto'];?>">
                    </div>
                    <div class="name ms-4">
                      <h5 class="mb-1"><?= $data['nama_anggota'];?></h5>
                    </div>
                  </div>
                  <?php $j++;}?>
             </div>
            </div>
          </section>

        <!-- akhir bagian isi -->
