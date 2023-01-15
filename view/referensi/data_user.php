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
            <h1 class="m-0">Data User Administrator</h1><br>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i>
            </button>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Referensi</a></li>
              <li class="breadcrumb-item active">User Akun</li>
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
                        <td>NAMA USER</td>
                        <td>USERNAME</td>
                        <td>HAK AKSES</td>        
                        <td>AKSI</td>
                                    
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=0;
                                
                    //mengambil data user
                    $hasil=select("t_user");
                    while($data=mysqli_fetch_array($hasil))
                    {
                        $no++;
                        $idp=$data['id_user'];              
                    ?>
                    <tr align="center">
                        <td><?=$no;?></td>
                        <td><?=strtoupper($data['nama']);?></td>
                        <td><?=$data['user_name'];?></td>
                        <td><?=statuslogin($data['level']);?></td>
                        <td align="left">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idp;?>">
                                        <i class="fa fa-pencil-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editpass<?=$idp;?>">
                                        <i class="fa fa-key"></i>
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
                                                    <h4 class="modal-title">Edit Data User</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                                                        
                                                <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">
                                                            <label>Nama User</label>
                                                            <input type="text" name="nama" value="<?=$data['nama'];?>" class="form-control" required>
                                                            <br>
                                                            <label>Email</label>
                                                            <input type="email" name="email" value="<?=$data['user_name'];?>" class="form-control" required>
                                                            <br>
                                                            
                                                                                   
                                                            <input type="hidden" name="idp" value="<?=$idp;?>">
                                                            <button type="submit" class="btn btn-primary"  name="edituserdata">Simpan</button>
                                                        </div>
                                                    </form>
                                                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <!-- edit Password The Modal -->
                                        <div class="modal fade" id="editpass<?=$idp;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                                                    
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Edit Password</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                                                        
                                                <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">
                                                            <input type="text" name="nama" readonly value="<?=$data['nama'];?>" class="form-control" disable>
                                                            <br>
                                                            <input type="email" name="email" readonly value="<?=$data['user_name'];?>" class="form-control" disable>
                                                            <br>
                                                            <input type="text" name="password" value="" class="form-control" required>
                                                            <br>
                                                                                       
                                                            <input type="hidden" name="idp" value="<?=$idp;?>">
                                                            <button type="submit" class="btn btn-primary"  name="edituserpass">Simpan</button>
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
                                              <h4 class="modal-title">Hapus Data User</h4>
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <form method="post">
                                            <div class="modal-body">
                                              Apakah anda yakin ingin menghapus <?=$data['nama'];?>?
                                              <input type="hidden" name="idp" value="<?=$idp;?>">
                                              <br>
                                              <br>
                                              <button type="submit" class="btn btn-danger"  name="hapususer">Hapus</button>
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

  
<!-- The Modal -->
<div class="modal fade" id="myModal">
<div class="modal-dialog">
<div class="modal-content">

    <!-- Modal Header -->
    <div class="modal-header">
    <h4 class="modal-title">Tambah User</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <form method="post" enctype="multipart/form-data">
    <div class="modal-body">
    <input type="text" name="nama" placeholder="Nama User" class="form-control" required>
    <br>
    <input type="text" name="email" placeholder="Username/E-mail" class="form-control" required>
    <br>
    <input type="text" name="password" placeholder="Password" class="form-control" required>
    <br>
    <select name="akses" class="form-control" >
        <option value="1">Administrator</option>
        <option value="2">Anggota</option>
    </select>
    <br>
   <label>Upload Foto</label>
    <input type="file" class="form-control" name="file" id="file" required>
    <br>
    <button type="submit" class="btn btn-primary"  name="tambahuser">Simpan</button>
    </div>
    </form>
</div>
</div>
</div>
