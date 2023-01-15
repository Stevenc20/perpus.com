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
            <h1 class="m-0">Data Buku</h1><br>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i>
            </button>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item active">Data Buku</li>
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
                    <th>NO</th>
                    <th>KODE</th>
                    <th>JUDUL</th>
                    <th>PENGARANG</th> 
                    <th>PENERBIT</th>      
                    <th>NOMOR ISBN</th> 
                    <th>JUMLAH</th>
                    <th>TGL ENTRI</th>
                    <th>AKSI</th>
                                    
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=0;
                                
                    //mengambil data buku
                    $hasil=select("t_buku order by tgl_entri asc");
                    while($data=mysqli_fetch_array($hasil))
                    {
                        $no++;
                        $idp=$data['id_buku'];              
                    ?>
                    <tr align="center">
                        <td><?=$no;?></td>
                        <td><?=$data['kode'];?></td>
                        <td><?=strtoupper($data['judul']);?></td>
                        <td><?=$data['pengarang'];?></td>
                        <td><?=$data['penerbit'];?></td>
                        <td><?=$data['no_isbn'];?></td>
                        <td><?=$data['jumlah'];?></td>
                        <td><?=formatTanggal($data['tgl_entri']);?></td>
                        <td align="left">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#galleryModal<?=$idp;?>">
                                        <i class="fa fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idp;?>">
                                        <i class="fa fa-pencil-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idp;?>">
                                        <i class="fa fa-trash"></i>
                                        </button>


                                        <div class="modal fade" id="galleryModal<?=$idp;?>" tabindex="-1" role="dialog"
                                        aria-labelledby="galleryModalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="galleryModalTitle">Detail Gallery</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div id="Gallerycarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                                            <div class="carousel-indicators">
                                                                
                                                            </div>
                                                            <div class="carousel-inner">
                                                                
                                                                <div class="carousel-item active  ">
                                                                    <img class="d-block w-100" src="picture/<?=$data['sampul'];?>">
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                            <a class="carousel-control-prev" href="#Gallerycarousel" role="button" type="button" data-bs-slide="prev">
                                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            </a>
                                                            <a class="carousel-control-next" href="#Gallerycarousel" role="button" data-bs-slide="next">
                                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- edit Data The Modal -->
                                        <div class="modal fade" id="edit<?=$idp;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                            
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data Buku</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                
                                                <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                        <label>Kode</label>
                                                        <input type="text" name="kode" value="<?=$data['kode'];?>" class="form-control" required>
                                                        <br>
                                                        <label>Judul Buku</label>
                                                        <input type="text" name="judul" value="<?=$data['judul'];?>" class="form-control" required>
                                                        <br>
                                                        <label>Pengarang</label>
                                                        <input type="text" name="pengarang" value="<?=$data['pengarang'];?>" class="form-control" required>
                                                        <br>
                                                        <label>Penerbit</label>
                                                        <input type="text" name="penerbit" value="<?=$data['penerbit'];?>" class="form-control" required>
                                                        <br>
                                                        <label>No. ISBN</label>
                                                        <input type="text" name="no_isbn" value="<?=$data['no_isbn'];?>" class="form-control" required>
                                                        <br>
                                                        <label>Jumlah</label>
                                                        <input type="number" name="jumlah" value="<?=$data['jumlah'];?>" class="form-control" required>
                                                        <br>
                                                        <label>Tanggal Entri</label>
                                                        <input type="date" name="tgl_entri" value="<?=$data['tgl_entri'];?>" class="form-control" required>
                                                        <br>
                                                                              
                                                        <input type="hidden" name="idp" value="<?=$idp;?>">
                                                        <button type="submit" class="btn btn-primary"  name="editbuku">Simpan</button>
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
                                              <h4 class="modal-title">Hapus Data Buku</h4>
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <form method="post">
                                            <div class="modal-body">
                                              Apakah anda yakin ingin menghapus Buku Dengan kode <?=$data['kode'];?>?
                                              <input type="hidden" name="idp" value="<?=$idp;?>">
                                              <br>
                                              <br>
                                              <button type="submit" class="btn btn-danger"  name="hapusbuku">Hapus</button>
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
    <h4 class="modal-title">Tambah Data Buku</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <form method="post" enctype="multipart/form-data">
    <div class="modal-body">
  
    <input type="text" name="kode" placeholder="Kode" class="form-control" required>
    <br>
    <input type="text" name="judul" placeholder="Judul Buku" class="form-control" required>
    <br>
    <input type="text" name="pengarang" placeholder="Pengarang" class="form-control" required>
    <br>
    <input type="text" name="penerbit" placeholder="Penerbit" class="form-control" required>
    <br>
    <input type="text" name="no_isbn" placeholder="Nomor ISBN" class="form-control" required>
    <br>
    <input type="number" name="jumlah" placeholder="Jumlah Buku" class="form-control" required>
    <br>
    <label>Upload Foto Sampul</label>
    <input type="file" class="form-control" name="file" id="file" required>
    <br>
    <button type="submit" class="btn btn-primary"  name="tambahbuku">Simpan</button>
    </div>
    </form>
</div>
</div>
</div>
