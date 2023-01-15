<?php
include("models/proses_master.php");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Siswa</h1><br>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i>
            </button>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item active">Data Siswa</li>
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
                        <td>NIS</td>
                        <td>NAMA SISWA</td>
                        <td>KELAS</td> 
                        <td>JK</td> 
                        <td>ALAMAT</td>      
                        <td>HP</td> 
                        <td>TGL LAHIR</td>
                        <td>AKSI</td>
                                    
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=0;
                                
                    //mengambil data siswa
                    $hasil=select("t_siswa INNER JOIN r_kelas ON t_siswa.id_kelas = r_kelas.id_kelas order by nama asc");
                    while($data=mysqli_fetch_array($hasil))
                    {
                        $no++;
                        $idp=$data['id_siswa'];              
                    ?>
                    <tr align="center">
                        <td><?=$no;?></td>
                        <td><?=$data['nis'];?></td>
                        <td><?=strtoupper($data['nama']);?></td>
                        <td><?=$data['nm_kelas'];?></td>
                        <td><?=jk($data['jk']);?></td>
                        <td><?=$data['alamat'];?></td>
                        <td><?=$data['hp'];?></td>
                        <td><?=formatTanggal($data['tgl_lahir']);?></td>
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
                                                    <h4 class="modal-title">Edit Data Siswa</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                
                                                <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                        <label>Nis</label>
                                                        <input type="text" name="nis" value="<?=$data['nis'];?>" class="form-control" required>
                                                        <br>
                                                        <label>Nama Siswa</label>
                                                        <input type="text" name="nama" value="<?=$data['nama'];?>" class="form-control" required>
                                                        <br>
                                                        <label>Alamat</label>
                                                        <input type="text" name="alamat" value="<?=$data['alamat'];?>" class="form-control" required>
                                                        <br>
                                                        <label>Jenis Kelamin</label>
                                                          <select name="jk" class="form-control" >
                                                              <option value="1" <?php if($data['jk']==1){?>selected=""<?php } ?>>Laki-laki</option>
                                                              <option value="2" <?php if($data['jk']==2){?>selected=""<?php } ?>>Perempuan</option>
                                                             
                                                          </select>
                                                        <br>
                                                        <label>Kelas</label>
                                                        <select name="id_kelas" class="form-control" >
                                                            <option>Pilih</option>
                                                            <?php
                                                            //ambil kelas
                                                            $hasil_kelas=select("r_kelas order by nm_kelas asc");
                                                            while($data_kelas=mysqli_fetch_array($hasil_kelas))
                                                            {
                                                            ?>
                                                            <option value="<?=$data_kelas['id_kelas'];?>" <?php if($data_kelas['id_kelas']==$data['id_kelas']){ ?> selected="" <?php } ?>><?=$data_kelas['nm_kelas'];?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <br>
                                                        <label>HP</label>
                                                        <input type="text" name="hp" value="<?=$data['hp'];?>" class="form-control" required>
                                                        <br>
                                                        <label>Tanggal Lahir</label>
                                                        <input type="date" name="tgl_lahir" value="<?=$data['tgl_lahir'];?>" class="form-control" required>
                                                        <br>
                                                                              
                                                        <input type="hidden" name="idp" value="<?=$idp;?>">
                                                        <button type="submit" class="btn btn-primary"  name="editsiswa">Simpan</button>
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
                                              <h4 class="modal-title">Hapus Data Siswa</h4>
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <form method="post">
                                            <div class="modal-body">
                                              Apakah anda yakin ingin menghapus Siswa <?=$data['nama'];?>?
                                              <input type="hidden" name="idp" value="<?=$idp;?>">
                                              <br>
                                              <br>
                                              <button type="submit" class="btn btn-danger"  name="hapussiswa">Hapus</button>
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
    <h4 class="modal-title">Tambah Data Siswa</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <form method="post">
    <div class="modal-body">
  
    <input type="text" name="nis" placeholder="Nis" class="form-control" required>
    <br>
    <input type="text" name="nama" placeholder="Nama Siswa" class="form-control" required>
    <br>
    <input type="text" name="alamat" placeholder="Alamat" class="form-control" required>
    <br>
    <label>Jenis Kelamin</label>
    <select name="jk" class="form-control" >
       <option value="1" >Laki-laki</option>
       <option value="2" >Perempuan</option>
    </select>
    <br>
    <label>Kelas</label>
    <select name="id_kelas" class="form-control" >
        <option>Pilih</option>
        <?php
        //ambil kelas
        $hasil_kelas=select("r_kelas order by nm_kelas asc");
        while($data_kelas=mysqli_fetch_array($hasil_kelas))
        {
        ?>
        <option value="<?=$data_kelas['id_kelas'];?>"><?=strtoupper($data_kelas['nm_kelas']);?></option>
        <?php
        }
        ?>
    </select>
    <br>
    <input type="text" name="hp" placeholder="HP" class="form-control" required>
    <br>
    <label>Tanggal Lahir</label>
    <input type="date" name="tgl_lahir" class="form-control" required>
    <br>
    
    <button type="submit" class="btn btn-primary"  name="tambahsiswa">Simpan</button>
    </div>
    </form>
</div>
</div>
</div>
