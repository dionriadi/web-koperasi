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
                <h3>Pembayaran Simpanan Koperasi</h3>
                
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pembayaran Simpanan</li>
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
                    <h5 class="card-title" style="color: white; background-color: rgb(93, 93, 146); padding: 20px; border-radius: 10px;">Form Pembayaran</h5>

                    <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
                    <?php if($_GET['notif']=="kosong"){?>
                        <div class="alert alert-danger mt-5 "><i class="bi bi-file-excel"></i>Maaf data <?php echo $_GET['jenis'];?> wajib di isi</div>
                    <?php }else if($_GET['notif']=="berhasil"){?>
                        <div class="alert alert-success mt-5">Berhasil Menyimpan </div>
                    <?php }?>
                    <?php }?>
                  </div>
                  
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form form-vertical" action="konfirmasi-nabung" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-12">
                        <div class="form-group row">
                            <label for="jenis" class="col-sm-3 col-form-label">Jenis Simpanan</label>
                            <div class="col-sm-7">
                            <select class="form-control" id="jenis" name = "jenis">
                                <option value="">--Pilih Jenis Simpanan--</option>
                                <?php 
                                $tabungan = mysqli_query($koneksi, "select * from jenis_simpanan");
                                while($row=mysqli_fetch_array($tabungan)){?>
                                <option value="<?php echo $row['id_jenis_simpanan']; ?>"><?php echo $row['jenis_simpanan']; ?></option>
                                <?php }?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="nominal" class="col-sm-3 col-form-label">Nominal</label>
                            <div class="col-sm-7">
                              <input type="number" class="form-control" name="nominal" id="nominal" placeholder="Masukkan minimal 50.000"" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="metode" class="col-sm-3 col-form-label">Metode Pembayaran</label>
                            <div class="col-sm-7">
                            <select class="form-control" id="metode" name = "metode">
                                <option value="">--Pilih Metode Pembayaran--</option>
                                <?php 
                                $metode = mysqli_query($koneksi, "select * from metode_pembayaran");
                                while($row=mysqli_fetch_array($metode)){?>
                                <option value="<?php echo $row['id_metode']; ?>"><?php echo $row['metode_pembayaran']; ?></option>
                                <?php }?>
                            </select>
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
