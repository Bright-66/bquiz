<?php
if(isset($_SESSION['login'])){
    to("admin.php");
    exit();
}

if(isset($_POST['acc'])) {
    $row=$Admin->find(['acc'=>$_POST['acc'],'pw'=>$_POST['ps']]);
    // 到資料庫找acc 和pw欄位的資料送到表單的acc 和ps欄位!
    
    if(!empty($row)){
    $_SESSION['login']=1;
    to("admin.php");
}else{
    echo "<script>alert('帳號或密碼錯誤')</script>";
}
}
?>
<!-- // if($_POST['acc']=='admin' && $_POST['ps']=='1234'){
// $_SESSION['login']=1;
// to("admin.php");
// }else{
// echo "<script>
alert('帳號或密碼錯誤')
</script>"; -->
<!-- 此為取巧/趕時間/不嚴謹的 for 乙檢的作法, 因為跳過到資料庫進行 "check" 帳/密的動作! (在index.php 的 "管理登入" 語法將 do=check 改成do=login !-->

<div class="di"
    style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
    </marquee>
    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    <form method="post" action="?do=login">
        <p class="t botli">管理員登入區</p>
        <p class="cent">帳號 ： <input name="acc" autofocus="" type="text"></p>
        <p class="cent">密碼 ： <input name="ps" type="password"></p>
        <p class="cent"><input value="送出" type="submit"><input type="reset" value="清除"></p>
    </form>
</div>