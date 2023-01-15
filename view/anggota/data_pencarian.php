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
            <h1 class="m-0">Data Pencarian Buku</h1><br>
           
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anggota</a></li>
              <li class="breadcrumb-item active">Pencarian</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div class="row">
          <div class="col-md-3">

            <!-- About Me Box -->
            <form method="post">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pencarian</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="form-group">
                    <label>Pilih Katagori</label>
                    <select name="katagori" class="form-control" >
                        <option>Pilih</option>
                        <option value="1">Judul</option>
                        <option value="2">Pengarang</option>
                        <option value="3">Penerbit</option>
                    </select>
                    <br>
                    <label>Kata Yang dicari</label>
                    <input type="text" name="kata" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-primary"  name="proses">Proses</button>
              </div>
              </div>
              <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
      

          <div class="col-md-9">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Daftar Buku</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php
              //menmapilkan data siswa berdasarkan kelas
              if(isset($_POST['proses'])){
                $katagori=$_POST['katagori'];
                $kata=$_POST['kata'];
              ?>

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
                        <th>STATUS</th>            
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no=0;
                                
                    //mengambil data buku
                    if($katagori==1){
                      $hasil=select("t_buku where judul like '%$kata%' order by judul asc");
                    }elseif($katagori==2){
                      $hasil=select("t_buku where pengarang like '%$kata%' order by judul asc");
                    }else{
                      $hasil=select("t_buku where penerbit like '%$kata%' order by judul asc");
                    }
                    while($data=mysqli_fetch_array($hasil))
                    {
                        $no++;
                        $idp=$data['id_buku'];   
                        $jumlah=$data['jumlah'];  
                        
                        //menghitung jumlah buku yang di pinjam
                        $hasil_pin=select("t_peminjaman where id_buku='$idp'");
                        $jml_dipinjam=mysqli_num_rows($hasil_pin);

                        //menghitung ketersediaan buku
                        $buku_ready=$jumlah-$jml_dipinjam;
                    ?>
                    <tr align="center">
                        <td><?=$no;?></td>
                        <td><?=strtoupper($data['judul']);?></td>
                        <td><?=$data['pengarang'];?></td>
                        <td><?=$data['penerbit'];?></td>
                        <td><?=$data['no_isbn'];?></td>
                        <td align="left">
                          <?php
                          if ($buku_ready > 0) {
                          ?>
                          <a href="#" data-toggle="modal" data-target="#pinjam<?=$idp;?>"><span class="badge bg-info">Pinjam</span></a>
                          <?php
                          }else{
                          ?>
                          <span class="badge bg-danger">Dipinjam</span>
                          <?php
                          }
                          ?>

                                        <!-- edit Data The Modal -->
                                        <div class="modal fade" id="pinjam<?=$idp;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                            
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Peminjaman Buku</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                
                                                <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                        <label>Peminjam</label>
                                                        <input type="text" value="<?=$nama_user;?>" class="form-control" readonly>
                                                        <br>
                                                        <label>Judul Buku</label>
                                                        <input type="text" value="<?=$data['judul'];?>" class="form-control" readonly>
                                                        <br>
                                                        <label>Pengarang</label>
                                                        <input type="text" value="<?=$data['pengarang'];?>" class="form-control" readonly>
                                                        <br>
                                                        <label>Penerbit</label>
                                                        <input type="text" value="<?=$data['penerbit'];?>" class="form-control" readonly>
                                                        <br>
                                                        <label>Tanggal Di Ambil</label>
                                                        <input type="date" name="tgl_diambil" class="form-control">
                                                        <br>
                                                        
                                                        <input type="hidden" name="idp" value="<?=$idp;?>">
                                                        <?php
                                                        //menghitung jumlah buku yang di pinjam
                                                        $hasil_sis=select("t_siswa where email='$user_tampil'");
                                                        $jml_sis=mysqli_num_rows($hasil_sis);
                                                        if($jml_sis>0)
                                                        {
                                                        ?>
                                                        <input type="hidden" name="id_user" value="<?=usertoidsiswa($user_tampil);?>">
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <input type="hidden" name="id_user" value="<?=usertoidguru($user_tampil);?>">
                                                        <?php
                                                        }
                                                        ?>
                                                        
                                                        <button type="submit" class="btn btn-primary"  name="pinjam">Simpan</button>
                                                    </div>
                                                    </form>
                            
                                                </div>
                                            </div>
                                        </div>

                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>  
                </form>                                            
              </div>

              <?php
              }
              ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 