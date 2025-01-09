<?php include_once "db.php";

$table=$_POST['table'];

$row1=$$table->find($_POST['id']);
$row2=$$table->find($_POST['sw']);

$tmp=$row1['rank'];
$row1['rank']=$row2['rank'];
$row2['rank']=$tmp;
// 兩個變數的值進行交換 -> "往上/往下" 功能


$$table->save($row1);
$$table->save($row2);