<?php 
error_reporting(0);
@session_start();
switch ($_GET['page']) {
    
    //Home
    case "home":
        include 'view/home/dashboard.php';
        break;

    //referensi
    case "user":
        include 'view/referensi/data_user.php';
        break;
    case "settingaplikasi":
        include 'view/referensi/data_setting_aplikasi.php';
        break;
    case "kelas":
        include 'view/referensi/data_kelas.php';
        break;

    //master
    case "siswa":
        include 'view/master/data_siswa.php';
        break;
    case "guru":
        include 'view/master/data_guru.php';
        break;
    case "buku":
        include 'view/master/data_buku.php';
        break;

    //transaksi
    case "pinjam":
        include 'view/transaksi/data_peminjaman.php';
        break;
    case "kembali":
        include 'view/transaksi/data_pengembalian.php';
        break;

    //anggota
    case "cari":
        include 'view/anggota/data_pencarian.php';
        break;
    case "historipinjam":
        include 'view/anggota/data_historipinjam.php';
        break;
    
     case "exit":
        include 'proses/logout.php';
        exit();
        break;
    default:
        
          
        if(!empty($_GET['page'])){
                 echo "<script> $(document).ready(function(){ alertify.error('Halaman Yang anda minta tidak tersedia!'); }); </script>";
                 include_once 'error/404.php';
        }else{
            include_once 'dashboard.php';
        }
        break;
}
?>