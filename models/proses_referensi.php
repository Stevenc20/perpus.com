<?php

//menambah user
if(isset($_POST['tambahuser'])){
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$pass = password_hash($_POST['password'],PASSWORD_DEFAULT);
	$status = $_POST['akses'];
	$file = $_POST['file'];

	$tempdir = "picture/";
    //gambar akan di simpan di folder gambar
    $target_path = $tempdir . basename($_FILES['file']['name']);

    //nama gambar
    $nama_file=$_FILES['file']['name'];
    
    move_uploaded_file($_FILES['file']['tmp_name'], $target_path);  

//cek data
$sql="SELECT * FROM t_user where user_name='$email'";
$hasil=mysqli_query($db_li,$sql);
$jumlah=mysqli_num_rows($hasil);
	if($jumlah==0)
	{
		$addtotable = mysqli_query($db_li, "insert into t_user(user_name,password,nama,level,foto) values('$email','$pass','$nama','$status','$nama_file')");
		if($addtotable){
			?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-check"></i>Entri Data sukses di kirim!</h5></center>
						
				</div>
	
					<?php
					header('location:index.php?page=user');
			}else{
					?>
					<div class="alert alert-warning alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Entri Data gagal!</h5>
						</center>
					</div>
					<?php
					header('location:index.php?page=user');
			}
	}	
}	

//update Data user
if(isset($_POST['edituserdata'])){
	$idp = $_POST['idp'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	
	
	
	$query = mysqli_query($db_li,"update t_user set nama='$nama', user_name='$email' where id_user='$idp'");
	if($query){
		?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<center><h5><i class="icon fas fa-check"></i>Update data sukses di kirim!</h5></center>
					
			</div>

				<?php
				header('location:index.php?page=user');
		}else{
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Update data gagal!</h5>
					</center>
				</div>
				<?php
				header('location:index.php?page=user');
		}
}

//update Password user
if(isset($_POST['edituserpass'])){
	$idp = $_POST['idp'];
	$pass = password_hash($_POST['password'],PASSWORD_DEFAULT);

	$query = mysqli_query($db_li,"update t_user set password='$pass' where id_user='$idp'");
	if($query){
		?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<center><h5><i class="icon fas fa-check"></i>Update Password sukses di kirim!</h5></center>
					
			</div>

				<?php
				header('location:index.php?page=user');
		}else{
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Update Password gagal!</h5>
					</center>
				</div>
				<?php
				header('location:index.php?page=user');
		}
}

//menghapus data user
if(isset($_POST['hapususer'])){
	$idp = $_POST['idp'];
	
	$hapus = mysqli_query($db_li, "delete from t_user where id_user='$idp'");
	if($hapus){
		?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<center><h5><i class="icon fas fa-check"></i>Hapus Data sukses!</h5></center>
					
			</div>

				<?php
				header('location:index.php?page=user');
		}else{
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Hapus Data gagal!</h5>
					</center>
				</div>
				<?php
				header('location:index.php?page=user');
		}
}


//update Data setting
if(isset($_POST['editsetting'])){
	$idp = $_POST['idp'];
	$nm_aplikasi = $_POST['nm_aplikasi'];
	$nm_footer = $_POST['nm_footer'];
	
	
	$query = mysqli_query($db_li,"update t_setting_aplikasi set nm_aplikasi='$nm_aplikasi', nm_footer='$nm_footer' where id_setting='$idp'");
	if($query){
		?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<center><h5><i class="icon fas fa-check"></i>Update Data sukses di kirim!</h5></center>
					
			</div>

				<?php
				header('location:index.php?page=user');
		}else{
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Update gagal!</h5>
					</center>
				</div>
				<?php
				header('location:index.php?page=user');
		}
}


//menghapus data setting
if(isset($_POST['hapussetting'])){
	$idp = $_POST['idp'];
	
	$hapus = mysqli_query($db_li, "delete from t_setting_aplikasi where id_setting='$idp'");
	if($hapus){
		?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<center><h5><i class="icon fas fa-check"></i>Hapus Data sukses!</h5></center>
					
			</div>

				<?php
				header('location:index.php?page=user');
		}else{
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Hapus Data gagal!</h5>
					</center>
				</div>
				<?php
				header('location:index.php?page=user');
		}
}

//update Data tahun
if(isset($_POST['editfotosetting'])){
	$idp = $_POST['idp'];
	$file = $_POST['file'];

	$tempdir = "picture/";
    //gambar akan di simpan di folder gambar
    $target_path = $tempdir . basename($_FILES['file']['name']);

    //nama gambar
    $nama_file=$_FILES['file']['name'];
    
    move_uploaded_file($_FILES['file']['tmp_name'], $target_path); 

	$data = array(
		"foto_aplikasi"=>$nama_file
		
	);
	
	$query = update("t_setting_aplikasi",$data,array("id_setting" =>$idp));
	if($query){
		?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<center><h5><i class="icon fas fa-check"></i>Update Data sukses di kirim!</h5></center>
					
			</div>

				<?php
				header('location:index.php?page=settingaplikasi');
		}else{
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Update Data gagal!</h5>
					</center>
				</div>
				<?php
				header('location:index.php?page=settingaplikasi');
		}
}

//menambah data kelas
if(isset($_POST['tambahkelas'])){
	$nama = $_POST['nama'];
	$data = array(
		"tingkat_kelas"=>$_POST['tingkat_kelas'],
		"nm_kelas"=>$_POST['nama']
	);

//cek data
$hasil=selectwhere("r_kelas","nm_kelas",$nama);
$jumlah=mysqli_num_rows($hasil);
	if($jumlah==0)
	{
		$addtotable = create("r_kelas",$data);
		if($addtotable){
			?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-check"></i>Entri Data sukses di kirim!</h5></center>
						
				</div>
	
					<?php
					header('location:index.php?page=kelas');
			}else{
					?>
					<div class="alert alert-warning alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Entri Data gagal!</h5>
						</center>
					</div>
					<?php
					header('location:index.php?page=kelas');
			}
	}	
}	

//update Data kelas
if(isset($_POST['editkelas'])){
	$idp = $_POST['idp'];
	$data = array(
		"tingkat_kelas"=>$_POST['tingkat_kelas'],
		"nm_kelas"=>$_POST['nama']
	);
	
	$query = update("r_kelas",$data,array("id_kelas" =>$idp));
	if($query){
		?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<center><h5><i class="icon fas fa-check"></i>Update Data sukses di kirim!</h5></center>
					
			</div>

				<?php
				header('location:index.php?page=kelas');
		}else{
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Update Data gagal!</h5>
					</center>
				</div>
				<?php
				header('location:index.php?page=kelas');
		}
}


//menghapus data kelas
if(isset($_POST['hapuskelas'])){
	$idp = $_POST['idp'];
	
	$hapus = delete("r_kelas","id_kelas",$idp);
	if($hapus){
		?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<center><h5><i class="icon fas fa-check"></i>Hapus Data sukses!</h5></center>
					
			</div>

				<?php
				header('location:index.php?page=kelas');
		}else{
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Hapus Data gagal!</h5>
					</center>
				</div>
				<?php
				header('location:index.php?page=kelas');
		}
}
?>