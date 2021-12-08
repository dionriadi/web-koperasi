<?php

	$id_anggota=$_GET['id_user'];
	$q_tampil_anggota=mysqli_query($koneksi,"select id_anggota,nama,username,pekerjaan, foto from anggota  WHERE id_anggota='$id_anggota'");
	$r_tampil_anggota=mysqli_fetch_array($q_tampil_anggota);
	if(empty($r_tampil_anggota['foto'])or($r_tampil_anggota['foto']=='-'))
		$foto = "admin-no-photo.jpg";
	else
		$foto = $r_tampil_anggota['foto'];
?>
<div id="label-page"><h3>Kartu Anggota</h3></div>
<div id="content">
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">FOTO</td>
			<td class="isian-formulir">
			<img src="../images/<?php echo $foto; ?>" width=70px height=75px>
			</td>
		</tr>
		<tr>
			<td class="label-formulir">ID Anggota</td>
			<td class="isian-formulir"><?php echo $r_tampil_anggota['iduser']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Nama Role</td>
			<td class="isian-formulir"><?php echo $r_tampil_anggota['nama_role']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Nama</td>
			<td class="isian-formulir"><?php echo $r_tampil_anggota['nama']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Username</td>
			<td class="isian-formulir"><?php echo $r_tampil_anggota['username']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Password</td>
			<td class="isian-formulir"><?php echo $r_tampil_anggota['password']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Email</td>
			<td class="isian-formulir"><?php echo $r_tampil_anggota['email']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">No Telp</td>
			<td class="isian-formulir"><?php echo $r_tampil_anggota['tlp']; ?></td>
		</tr>
	</table>
</div>
<script>
		window.print();
	</script>