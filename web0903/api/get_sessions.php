<?php include_once "db.php";

$movie=$_Movie->find($_GET['movie']);
$data=$_GET['date'];


$sess=[
'1'=>"14:00~16:00",
'2'=>"16:00~18:00",
'3'=>"18:00~20:00",
'4'=>"20:00~22:00",
'5'=>"22:00~24:00"
];

$now=date("G")-13;
// 定義 "場次G"
$start=ceil($now/2)+1;
$seats=20;

for($i=$start;$i<=5;$i++){

    echo "<option value='{$sess[$i]'>";
    echo "{$sess[$i]} 剩餘座位 $seats";
    echo "</option>>";
}