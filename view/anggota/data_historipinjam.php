<?php
include("models/proses_anggota.php");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Histori Pinjam</h1><br>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anggota</a></li>
              <li class="breadcrumb-item active">Histori Pinjam</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Daftar Buku</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <div class="table table-responsive"> 
              <form method="post">
                <table align="center" width="100%" cellspacing="0" class="table table-bordered table-striped table-hover">
                    <thead>		
                    <thead>		
                      <tr align="center">
                        <th>NO</th>
                        <th>JUDUL</th>
                        <th>PENGARANG</th> 
                        <th>PENERBIT</th>      
                        <th>NOMOR ISBN</th> 
                        <th>STATUS PINJAM</th>            
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no=0;
                    //menghitung jumlah buku yang di pinjam
                    $hasil_sis=select("t_siswa where email='$user_tampil'");
                    $jml_sis=mysqli_num_rows($hasil_sis);
                    if ($jml_sis > 0) {
                      $iduser = usertoidsiswa($user_tampil);
                    }else{
                      $iduser = usertoidguru($user_tampil);
                    }
                                
                    //mengambil data peminjaman
                    $hasil=select("t_peminjaman join t_buku ON t_peminjaman.id_buku = t_buku.id_buku where id_user='$iduser' order by tgl_pinjam asc");
                    while($data=mysqli_fetch_array($hasil))
                    {
                        $no++;
                        $idp=$data['id_buku'];    
                                                       
                    ?>
                    <tr align="center">
                        <td><?=$no;?></td>
                        <td><?=strtoupper($data['judul']);?></td>
                        <td><?=$data['pengarang'];?></td>
                        <td><?=$data['penerbit'];?></td>
                        <td><?=$data['no_isbn'];?></td>
                        <td>
                          <?php
                          if ($data['status']==1) {
                          ?>
                          <span class="badge bg-warning">Dipinjam</span>
                          <?php
                          }else{
                          ?>
                          <span class="badge bg-info">Dikembalikan</span>
                          <?php
                          }
                          ?>      
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>  
                </form>                                            
              </div>

              </div>
              <!-- /.card-body -->
            



      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 