<?php
	header("Content-type: text/html;charset=utf-8");
  session_start();
	//		$_SESSION['userID'];
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
<a href="meetingindex.php">申请会议</a>
<!-- Collect the nav links, forms, and other content for toggling -->
<?php  

include("../sqlconnect.php"); 
include("../wechat/wechatfunction.php");
include("../commonfunction.php");
$check=checkmeetingtime($link,$_POST['meetingdate'],$_POST['meetingstart'],$_POST['meetingend'],$_POST['meetingroom']);
if (!$link&&$check){
    echo"alert('数据库连接失败！')";
}else {
      
        $query = "INSERT INTO meetingroom(meetingcontent,meetingnum,meetingmember,meetingstarter,meetingend,meetingremark,meetingmemberID,meetingstart,meetingdate,meetingroom)VALUES('{$_POST['meetingcontent']}','{$_POST['meetingnum']}','{$_POST['meetingmember']}','$name','{$_POST['meetingend']}','{$_POST['meetingremark']}','{$_POST['meetingmemberID']}','{$_POST['meetingstart']}','{$_POST['meetingdate']}','{$_POST['meetingroom']}')";
    if (mysqli_query($link, $query)){
        echo "success";
         sendcheck($link,$accesstoken,"00005","会议",$_POST['meetingdate'],$_POST['meetingcontent'],$_POST['meetingstart'],$name,"");
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