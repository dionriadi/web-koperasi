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
      <!-- sidebar -->
      <!-- sidebar -->

      <!-- isi -->
        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Admin</h3>
                
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="atur-admin">Pengaturan Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Admin</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>

          <!-- bagian isi -->
          <section id="basic-vertical-layouts">
            <div class="col-md-6 col-sm-12">
              <div class="card">
                <div class="card-header">
                <div class="col-12 d-flex justify-content-end">
                      <a href="atur-admin" class="btn btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-content">
                  <div class = "card-body">
                  
                  <table class="table table-bordered">
                    <tbody>  
                      <tr>
                        <td colspan="2"><i class="fas fa-user-circle"></i>  
                         <strong>Detail Admin<strong></td>
                      </tr> 
                      <tr>
                        <td width="20%"><strong>Foto<strong></td>
                        <td width="80%"><img src="foto/<?php echo $foto;?>" class="img-fluid" width="200px;"></td>
                      </tr>                
                      <tr>
                          <td width="20%"><strong>Nama Lengkap<strong></td>
                          <td width="80%"><?php echo $nama; ?></td>
                      </tr>                
                      <tr>
                          <td width="20%"><strong>Email<strong></td>
                          <td width="80%"><?php echo $email;?></td>
                      </tr>
                      <tr>
                          <td width="20%"><strong>Username<strong></td>
                          <td width="80%"><?php echo $nama; ?></td>
                      </tr> 
                      <tr>
                          <td width="20%"><strong>Level<strong></td>
                          <td width="80%"><?php echo $level; ?></td>
                      </tr>
                    </tbody>
                  </table>  
                    </div>
                </div>
              </div>
            </div>
          </section>
        </div>

        <!-- footer -->
        <footer>
          <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
              <p>2021 &copy; Kelompok 3 TIK 3A</p>
            </div>
            <div class="float-end"></div>
          </div>
        </footer>
        <!-- footer -->
      </div>
      <!-- isi -->
    </div>
