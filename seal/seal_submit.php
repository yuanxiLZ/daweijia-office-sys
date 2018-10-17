<?php
	header("Content-type: text/html;charset=utf-8");
  session_start();
      $id=$_SESSION['userID'];
    	$name=$_SESSION['name'];
   		$department=$_SESSION['department'];
    	$position=$_SESSION['position'];
    	$LV=$_SESSION['LV'];

      $accesstoken=$_SESSION['access_token'];
      $openid=$_SESSION['openid'];


?>
<!DOCTYPE html>
<html>
<head>
	  <meta charset="UTF-8">
  
   <title>智慧大魏家</title>
   <link rel="icon" type="image/png" href="../img/logo.png">
  <script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="../assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
<!--   <script src="../js/mobiscroll.custom.min.js" type="text/javascript"></script> -->
  <script src="../bootstrap3/js/bootstrap.js" type="text/javascript"></script>
   <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <!--  Plugins -->
  <!-- <script src="../assets/js/ct-paper-checkbox.js"></script>
  <script src="../assets/js/ct-paper-radio.js"></script> -->
  <script src="../assets/js/bootstrap-select.js"></script>
  <script src="../assets/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src='../js/selfdefin_function.js'></script>
  <script src="../assets/js/ct-paper.js"></script>    
  <script type="text/javascript" src='../js/test.js'></script>

  <script type="text/javascript" src='../js/mobiscroll.custom.min.js'></script>
  <!-- css-->

    <link href="../bootstrap3/css/bootstrap.css" rel="stylesheet" />
    
    <link href="../assets/css/demo.css" rel="stylesheet" /> 
   <!-- · -->
</head>
<body>
<nav class="navbar navbar-ct-transparent" role="navigation-demo" id="demo-navbar">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
  
      
           <div class="logo-container">
                
               
                   <?php
           echo "<h4>";
            echo $name,"-";
            echo $department,"-";
            echo $position,"-";
           echo "</h4>"
          ?>
            
            
             <a href="../index.php"><button  class="btn btn-default btn-lg">主页</button></a>
            
            </div>
      
    </div>

<!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navigation-example-2">
      <ul class="nav navbar-nav navbar-right">
         
          
       </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-->
</nav>                
<?php 
// 允许上传的图片后缀
echo $_FILES['file']['error'];
echo "file!!!";
var_dump($_FILES);
echo "file!!!";
$allowedExts = array("doc", "pdf", "jpg", "png","xls");
$temp = explode(".", $_FILES["file"]["name"]);
echo $_FILES["file"]["size"];
$extension = end($temp);
echo "后缀：".$extension;     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "application/msword")
|| ($_FILES["file"]["type"] == "application/vnd.ms-excel")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "application/pdf")
|| ($_FILES["file"]["type"] == "image/x-png") 
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2048000)   // 小于 200 kb
&& in_array($extension, $allowedExts))
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "错误：: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
        echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
        echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
        echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
        
        // 判断当期目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        if (file_exists("seal/" . $_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . " 文件已经存在。 ";
        } 
        else
        {
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            $file_name=date("Y-m-d").rand(100,999).$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], "../sealfile/" .iconv("UTF-8", "gbk",$file_name));
            echo "文件存储在: " . "sealfile/" . $_FILES["file"]["name"];
        }
    }
}
else
{
    echo "非法的文件格式";
}
$file=$_FILES["file"]["name"];
// file end
echo $_POST["reason"];


echo $_POST["number"];
echo $_POST["sdate"];
echo $_POST["sperson"];
$spersontxt = $_POST["sperson"]."00005_";
$hello = explode('_',$spersontxt);
$ifs = "";
for($index=0;$index<(count($hello)-1);$index++) 
{ 
echo "array";
echo $hello[$index];
$ifs=$ifs."0_"; 
} 
$type = "";
$type_arry = $_POST['type'];
for($i=0;$i<count($type_arry);$i++){
  echo $type_arry[$i]."<br>";
  if($i==0){
   $type = $type_arry[$i];
  }
  else
   $type = $type.",".$type_arry[$i];
}
echo $type;


include("../sqlconnect.php"); 

include("../wechat/wechatfunction.php");

if (!$link){
    echo"alert('数据库连接失败！')";
}else {
      
        $query = "INSERT INTO seal (reason,type,filename,number,sdate,sperson,ifs,userid,file_road,starter)VALUES('$_POST[reason]','$type','$file','$_POST[number]','$_POST[sdate]','$spersontxt','{$ifs}','$id','../sealfile/$file_name','$name')";
        if (mysqli_query($link, $query)){
        echo "success";
        $oid = mysqli_insert_id($link); 
        echo "id:".$oid;
        $nextid=explode('_',$spersontxt);//wechat
        echo $nextid[0];

        sendcheck($link,$accesstoken,$nextid[0],"印章",$file,$type,$_POST['sdate'],$name,"123.207.96.71/daweijia/demo/checkseal.php?sealid={$oid}");
     }else{
         echo("Errorcode: " . mysqli_errno($link));
     }
          
    }
    


?>

<footer>
	版权所有 2017-<?php echo date("Y")?> all right resverved

</footer>
</body>
</html>