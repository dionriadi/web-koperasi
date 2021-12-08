<?php 

$id_user = $_SESSION['id_user'];
//get profil
$sql = "select `nama_anggota`,`no_hp`, `email`,`username`,`alamat`, `pekerjaan` from `anggota` where `id_anggota`='$id_user'";
$query = mysqli_query($koneksi, $sql);
while($data = mysqli_fetch_row($query)){
	$nama = $data[0];
	$telp = $data[1]; 
	$email = $data[2];
  $username = $data[3];
  $alamat = $data[4];
  $pekerjaan = $data[5];
}
?>
        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Profil</h3>
                
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda">Profil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Profil</li>
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
                  <div class="card-header">
                    <h5 class="card-title" style="color: white; background-color: rgb(93, 93, 146); padding: 20px; border-radius: 10px;">Form Edit Profil</h5>
                    <div class="col-12 d-flex justify-content-end">
                      <a href="profil" class="btn btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    </div>
                    <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
                    <?php if($_GET['notif']=="kosong"){?>
                        <div class="alert alert-danger mt-5">Maaf data <?php echo $_GET['jenis'];?> wajib di isi</div>
                    <?php }?>
                    <?php }?>
                  </div>
                  
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form form-vertical" action="konfirmasi-edit-profil" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-12">
                            <div class="form-group row">
                          <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama;?>" >
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="username" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="username" id="username" value="<?php echo $username;?>" >
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $alamat;?>" >
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="no_hp" class="col-sm-3 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-7">
                              <input type="number" class="form-control" name="telp" id="telp" value="<?php echo $telp;?>" >
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="pekerjaan" id="alamat" value="<?php echo $pekerjaan;?>" >
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-7">
                              <input type="email" class="form-control" name="email" id="email" value="<?php echo $email;?>" >
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="foto" class="col-sm-3 col-form-label">Foto </label>
                          <div class="col-sm-7">
                            <div class="custom-file">
                              <input type="file" class="basic-filepond" name="foto" id="customFile" >
                            </div>  
                          </div>
                        </div>
                            <div class="col-12 d-flex justify-content-end">
                              <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                              <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- bagian isi -->
        </div>
