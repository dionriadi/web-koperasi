<div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Pengumuman</h3>
                
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="info">Pengumuman</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Pengumuman</li>
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
                    <h5 class="card-title" style="color: white; background-color: rgb(93, 93, 146); padding: 20px; border-radius: 10px;">Form Tambah Pengumuman</h5>
                    <div class="col-12 d-flex justify-content-end">
                      <a href="info" class="btn btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    </div>
                    <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
                    <?php if($_GET['notif']=="kosong"){?>
                        <div class="alert alert-danger mt-5">Maaf data <?php echo $_GET['jenis'];?> wajib di isi</div>
                    <?php }?>
                    <?php }?>
                  </div>
                  
                  <div class="card-content">
                    <form class="form form-vertical" action="konfirmasi-tambah-info" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group row">
                          <label for="nama" class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="judul" id="judul" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="penulis" class="col-sm-3 col-form-label">Penulis</label>
                            <div class="col-sm-7">
                            <select class="form-control" id="penulis" name = "penulis">
                                <option value="">--Pilih Penulis--</option>
                                <?php 
                                $kategori = mysqli_query($koneksi, "select * from admin");
                                while($row=mysqli_fetch_array($kategori)){?>
                                <option value="<?php echo $row['id_admin']; ?>"><?php echo $row['nama']; ?></option>
                                <?php }?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="isi" class="col-sm-3 col-form-label">Isi</label>
                            <div class="col-sm-7">
                            <textarea class="form-control" name="isi" id="editor1" rows="12"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="cover" class="col-sm-3 col-form-label">Cover </label>
                          <div class="col-sm-7">
                            <div class="custom-file">
                              <input type="file" class="basic-filepond" name="cover" id="customFile" required>
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
