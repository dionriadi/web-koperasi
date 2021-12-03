<?php 
$id_user = $_GET['data'];
//get profil
$sql = "select `nama_anggota`, `tgl_daftar`,`no_hp`,`alamat`,`pekerjaan`, `foto`, `email`, `username` from `anggota` where `id_anggota`='$id_user'";
$query = mysqli_query($koneksi, $sql);
while($data = mysqli_fetch_row($query)){
	$nama = $data[0];
	$tgl = $data[1]; 
	$hp = $data[2];
  $alamat = $data[3];
  $pekerjaan = $data[4];
  $foto = $data[5];
  $email = $data[6];
  $username = $data[7];
}
?>
      <!-- sidebar -->
      <!-- sidebar -->

      <!-- isi -->
        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Anggota</h3>
                
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="atur-admin">Daftar Anggota</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Anggota</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>

          <!-- bagian isi -->
          <section id="basic-vertical-layouts">
            <div class="col-md-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                    
                    <div class="col-12 d-flex justify-content-end">
                      <a href="atur-user" class="btn btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-content">
                  <div class = "card-body">
                  
                  <table class="table table-bordered">
                    <tbody>  
                      <tr>
                        <td colspan="2"><i class="fas fa-user-circle"></i>  
                         <strong>Detail Anggota<strong></td>
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
                          <td width="80%"><?php echo $username; ?></td>
                      </tr> 
                      <tr>
                          <td width="20%"><strong>No. Telepon<strong></td>
                          <td width="80%"><?php echo $hp; ?></td>
                      </tr>
                      <tr>
                          <td width="20%"><strong>Pekerjaan<strong></td>
                          <td width="80%"><?php echo $pekerjaan; ?></td>
                      </tr>
                      <tr>
                          <td width="20%"><strong>Alamat<strong></td>
                          <td width="80%"><?php echo $alamat; ?></td>
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
        