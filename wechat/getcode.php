<?php  
include("../sqlconnect.php");
include("wechatfunction.php");
  header("Content-type: text/html;charset=utf-8");
  session_start();
      $id=$_SESSION['userID'];
      $name=$_SESSION['name'];
      $department=$_SESSION['department'];
      $position=$_SESSION['position'];
      $LV=$_SESSION['LV'];
     
    


getcode("http://www.daweijia.cn/daweijia/demo/wechat/getopenid.php",$id);


?>