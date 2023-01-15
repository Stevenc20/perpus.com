<?php
define("db","perpus");
define("user","root");
define("pass","");
define("host","localhost");
define("port","3306");

$db_li=new mysqli(host,user,pass,db,port);
if (!$db_li) {
  echo "Koneksi 1 Gagal Periksa konfigurasi koneksi: " . $db_li->connect_error();
}
//$db_ol=mysql_connect(host.":".port,user,pass,db);
//if (mysql_errno()) {
//  echo "Koneksi Gagal! Reload halaman beberapa saat lagi!";
//}
?>