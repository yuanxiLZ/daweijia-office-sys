<?php
	header("Content-type: text/html;charset=utf-8");
  session_start();
	//		$_SESSION['userID'];
    	$name=$_SESSION['name'];
   		$department=$_SESSION['department'];
    	$position=$_SESSION['position'];
    	$LV=$_SESSION['LV'];
      $id=$_SESSION['userID'];

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

include("../sqlconnect.php");
include("../wechat/wechatfunction.php");
  

$nextid="";//wechat


$checkidtxt = $_POST["checkid"]; //生成审批状态
$hello = explode('_',$checkidtxt);
$checkstatus = "";
for($index=0;$index<(count($hello)-1);$index++) 
{ 
echo "array";
echo $hello[$index];
$checkstatus=$checkstatus."0_"; 
} 


if (!$link){
    echo"alert('数据库连接失败！')";
}else {
      
        $query = "INSERT INTO outwork(starter,starterid,starttime,endtime,checkname,checkid,checkstatus,reason,remark)VALUES('$name','$id','{$_POST['start_datetime']}','{$_POST['end_datetime']}','{$_POST['checkname']}','{$_POST['checkid']}','$checkstatus','{$_POST['reason']}','{$_POST['remark']}')";
    if (mysqli_query($link, $query)){

        echo "success";
         $oid = mysqli_insert_id($link); 
        echo "id:".$oid;
        $nextid=explode('_',$checkidtxt);
        echo $nextid[0];
        sendcheck($link,$accesstoken,$nextid[0],"外出",$_POST['start_datetime'],$_POST['reason'],$_POST['end_datetime'],$name,"123.207.96.71/daweijia/demo/out/outcheck.php?outid={$oid}");
     }else{
         echo("Errorcode: " . mysqli_errno($link));
     }
     
        
//         if (!mysqli_query($link, $query))
// {
// echo("Errorcode: " . mysqli_errno($con));
// }
//     }
    
}


?> 



<footer>
	版权所有 2017-<?php echo date("Y")?> all right resverved

</footer>
</body>
   
</html>