<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Koperasi</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css" />

    <link rel="stylesheet" href="admin/assets/vendors/iconly/bold.css" />

    <link rel="stylesheet" href="admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="admin/assets/vendors/bootstrap-icons/bootstrap-icons.css" />
    <link rel="stylesheet" href="admin/assets/css/app.css" />
    <link rel="shortcut icon" href="admin/assets/images/favicon.svg" type="image/x-icon" />
</head>
<body style="margin-top:20px;">
<div class="container">      
<div class="page-heading">

          <!-- bagian isi -->
          <section id="basic-vertical-layouts">
            <div class="row match-height">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title" style="color: white; background-color: rgb(93, 93, 146); padding: 20px; border-radius: 10px;">Form Pendaftaran Anggota</h5>
                    <div class="col-12 d-flex justify-content-end">
                      <a href="masuk" class="btn btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    </div>
                    <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
                    <?php if($_GET['notif']=="kosong"){?>
                        <div class="alert alert-danger mt-5">Maaf data <?php echo $_GET['jenis'];?> wajib di isi</div>
                    <?php }?>
                    <?php }?>
                  </div>
                  
                  <div class="card-content">
                    <form class="form form-vertical" action="konfirmasi-daftar" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group row">
                          <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="nama" id="nama" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="username" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="username" id="username" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="alamat" id="alamat" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="no_hp" class="col-sm-3 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-7">
                              <input type="number" class="form-control" name="telp" id="telp" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="pekerjaan" id="alamat" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-7">
                              <input type="email" class="form-control" name="email" id="email" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-7">
                              <input type="password" class="form-control" name="password" id="password" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="foto" class="col-sm-3 col-form-label">Foto </label>
                          <div class="col-sm-7">
                            <div class="custom-file">
                              <input type="file" class="basic-filepond" name="foto" id="customFile" required>
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
        </div>
</div>
</div> 
        </body>
        </html>