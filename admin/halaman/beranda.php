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


?>

<!-- menu beranda -->
        <div class="page-heading">
          <h3>Beranda</h3>
        </div>
        <div class="page-content">
          <section class="row">
            <div class="col-12 col-lg-9">
              <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-3 py-4-5">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="stats-icon purple">
                            <i class="iconly-boldProfile"></i>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <h6 class="text-muted font-semibold">Anggota</h6>
                          <h6 class="font-extrabold mb-0"><?php echo $jumlah_anggota; ?></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-3 py-4-5">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="stats-icon blue">
                            <i class="bi bi-wallet"></i>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <h6 class="text-muted font-semibold">Tabungan</h6>
                          <h6 class="font-extrabold mb-0">183.000</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-3 py-4-5">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="stats-icon green">
                            <i class="bi bi-cash-stack"></i>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <h6 class="text-muted font-semibold">Piutang</h6>
                          <h6 class="font-extrabold mb-0">80.000</h6>
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
                      <h4>Pengumuman</h4>
                    </div>
                    <div class="card-body">
                      <p><?php echo $isi;?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-3">
              <div class="card">
                <div class="card-header">
                  <h4>Admin</h4>
                </div>
                <div class="card-content pb-4">
                  <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-xl">
                      <img src="foto/dion.png" alt="Face 1" />
                    </div>
                    <div class="ms-3 name">
                      <h5 class="font-bold"><?php echo $nama;?></h5>
                      <h6 class="text-muted mb-0"><?php echo $username;?></h5>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  <h4>Anggota Baru</h4>
                </div>
                <div class="card-content pb-4">
                  <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                      <img src="assets/images/faces/4.jpg" />
                    </div>
                    <div class="name ms-4">
                      <h5 class="mb-1">Naruto</h5>
                      <h6 class="text-muted mb-0">@naruto</h6>
                    </div>
                  </div>
                  <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                      <img src="assets/images/faces/5.jpg" />
                    </div>
                    <div class="name ms-4">
                      <h5 class="mb-1">Sakura</h5>
                      <h6 class="text-muted mb-0">@sakura</h6>
                    </div>
                  </div>
                  <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                      <img src="assets/images/faces/1.jpg" />
                    </div>
                    <div class="name ms-4">
                      <h5 class="mb-1">Sasuke</h5>
                      <h6 class="text-muted mb-0">@sasuke</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

        <!-- akhir bagian isi -->
