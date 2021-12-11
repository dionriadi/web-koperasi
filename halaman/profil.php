<?php 
$id_user = $_SESSION['id_user'];
//get profil
$sql = "select `nama_anggota`, `email`,`foto`,`username` from `anggota` where `id_anggota`='$id_user'";
$query = mysqli_query($koneksi, $sql);
while($data = mysqli_fetch_row($query)){
	$nama = $data[0];
	$email = $data[1]; 
	$foto = $data[2];
  $username = $data[3];
}
?>
      <!-- sidebar -->
      <!-- sidebar -->

      <!-- isi -->
        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Profil</h3>
                
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profil</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>

          <!-- bagian isi -->
          <section id="basic-vertical-layouts">
          <div class="row match-height">
              <div class="col-12">
              <div class="card">
                <div class="card-content">
                  <div class = "card-body">
                  <table class="table table-bordered">
                    <?php if(!empty($_GET['notif'])){
                    if($_GET['notif']=="berhasil"){?>
                        <div class="alert alert-success" role="alert">
                        Data Berhasil Diubah</div>
                    <?php } else if($_GET['notif']=="ubahberhasil"){?>
                        <div class="alert alert-success" role="alert">
                        Password Berhasil Diubah</div>
                    <?php }}?>

                    <tbody>  
                      <tr>
                        <td colspan="2"><i class="fas fa-user-circle"></i>  
                         <strong>PROFIL<strong></td>
                      </tr> 
                      <tr>
                        <td width="20%"><strong>Foto<strong></td>
                        <td width="80%"><img src="foto/<?php echo $foto;?>" class="img-fluid" width="200px;"></td>
                      </tr>                
                      <tr>
                          <td width="20%"><strong>Nama<strong></td>
                          <td width="80%"><?php echo $nama; ?></td>
                      </tr>                
                      <tr>
                          <td width="20%"><strong>Email<strong></td>
                          <td width="80%"><?php echo $email;?></td>
                      </tr> 
                      <tr>
                          <td width="20%"><strong>Simpanan Wajib<strong></td>
                          <?php
                            $jumlah = mysqli_query($koneksi,"SELECT SUM(jumlah) FROM simpanan WHERE id_jenis_simpanan=1 and id_anggota='$id_user'");
                            while($data = mysqli_fetch_array($jumlah)) {
                          ?>
                          <td width="80%"><?php echo "Rp." . number_format($data['SUM(jumlah)']) ;}?></td>
                      </tr>
                      <tr>
                          <td width="20%"><strong>Simpanan Pokok<strong></td>
                          <?php
                            $jumlah = mysqli_query($koneksi,"SELECT SUM(jumlah) FROM simpanan WHERE id_jenis_simpanan=2 and id_anggota='$id_user'");
                            while($data = mysqli_fetch_array($jumlah)) {
                          ?>
                          <td width="80%"><?php echo "Rp." . number_format($data['SUM(jumlah)']) ;}?></td>
                      </tr>
                      <tr>
                          <td width="20%"><strong>Simpanan Sukarela<strong></td>
                          <?php
                            $jumlah = mysqli_query($koneksi,"SELECT SUM(jumlah) FROM simpanan WHERE id_jenis_simpanan=3 and id_anggota='$id_user'");
                            while($data = mysqli_fetch_array($jumlah)) {
                          ?>
                          <td width="80%"><?php echo "Rp." . number_format($data['SUM(jumlah)']) ;}?></td>
                      </tr>
                    </tbody>
                  </table>  
                  
                      <a href="edit-profil"><button class="btn btn-primary block">Edit Profil</button></a>
                      <a href="ganti-sandi"><button class="btn btn-info">Ubah Password</button></a>
                    </div>
                </div>
              </div>
            </div>
          </section>
        </div>

        <!-- footer -->
        <!-- footer -->

