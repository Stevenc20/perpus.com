<?php
date_default_timezone_set('Asia/Jakarta');
//proses login
if(isset($_POST['login'])){
	$user = addslashes($_POST['email']);
	$pass = addslashes($_POST['password']);
	
        if($user == "" || $pass ==""){
		?>
			<div class="alert alert-danger alert" role="alert">
				<strong>Hallo Pengguna!</strong> Masih ada data kosong.
				</button>
			</div>
		<?php    
        }else
		{
			
			$cek = mysqli_query($db_li,"SELECT * FROM t_user where user_name='$user'");
			$hitung = mysqli_num_rows($cek);
			$data =mysqli_fetch_array($cek);	
			
			$jam_masuk=date('H:i:s');
			$tgl=date("Y-m-d");
    		if($hitung>0){

					if(password_verify($pass,$data['password'])){
						session_start();
						$_SESSION['log'] = 'true';
						$_SESSION['id_user'] = $data['id_user'];
						$_SESSION['user'] = $user;
						$_SESSION['nama_user'] = $data['nama'];
						$_SESSION['level_user'] = $data['level'];
						$_SESSION['foto'] = $data['foto'];

						$addlogin = mysqli_query($db_li, "insert into t_log (username, jam_masuk, status, tanggal) values('$user','$jam_masuk','1','$tgl')");
						header('location:index.php?page=home');
					}else{
						$addlogin = mysqli_query($db_li, "insert into t_log (username, jam_masuk, status, tanggal) values('$user','$jam_masuk','2','$tgl')");
					header('location:login.php');
					}
				
			}
			else
			{
				$addlogin = mysqli_query($db_li, "insert into t_log(username,jam_masuk,status,tanggal) values('$user','$jam_masuk','2','$tgl')");
			?>
			
				<div class="alert alert-warning alert" role="alert">
					<strong>Hallo Pengguna!</strong> Maaf Username tidak terdaftar.
				</div>

			<?php
			}
		}

}



?>