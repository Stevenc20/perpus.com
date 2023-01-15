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
            <h1 class="m-0">Data Kelas</h1><br>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i>
            </button>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Referensi</a></li>
              <li class="breadcrumb-item active">Kelas</li>
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
                        <td>TINGKAT KELAS</td>
                        <td>NAMA KELAS</td>     
                        <td>AKSI</td>
                                    
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=0;
                                
                    //mengambil data user
                    $hasil=select("r_kelas order by nm_kelas asc");
                    while($data=mysqli_fetch_array($hasil))
                    {
                        $no++;
                        $idp=$data['id_kelas'];              
                    ?>
                    <tr align="center">
                        <td><?=$no;?></td>
                        <td><?=$data['tingkat_kelas'];?></td>
                        <td><?=strtoupper($data['nm_kelas']);?></td>
                        <td align="left">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idp;?>">
                                        <i class="fa fa-pencil-alt"></i>
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
                                                    <h4 class="modal-title">Edit Data Kelas</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                                                        
                                                <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">
                                                            <label>Tingkat Kelas</label>
                                                            <select name="tingkat_kelas" class="form-control" >
                                                              <option value="10" <?php if($data['tingkat_kelas']==10){?>selected=""<?php } ?>>X</option>
                                                              <option value="11" <?php if($data['tingkat_kelas']==11){?>selected=""<?php } ?>>XI</option>
                                                              <option value="12" <?php if($data['tingkat_kelas']==12){?>selected=""<?php } ?>>XII</option>
                                                          </select>
                                                            <br>
                                                            <label>Nama Kelas</label>
                                                            <input type="text" name="nama" value="<?=$data['nm_kelas'];?>" class="form-control" required>
                                                            <br>
                                                            
                                                                                   
                                                            <input type="hidden" name="idp" value="<?=$idp;?>">
                                                            <button type="submit" class="btn btn-primary"  name="editkelas">Simpan</button>
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
                                              <h4 class="modal-title">Hapus Data Kelas</h4>
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <form method="post">
                                            <div class="modal-body">
                                              Apakah anda yakin ingin menghapus Kelas <?=$data['nm_kelas'];?>?
                                              <input type="hidden" name="idp" value="<?=$idp;?>">
                                              <br>
                                              <br>
                                              <button type="submit" class="btn btn-danger"  name="hapuskelas">Hapus</button>
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
    <h4 class="modal-title">Tambah Data Kelas</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <form method="post">
    <div class="modal-body">
    <label>TIngkat Kelas</label>
    <select name="tingkat_kelas" class="form-control" >
        <option>Pilih</option>
        <option value="10">X</option>
        <option value="11">XI</option>
        <option value="12">XII</option>
    </select>
    <br>
    <input type="text" name="nama" placeholder="Nama Kelas" class="form-control" required>
    <br>
    
    <button type="submit" class="btn btn-primary"  name="tambahkelas">Simpan</button>
    </div>
    </form>
</div>
</div>
</div>
