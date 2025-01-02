<?php
include_once "db.php";

echo $User->count($_GET);
// 暴力寫法

/* 
if($res>0){
    echo 1;
}else{
    echo 0;
} */
?>