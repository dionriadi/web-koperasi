<?php 
if(isset($_GET['data'])){
$id_userlogin= $_SESSION['id_user'];
if((isset($_GET['aksi']))&&(isset($_GET['data']))){
	if($_GET['aksi']=='hapus'){
		$id_user = $_GET['data'];

    $sql_f = "SELECT `foto` FROM anggota WHERE `id_anggota`='$id_user'";
    $query_f = mysqli_query($koneksi,$sql_f);
    while($data_f = mysqli_fetch_row($query_f)){
        $foto = $data_f[0];
        unlink("foto/$foto"); 
    }
    
		$sql_dh = "delete from `anggota` where `id_anggota` = '$id_user'";
		mysqli_query($koneksi,$sql_dh);
	}
}}
?>
<div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Anggota</h3>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Daftar Anggota</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
          <section class="section">
            <div class="card">
              <div class="card-body">
                <table class="table table-bordered mt-4" id="table1">
                <?php if(!empty($_GET['notif'])){
                    if($_GET['notif']=="berhasil"){?>
                        <div class="alert alert-success" role="alert">
                        Data Berhasil Ditambahkan</div>
                    <?php }
                  else if($_GET['notif']=="hapusberhasil"){?>
                  <div class="alert alert-warning" role="alert">
                        Data Berhasil Dihapus</div>
                    <?php }
                  else if($_GET['notif']=="editberhasil"){?>
                    <div class="alert alert-success" role="alert">
                          Data Berhasil Diedit</div>
                      <?php }}?>
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Pekerjaan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                      $posisi=0;
                        $sql_k = "SELECT `id_anggota`,`nama_anggota`, `alamat`, `pekerjaan` FROM `anggota` ORDER BY `id_anggota` ";
                        $query_k = mysqli_query($koneksi,$sql_k);
                        $posisi+1;
                        while($data_k = mysqli_fetch_row($query_k)){
                          $id_user = $data_k[0];
                          $nama = $data_k[1];
                          $alamat = $data_k[2];
                          $pekerjaan = $data_k[3];
                      ?>
                    <tr>
                        <td><?php echo $posisi+1; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $alamat; ?></td>
                        <td><?php echo $pekerjaan; ?></td>
                        <td align="center">
                          <a href="detail-member_<?php echo $id_user;?>" class="btn btn-xs btn-info" title="Detail"><i class="bi bi-eye"></i></a>
                          <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $nama; ?>?'))window.location.href='atur-user_hapus_<?php echo $id_user;?>_hapusberhasil'" class="btn btn-xs btn-warning"><i class="bi bi-trash"></i> Hapus
                      </a>
                        </td>
                      </tr>
                      <?php $posisi++; }?>
                  </tbody>
                </table>
                
              </div>
            </div>
          </section>
        </div>

