        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Admin</h3>
                
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="pengaturan-admin">Pengaturan Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Admin</li>
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
                    <h5 class="card-title" style="color: white; background-color: rgb(93, 93, 146); padding: 20px; border-radius: 10px;">Form Tambah Admin</h5>
                    <div class="col-12 d-flex justify-content-end">
                      <a href="pengaturan-admin" class="btn btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    </div>
                    <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
                    <?php if($_GET['notif']=="kosong"){?>
                        <div class="alert alert-danger mt-5">Maaf data <?php echo $_GET['jenis'];?> wajib di isi</div>
                    <?php }?>
                    <?php }?>
                  </div>
                  
                  <div class="card-content">
                    <form class="form form-vertical" action="konfirmasi-tambah-admin" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group row">
                          <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="nama" id="nama" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="username" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="username" id="username" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-7">
                              <input type="email" class="form-control" name="email" id="email" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-7">
                              <input type="password" class="form-control" name="password" id="password" value="">
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
