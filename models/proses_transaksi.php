<?php
//menambah data peminjaman buku dari admin
if(isset($_POST['pinjam'])){
	$id_buku = $_POST['idp'];
	$id_user = $_POST['id_siswa'];
	$tgl=date('Y-m-d');
	

	$data = array(
		"id_buku"=>$_POST['idp'],
		"id_user"=>$_POST['id_siswa'],
		"tgl_pinjam"=>$tgl,
		"catatan_pinjam"=>$_POST['catatan'],
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
					header('location:index.php?page=pinjam');
			}else{
					?>
					<div class="alert alert-warning alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<center><h5><i class="icon fas fa-exclamation-triangle"></i>Proses Entri Data gagal!</h5>
						</center>
					</div>
					<?php
					header('location:index.php?page=pinjam');
			}
	}	
}	



?>