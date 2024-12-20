<?php include_once "api/db.php";?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>卓越科技大學校園資訊系統</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <div id="cover" style="display:none; ">
        <div id="coverr">
            <a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;"
                onclick="cl(&#39;#cover&#39;)">X</a>
            <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
        </div>
    </div>

    <div id="main">
        <a title="<?=$Title->find(['sh'=>1])['text'];?>" href="index.php">
            <!-- 滑鼠移到標題下時的文字顯示功能 -->
            <div class="ti"
                style="background:url('./upload/<?=$Title->find(['sh'=>1])['img'];?>'); background-size:cover;"></div>
            <!--標題-->
        </a>
        <div id="ms">
            <div id="lf" style="float:left;">
                <div id="menuput" class="dbor">
                    <!--主選單放此-->
                    <span class="t botli">主選單區</span>
                    <?PHP 
$mains=$Menu->all(['sh'=>1,'main_id'=>0]);
// id主選單, main_id次選單@資料庫中設定, main_id=0 =>只抓主選單 
foreach($mains as $main){
    echo "<div class='mainmu cent'>";
    echo "<a href='{$main['href']}'>";
    echo $main['text'];
    echo "</a>";

    echo "<div class='mw'>";
    if($Menu->count(['main_id'=>$main['id']])>0){
$subs=$Menu->all(['main_id'=>$main['id']]);
foreach($subs as $sub){
echo "<div class='mainmu2 cent'>";
echo "<a href='{$sub['href']}'>";
    echo $sub['text'];
    echo "</a>";
    echo "</div>";
}
    }       
    echo "</div>";
    echo "</div>";
}
?>
                </div>
                <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                    <span class="t">進站總人數 :
                        <?=$Total->find(1)['total'];?></span>
                </div>
            </div>

            <!-- 先開chrome確認,再進行code切版 -->
            <?php
            // $do=$_GET['do']??'main';
			
           //chrome主頁的url, 在http://localhost/web1001/"?do=輸入檔名(login/main/news...)", 如果此檔名存在,則include 此php檔案; 
		   //若無則include 主頁"main.php" !

			$do=$_GET['do']??'main';
			$file="./front/{$do}.php";
			if(file_exists($file)){
				include $file;
			}else{
				include "./front/main.php";
			}
			//include (file_exists($file))?$file:"./front/main.php";
		?>
            <div class=" di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
                <!--右邊-->
                <?php
                if(!isset($_SESSION['login'])){
?>
                <button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;"
                    onclick="lo(&#39;?do=login&#39;)">管理登入</button>
                <?php 
                    }else{
               ?>
                <button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;"
                    onclick="lo(&#39;admin.php?&#39;)">返回管理</button>
                <?php 
                    }
                ?>
                <div style="width:89%; height:480px;" class="dbor">
                    <span class="t botli">校園映象區</span>
                    <div class='cent' id="up" onclick="pp(1)">
                        <img src="./icon/up.jpg" alt="" srcset="">
                    </div>
                    <div class='cent'>
                        <?php
    $imgs=$Image->all(['sh'=>1]);
    foreach($imgs as $idx => $img){
                        echo "<div class='im' id='ssaa{$idx}'>";
                        echo "<img src='./upload/{$img['img']}'
                            style='width:150px;height:103px;border:3px solid gold'>";
                        echo "</div>";
                    }
                    ?>
                    </div>
                    <div class='cent' id="dn" onclick="pp(2)">
                        <img src="./icon/dn.jpg" alt="">

                    </div>

                    <script>
                    var nowpage = 0,
                        num = <?=$Image->count(['sh'=>1]);?>;

                    function pp(x) {
                        var s, t;
                        if (x == 1 && nowpage - 1 >= 0) {
                            nowpage--;
                        }
                        if (x == 2 && (nowpage + 1) <= num * 1 - 3) {
                            // num:顯示(sh=1)的圖片數
                            nowpage++;
                        }
                        $(".im").hide()
                        // 所有圖片都先隱藏!
                        for (s = 0; s <= 2; s++) {
                            t = s * 1 + nowpage * 1;
                            $("#ssaa" + t).show()
                            // 固定跑3次迴圈(show出"3張"圖片-並藉由if/else決定哪3張show出)
                        }
                    }
                    pp(1)
                    </script>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
        <div
            style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
            <span class="t" style="line-height:123px;"><?=$Bottom->find(1)['bottom'];?></span>
        </div>
    </div>
</body>

</html>