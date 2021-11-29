        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Ubah Password</h3>
                
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda">Beranda</a></li>
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
                    <h5 class="card-title" style="color: white; background-color: rgb(93, 93, 146); padding: 20px; border-radius: 10px;">Form Ubah Password</h5>
                    <div class="col-12 d-flex justify-content-end">
                      <a href="profil" class="btn btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    </div>
                    <?php if((!empty($_GET['halaman']))&&(!empty($_GET['notif']))){?>
                    <?php if($_GET['notif']=="passlamakosong"){?>
                        <div class="alert alert-danger mt-5"> Mohon maaf, password lama wajib diisi</div>
                    <?php }?>
                    <?php if($_GET['notif']=="passlamabeda"){?>
                        <div class="alert alert-danger mt-5">Mohon maaf, password lama salah</div>
                    <?php }?>
                    <?php if($_GET['notif']=="passbarukosong"){?>
                        <div class="alert alert-danger mt-5">Mohon maaf, password baru wajib diisi</div>
                    <?php }?>
                    <?php if($_GET['notif']=="passkonfirmkosong"){?>
                        <div class="alert alert-danger mt-5">Mohon maaf, password konfirmasi wajib diisi</div>
                    <?php }?>
                    <?php if($_GET['notif']=="passbarubeda"){?>
                        <div class="alert alert-danger mt-5">Mohon maaf, password konfirmasi salah</div>
                    <?php }?>
                    <?php }?>
                  </div>
                  
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form form-vertical" action="konfirmasi-password" method="post">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                <label for="first-name-vertical">Password Lama</label>
                                <input type="password" id="first-name-vertical" class="form-control" name="pass_lama" />
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label for="first-name-vertical">Password Baru</label>
                                <input type="password" id="first-name-vertical" class="form-control" name="pass_baru"/>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label for="email-id-vertical">Konfirmasi Password</label>
                                <input type="password" id="email-id-vertical" class="form-control" name="pass_konfirm"/>
                              </div>
                            </div>
                          </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                              <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
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
