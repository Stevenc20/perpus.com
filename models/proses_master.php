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
		"tgl_entri"=>$tgl
	);

//cek data
$hasil=selectwhere("t_siswa","nama",$nama);
$jumlah=mysqli_num_rows($hasil);
	if($jumlah==0)
	{
		$addtotable = create("t_siswa",$data);
		if($addtotable){
			?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-check"></i>Entri Data sukses di kirim!</h5></center>
						
				</div>
	
					<?php
					header('location:index.php?page=siswa');
			}else{
					?>
					<div class="alert alert-warning alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Entri Data gagal!</h5>
						</center>
					</div>
					<?php
					header('location:index.php?page=siswa');
			}
	}	
}	

//update Data siswa
if(isset($_POST['editsiswa'])){
	$idp = $_POST['idp'];
	$data = array(
		"nis"=>$_POST['nis'],
		"nama"=>$_POST['nama'],
		"alamat"=>$_POST['alamat'],
		"jk"=>$_POST['jk'],
		"hp"=>$_POST['hp'],
		"id_kelas"=>$_POST['id_kelas'],
		"tgl_lahir"=>$_POST['tgl_lahir']
	);
	
	$query = update("t_siswa",$data,array("id_siswa" =>$idp));
	if($query){
		?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<center><h5><i class="icon fas fa-check"></i>Update Data sukses di kirim!</h5></center>
					
			</div>

				<?php
				header('location:index.php?page=siswa');
		}else{
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Update Data gagal!</h5>
					</center>
				</div>
				<?php
				header('location:index.php?page=siswa');
		}
}


//menghapus data kelas
if(isset($_POST['hapussiswa'])){
	$idp = $_POST['idp'];
	
	$hapus = delete("t_siswa","id_siswa",$idp);
	if($hapus){
		?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<center><h5><i class="icon fas fa-check"></i>Hapus Data sukses!</h5></center>
					
			</div>

				<?php
				header('location:index.php?page=siswa');
		}else{
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Hapus Data gagal!</h5>
					</center>
				</div>
				<?php
				header('location:index.php?page=siswa');
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
		"tgl_entri"=>$tgl
	);

//cek data
$hasil=selectwhere("t_guru","nama",$nama);
$jumlah=mysqli_num_rows($hasil);
	if($jumlah==0)
	{
		$addtotable = create("t_guru",$data);
		if($addtotable){
			?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-check"></i>Entri Data sukses di kirim!</h5></center>
						
				</div>
	
					<?php
					header('location:index.php?page=guru');
			}else{
					?>
					<div class="alert alert-warning alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Entri Data gagal!</h5>
						</center>
					</div>
					<?php
					header('location:index.php?page=guru');
			}
	}	
}	

//update Data guru
if(isset($_POST['editguru'])){
	$idp = $_POST['idp'];
	$data = array(
		"nip"=>$_POST['nip'],
		"nama"=>$_POST['nama'],
		"alamat"=>$_POST['alamat'],
		"jk"=>$_POST['jk'],
		"hp"=>$_POST['hp'],
		"tgl_lahir"=>$_POST['tgl_lahir']
	);
	
	$query = update("t_guru",$data,array("id_guru" =>$idp));
	if($query){
		?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<center><h5><i class="icon fas fa-check"></i>Update Data sukses di kirim!</h5></center>
					
			</div>

				<?php
				header('location:index.php?page=guru');
		}else{
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Update Data gagal!</h5>
					</center>
				</div>
				<?php
				header('location:index.php?page=guru');
		}
}


//menghapus data guru
if(isset($_POST['hapusguru'])){
	$idp = $_POST['idp'];
	
	$hapus = delete("t_guru","id_guru",$idp);
	if($hapus){
		?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<center><h5><i class="icon fas fa-check"></i>Hapus Data sukses!</h5></center>
					
			</div>

				<?php
				header('location:index.php?page=guru');
		}else{
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Hapus Data gagal!</h5>
					</center>
				</div>
				<?php
				header('location:index.php?page=guru');
		}
}

//menambah data buku
if(isset($_POST['tambahbuku'])){
	$kode = $_POST['kode'];
	$tgl=date('Y-m-d');
	$file = $_POST['file'];
	$tempdir = "picture/";
    //gambar akan di simpan di folder gambar
    $target_path = $tempdir . basename($_FILES['file']['name']);

    //nama gambar
    $nama_file=$_FILES['file']['name'];
    
    move_uploaded_file($_FILES['file']['tmp_name'], $target_path);

	$data = array(
		"kode"=>$_POST['kode'],
		"judul"=>$_POST['judul'],
		"pengarang"=>$_POST['pengarang'],
		"penerbit"=>$_POST['penerbit'],
		"no_isbn"=>$_POST['no_isbn'],
		"jumlah"=>$_POST['jumlah'],
		"tgl_entri"=>$tgl,
		"sampul"=>$nama_file
	);

//cek data
$hasil=selectwhere("t_buku","kode",$kode);
$jumlah=mysqli_num_rows($hasil);
	if($jumlah==0)
	{
		$addtotable = create("t_buku",$data);
		if($addtotable){
			?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-check"></i>Entri Data sukses di kirim!</h5></center>
						
				</div>
	
					<?php
					header('location:index.php?page=buku');
			}else{
					?>
					<div class="alert alert-warning alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Entri Data gagal!</h5>
						</center>
					</div>
					<?php
					header('location:index.php?page=buku');
			}
	}	
}	

//update Data guru
if(isset($_POST['editbuku'])){
	$idp = $_POST['idp'];
	$data = array(
		"kode"=>$_POST['kode'],
		"judul"=>$_POST['judul'],
		"pengarang"=>$_POST['pengarang'],
		"penerbit"=>$_POST['penerbit'],
		"no_isbn"=>$_POST['no_isbn'],
		"jumlah"=>$_POST['jumlah'],
		"tgl_entri"=>$_POST['tgl_entri']
	);
	
	$query = update("t_buku",$data,array("id_buku" =>$idp));
	if($query){
		?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<center><h5><i class="icon fas fa-check"></i>Update Data sukses di kirim!</h5></center>
					
			</div>

				<?php
				header('location:index.php?page=buku');
		}else{
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Update Data gagal!</h5>
					</center>
				</div>
				<?php
				header('location:index.php?page=buku');
		}
}


//menghapus data buku
if(isset($_POST['hapusbuku'])){
	$idp = $_POST['idp'];
	
	$hapus = delete("t_buku","id_buku",$idp);
	if($hapus){
		?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<center><h5><i class="icon fas fa-check"></i>Hapus Data sukses!</h5></center>
					
			</div>

				<?php
				header('location:index.php?page=buku');
		}else{
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Hapus Data gagal!</h5>
					</center>
				</div>
				<?php
				header('location:index.php?page=buku');
		}
}
?>