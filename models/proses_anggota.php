<?php
//menambah data siswa
if(isset($_POST['tambahsiswa'])){
	$nama = $_POST['nama'];
	$tgl=date('Y-m-d');

	$data = array(
		"nis"=>$_POST['nis'],
		"nama"=>$_POST['nama'],
		"alamat"=>$_POST['alamat'],
		"jk"=>$_POST['jk'],
		"hp"=>$_POST['hp'],
		"id_kelas"=>$_POST['id_kelas'],
		"tgl_lahir"=>$_POST['tgl_lahir'],
		"tgl_entri"=>$tgl,
		"email"=>$_POST['email']
	);

	$data_user = array(
		"user_name"=>$_POST['email'],
		"nama"=>$_POST['nama'],
		"level"=>2,
		"password"=>password_hash($_POST['password'],PASSWORD_DEFAULT)
	);

//cek data
$hasil=selectwhereanggota("t_siswa","nama",$nama);
$jumlah=mysqli_num_rows($hasil);
	if($jumlah==0)
	{
		$addtotable = createanggota("t_siswa",$data);
		$addtotable1 = createanggota("t_user",$data_user);
		if($addtotable){
			?>
				<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  Success alert preview. This alert is dismissable.
                </div>
	
					<?php
					header('location:../login.php');
			}else{
					?>
					<div class="alert alert-warning alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Entri Data gagal!</h5>
						</center>
					</div>
					<?php

			}
	}	
}	

//menambah data guru
if(isset($_POST['tambahguru'])){
	$nama = $_POST['nama'];
	$tgl=date('Y-m-d');
	$data = array(
		"nip"=>$_POST['nip'],
		"nama"=>$_POST['nama'],
		"alamat"=>$_POST['alamat'],
		"jk"=>$_POST['jk'],
		"hp"=>$_POST['hp'],
		"tgl_lahir"=>$_POST['tgl_lahir'],
		"tgl_entri"=>$tgl,
		"email"=>$_POST['email']
	);

	$data_user = array(
		"user_name"=>$_POST['email'],
		"nama"=>$_POST['nama'],
		"level"=>2,
		"password"=>password_hash($_POST['password'],PASSWORD_DEFAULT)
	);

//cek data
$hasil=selectwhereanggota("t_guru","nama",$nama);
$jumlah=mysqli_num_rows($hasil);
	if($jumlah==0)
	{
		$addtotable = createanggota("t_guru",$data);
		$addtotable1 = createanggota("t_user",$data_user);
		if($addtotable){
			?>
				<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  Success alert preview. This alert is dismissable.
                </div>
	
					<?php
					header('location:../login.php');
			}else{
					?>
					<div class="alert alert-warning alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Entri Data gagal!</h5>
						</center>
					</div>
					<?php

			}
	}	
}	


//menambah data peminjaman buku dari anggota
if(isset($_POST['pinjam'])){
	$id_buku = $_POST['idp'];
	$id_user = $_POST['id_user'];
	$tgl=date('Y-m-d');
	

	$data = array(
		"id_buku"=>$_POST['idp'],
		"id_user"=>$_POST['id_user'],
		"tgl_pinjam"=>$tgl,
		"tgl_diambil"=>$_POST['tgl_diambil'],
		"status"=>1
	);

//cek data
$hasil=select("t_peminjaman where id_buku='$id_buku' and id_user='$id_user' and tgl_pinjam='$tgl'");
$jumlah=mysqli_num_rows($hasil);
	if($jumlah==0)
	{
		$addtotable = create("t_peminjaman",$data);
		if($addtotable){
			?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-check"></i>Entri Data sukses di kirim!</h5></center>
						
				</div>
	
					<?php
					header('location:index.php?page=cari');
			}else{
					?>
					<div class="alert alert-warning alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Entri Data gagal!</h5>
						</center>
					</div>
					<?php
					header('location:index.php?page=cari');
			}
	}	
}	
?>