<?php
include_once "db.php";

// 較完整的寫法
// $acc=$_GET['acc'];
// echo $res=$user->count(['acc'=>$acc]);

echo $User->count($_GET);
// 暴力寫法

/* 
if($res>0){
    echo 1;
}else{
    echo 0;
} */
?>