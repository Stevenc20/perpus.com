<?php
include("models/proses_transaksi.php");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Transaksi Pengembalian</h1><br>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
              <li class="breadcrumb-item active">Pengembalian</li>
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
            <table class="table table-bordered table-striped align-items-center table-flush table-hover display nowrap" style="width:100%" id="tab_basic">
            
                 <thead>		
                    <tr align="center">
                        <td>NO</td>
                        <td>KODE</td>
                        <td>JUDUL</td>
                        <td>PENGARANG</td> 
                        <td>NAMA PEMINJAM</td>
                        <td>TANGGAL PINJAM</td>
                        <td>LAMA PINJAM</td>
                        <td>AKSI</td>
                                    
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=0;
                                
                    //mengambil data siswa
                    $hasil=select("t_peminjaman 
                    JOIN t_buku ON t_peminjaman.id_buku = t_buku.id_buku 
                    JOIN t_siswa ON t_peminjaman.id_user = t_siswa.id_siswa
                    where t_peminjaman.status=1 order by t_peminjaman.tgl_pinjam desc");
                    while($data=mysqli_fetch_array($hasil))
                    {
                        $no++;
                        $idp = $data['id_pinjam'];
                        $tgl = new DateTime(date('Y-m-d')); //tanggal sekarang
                        $tgl_pinjam = new DateTime($data['tgl_pinjam']); //tanggal peminjaman
                        $selisih = $tgl->diff($tgl_pinjam);
                        
                    ?>
                    <tr align="center">
                        <td><?=$no;?></td>
                        <td><?=$data['kode'];?></td>
                        <td><?=strtoupper($data['judul']);?></td>
                        <td><?=$data['pengarang'];?></td>
                        <td><?=$data['nama'];?></td>
                        <td><?=$data['tgl_pinjam'];?></td>
                        <td><?=$selisih->days;?> hari</td>
                        <td align="left">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#galleryModal<?=$idp;?>">
                                        <i class="fa fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#pinjam<?=$idp;?>">
                                        <i class="fa fa-share"></i>
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
                                        <div class="modal fade" id="pinjam<?=$idp;?>">
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
                                                        <input type="text" name="kode" value="<?=$data['kode'];?>" class="form-control" readonly>
                                                        <br>
                                                        <label>Judul Buku</label>
                                                        <input type="text" name="judul" value="<?=$data['judul'];?>" class="form-control" readonly>
                                                        <br>
                                                        <label>Nama Siswa</label>
                                                        <select name="id_siswa" class="form-control" >
                                                            <option>Pilih</option>
                                                            <?php
                                                            //ambil kelas
                                                            $hasil_siswa=select("t_siswa order by nama asc");
                                                            while($data_siswa=mysqli_fetch_array($hasil_siswa))
                                                            {
                                                            ?>
                                                            <option value="<?=$data_siswa['id_siswa'];?>"><?=$data_siswa['nama'];?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <br>
                                                        <label>Catatan Pinjam</label>
                                                        <input type="text" name="catatan" class="form-control">
                                                        <br>

                                                        <input type="hidden" name="idp" value="<?=$idp;?>">
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
         </div>
      

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

