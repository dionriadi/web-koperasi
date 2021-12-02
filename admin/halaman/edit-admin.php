<?php 
$id_admin = $_GET['data'];
//get profil
$sql = "select `nama`, `email`,`foto`,`username`,`level` from `admin` where `id_admin`='$id_admin'";
$query = mysqli_query($koneksi, $sql);
while($data = mysqli_fetch_row($query)){
	$nama = $data[0];
	$email = $data[1]; 
	$foto = $data[2];
  $username = $data[3];
  $level = $data[4];
}
?>

<div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Admin</h3>
                
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="atur-admin">Pengaturan Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Admin</li>
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
                    <h5 class="card-title" style="color: white; background-color: rgb(93, 93, 146); padding: 20px; border-radius: 10px;">Form Edit Admin</h5>
                    <div class="col-12 d-flex justify-content-end">
                      <a href="atur-admin" class="btn btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    </div>
                    <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
                    <?php if($_GET['notif']=="kosong"){?>
                        <div class="alert alert-danger mt-5">Maaf data <?php echo $_GET['jenis'];?> wajib di isi</div>
                    <?php }?>
                    <?php }?>
                  </div>
                  
                  <div class="card-content">
                    <form class="form form-vertical" action="konfirmasi-edit-admin" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-7">
                            <input type="hidden" class="form-control" name="id_admin" value="<?php echo $id_admin; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="username" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="username" id="username" value="<?php echo $username;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-7">
                              <input type="email" class="form-control" name="email" id="email" value="<?php echo $email;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="level" class="col-sm-3 col-form-label">Level</label>
                          <div class="col-sm-7">
                            <select class="form-control" id="level" name="level">
                              <option value="Superadmin">Superadmin</option>
                              <option value="Admin">Admin</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="foto" class="col-sm-3 col-form-label">Foto </label>
                          <div class="col-sm-7">
                            <div class="custom-file">
                              <input type="file" class="basic-filepond" name="foto" id="customFile">
                            </div>  
                          </div>
                        </div>
                            <div class="col-12 d-flex justify-content-end">
                              <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                              <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                    
                      
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- bagian isi -->
        </div>
