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
                <h3>Pengambilan Pinjaman</h3>
                
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
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
                    <h5 class="card-title" style="color: white; background-color: rgb(93, 93, 146); padding: 20px; border-radius: 10px;">Form Pengambilan Pinjaman</h5>

                    <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
                    <?php if($_GET['notif']=="kosong"){?>
                        <div class="alert alert-danger mt-5">Maaf data <?php echo $_GET['jenis'];?> wajib di isi</div>
                    <?php }?>
                    <?php }?>
                  </div>
                  
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form form-vertical" action="konfirmasi-pinjam" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-12">
                        <div class="form-group row">
                          <label for="nominal" class="col-sm-3 col-form-label">Nominal</label>
                            <div class="col-sm-7">
                              <input type="number" class="form-control" name="nominal" id="nominal" placeholder="Minimal Peminjaman 50.000"" >
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="nominal" class="col-sm-3 col-form-label">Tanggal Pelunasan</label>
                            <div class="col-sm-7">
                              <input type="date" class="form-control" name="tgl" id="username" >
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="foto" class="col-sm-3 col-form-label">Foto Bukti Persyaratan </label>
                          <div class="col-sm-7">
                            <div class="custom-file">
                              <input type="file" class="basic-filepond" name="foto" id="customFile" required >
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
