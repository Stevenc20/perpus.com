<?php
$lev_user=usertolevel($id_user);
//menghitung data indikator
$hasil_indi=mysqli_query($db_li,"SELECT * FROM r_jenis_nilai where id_level='$lev_user'");
$jumlah_indi=mysqli_num_rows($hasil_indi);

//menghitung data yang sudha di nilai
$hasil_sudah_nilai=mysqli_query($db_li,"SELECT * FROM t_nilai where id_penilai='$id_user'");
$jumlah_sudah_nilai=mysqli_num_rows($hasil_sudah_nilai);


?>