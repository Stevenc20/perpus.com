<?php 

$sql = "select * from t_setting_aplikasi LIMIT 1";
$result = $db_li->query($sql);
$data_info = $result->fetch_assoc();
$result->close();
?>