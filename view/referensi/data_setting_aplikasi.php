<?php
include("models/proses_referensi.php");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Setting Aplikasi</h1><br>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Referensi</a></li>
              <li class="breadcrumb-item active">Setting Aplikasi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="table table-responsive"> 
            <table align="center" width="100%" cellspacing="0" class="table table-bordered table-striped table-hover">
                 <thead>		
                    <tr align="center">
                        <td>NO</td>
                        <td>NAMA APLIKASI</td>
                        <td>FOOTER</td>
                        <td>FOTO APLIKASI</td>        
                        <td>AKSI</td>
                                    
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=0;
                                
                    //mengambil data user
                    $hasil=select("t_setting_aplikasi");
                    while($data=mysqli_fetch_array($hasil))
                    {
                        $no++;
                        $idp=$data['id_setting'];           
              
                    ?>
                    <tr align="center">
                        <td><?=$no;?></td>
                        <td><?=$data['nm_aplikasi'];?></td>
                        <td><?=$data['nm_footer'];?></td>
                        <td><img src="picture/<?=$data['foto_aplikasi'];?>" height="100" width="100" class="img-circle elevation-2" alt="User Image"></td>
                        <td align="left">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idp;?>">
                                        <i class="fa fa-pencil-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editfoto<?=$idp;?>">
                                        <i class="fa fa-camera"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idp;?>">
                                        <i class="fa fa-trash"></i>
                                        </button>

                                        <!-- edit Data The Modal -->
                                        <div class="modal fade" id="edit<?=$idp;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                                                    
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data Setting Aplikasi</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                                                        
                                                <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">
                                                            <label>Nama Aplikasi</label>
                                                            <input type="text" name="nm_aplikasi" value="<?=$data['nm_aplikasi'];?>" class="form-control" required>
                                                            <br>
                                                            <label>Footer</label>
                                                            <input type="text" name="nm_footer" value="<?=$data['nm_footer'];?>" class="form-control" required>
                                                            <br>
                                                                                   
                                                            <input type="hidden" name="idp" value="<?=$idp;?>">
                                                            <button type="submit" class="btn btn-primary"  name="editsetting">Simpan</button>
                                                        </div>
                                                    </form>
                                                                                    
                                                </div>
                                            </div>
                                        </div>

                                         <!-- edit Data The Modal -->
                                         <div class="modal fade" id="editfoto<?=$idp;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                                                    
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Edit Foto Aplikasi</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                                                        
                                                <!-- Modal body -->
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <label>Pilih Foto</label>
                                                            <input type="file" class="form-control" name="file" id="file" required>
                                                            <br>
                                                                            
                                                            <input type="hidden" name="idp" value="<?=$idp;?>">
                                                            <button type="submit" class="btn btn-primary"  name="editfotosetting">Simpan</button>
                                                        </div>
                                                    </form>
                                                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <!-- delete The Modal -->
                                        <div class="modal fade" id="delete<?=$idp;?>">
                                        <div class="modal-dialog">
                                              <div class="modal-content">
                                          
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                              <h4 class="modal-title">Hapus Data Setting Aplikasi</h4>
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <form method="post">
                                            <div class="modal-body">
                                              Apakah anda yakin ingin menghapus Data Aplikasi <?=$data['nm_aplikasi'];?>?
                                              <input type="hidden" name="idp" value="<?=$idp;?>">
                                              <br>
                                              <br>
                                              <button type="submit" class="btn btn-danger"  name="hapussetting">Hapus</button>
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
         </div>
      

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  