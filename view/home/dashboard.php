
<?php 
    if($level_user == 1){
        include "view/home/home_administrator.php";
    }else{
        include "view/home/home_user.php";
    }
?>
