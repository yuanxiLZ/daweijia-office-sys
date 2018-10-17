<?php
header("Content-type: text/html;charset=utf-8");
  session_start();
      $id=$_SESSION['userID'];
      $name=$_SESSION['name'];
      $department=$_SESSION['department'];
      $position=$_SESSION['position'];
      $LV=$_SESSION['LV'];
      $sendid=$_SESSION['sendid'];
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
$nextid="";

 $query_sendfile = "select * from sendfile where id = '$sendid'";
 $result_sendfile = mysqli_query($link, $query_sendfile);
 $row = mysqli_fetch_array($result_sendfile);
   // echo $row['type'] ."_".$row['sdate'] ."_". $row['reason'] ."_";
          $checkid = explode('_',$row['checkid']);
          $checkstatus = explode('_',$row['checkstatus']);
          $answer ="";
          for ($x=0; $x<(sizeof($checkid)-1); $x++){
                  
                  if($checkid[$x]==$id){
                      
                      $checkstatus[$x]=$_POST["decision"];
                      
                       if (($x+1)<count($checkid)) {//wechat
                        # code...
                         $nextid=$checkid[($x+1)];
                      }else{

                        $nextid="none";
                      }
                    
                    
                    }
                    $answer=$answer.$checkstatus[$x]."_";
                  }

                  echo $answer;
                  echo $sendid;

$suggestion=$row['suggestion'].$name.":".$_POST['suggestion']; 

$checkname=$row['checkname'].$_POST['checkname'];

$checkid=$row['checkid'].$_POST['checkid'];
if (!empty($_POST['checkid'])) {
  # code...
  $answer=$answer."0_";

}



if (!$link){
    echo"alert('数据库连接失败！')";
}else {
      
        $query = "UPDATE sendfile SET checkstatus = '$answer' ,suggestion ='$suggestion',checkname='$checkname',checkid='$checkid' WHERE id = '$sendid' ";
        if (mysqli_query($link, $query)){
          echo "success";
         if (strlen($nextid)>1&&$_POST["decision"]=='1') {//wechat
          # code...
            $checkid = explode('_',$checkid);
          $checkstatus = explode('_',$checkstatus);
          $answer ="";
          for ($x=0; $x<(sizeof($checkid)-1); $x++){
                  
                  if($checkid[$x]==$id){
                      
                      $checkstatus[$x]=$_POST["decision"];
                      
                       if (($x+1)<count($checkid)) {//wechat
                        # code...
                         $nextid=$checkid[($x+1)];
                      }else{

                        $nextid="none";
                      }
                    
                    
                    }
                    $answer=$answer.$checkstatus[$x]."_";
                  }
         
          sendcheck($link,$accesstoken,$nextid,"发文",$row['title'],$row['maincontent'],$row['senddate'],$name,"123.207.96.71/daweijia/demo/sendfile/leader2check.php?id={$sendid}");


        }
       sendstarter($link,$accesstoken,$row['starter'],"发文",$row['starter'],$_POST['decision'],$_POST['suggestion'],"");
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