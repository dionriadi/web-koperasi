<?php 

$id_userlogin= $_SESSION['id_user'];
if((isset($_GET['aksi']))&&(isset($_GET['data']))){
	if($_GET['aksi']=='hapus'){
		$id_user = $_GET['data'];

    $sql_f = "SELECT `foto` FROM admin WHERE `id_admin`='$id_user'";
    $query_f = mysqli_query($koneksi,$sql_f);
    while($data_f = mysqli_fetch_row($query_f)){
        $foto = $data_f[0];
        unlink("foto/$foto"); 
    }
    
		$sql_dh = "delete from `admin` where `id_admin` = '$id_user'";
		mysqli_query($koneksi,$sql_dh);
	}
}
?>
<div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pengumuman</h3>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pengumuman</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
          <section class="section">
            <div class="card">
              <div class="card-body">
              <div class="col-12 d-flex justify-content-end">
                <a href="tambah-info" class="btn btn-primary me-1 mb-1">Tambah Pengumuman</a>
              </div>
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
                      <th>Judul</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                      $posisi=0;
                        $sql_k = "SELECT `id_pengumuman`,`judul`, `tanggal` FROM `pengumuman` ORDER BY `id_pengumuman` ";
                        $query_k = mysqli_query($koneksi,$sql_k);
                        $posisi+1;
                        while($data_k = mysqli_fetch_row($query_k)){
                          $id_pengumuman = $data_k[0];
                          $judul = $data_k[1];
                          $tanggal = $data_k[2];
                      ?>
                    <tr>
                        <td><?php echo $posisi+1; ?></td>
                        <td><?php echo $judul; ?></td>
                        <td><?php echo $tanggal; ?></td>
                        
                        <td align="center">
                          <a href="edit-pengumuman_<?php echo $id_pengumuman;?>" class="btn btn-xs btn-info" title="Edit"><i class="bi bi-pencil-square"></i></a>
                          <a href="detail-pengumuman_<?php echo $id_pengumuman;?>" class="btn btn-xs btn-info" title="Detail"><i class="bi bi-eye"></i></a>
                          <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $judul; ?>?'))window.location.href='pengumuman_hapus_<?php echo $id_pengumuman;?>_hapusberhasil'" class="btn btn-xs btn-warning"><i class="bi bi-trash"></i> Hapus
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

