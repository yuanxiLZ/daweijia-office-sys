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
   <link rel="icon" type="image/png" href="img/logo.png">
  <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

   <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    

  <script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
  
  <!--  Plugins -->
  <script src="assets/js/ct-paper-checkbox.js"></script>
  <script src="assets/js/ct-paper-radio.js"></script>
  <script src="assets/js/bootstrap-select.js"></script>
  <script src="assets/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src='js/selfdefin_function.js'></script>
  <script src="assets/js/ct-paper.js"></script>    
  <!-- css-->

    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    
    <link href="assets/css/demo.css" rel="stylesheet" /> 
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
            
            
             <a href="index.php"><button  class="btn btn-default btn-lg">主页</button></a>
            
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

if (!$link){
    echo"alert('数据库连接失败！')";
}else {
      
        $query = "select * from seal where sealid = '{$_POST['sealid']}' ";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
      
          echo $row['type'] ."_".$row['sdate'] ."_". $row['reason'] ."_";
          $spersonidfinal=$row['sperson'];
          $spersonid = explode('_',$row['sperson']);
          $ifs = explode('_',$row['ifs']);
          $answer ="";
          for ($x=0; $x<(sizeof($spersonid)-1); $x++){
                  
                  if($spersonid[$x]==$id){
                      
                      $ifs[$x]=$_POST["decision"];
                        if (($x+1)<count($spersonid)) {//wechat
                        # code...
                         $nextid=$spersonid[($x+1)];
                      }else{

                        $nextid="none";
                      }
                    
                    }
                    $answer=$answer.$ifs[$x]."_";
                  } 

                  //echo $answer;
               
          
          if ($_POST['leader']!="blank") {
            $query = "select userID from userinfo where name = '{$_POST['leader']}' and LV=3";
            $result = mysqli_query($link, $query);
            $rowl = mysqli_fetch_array($result);
            $spersonidfinal=$spersonidfinal.$rowl['userID']."_";
            $answer=$answer."0_";
          }else{

            if (!strstr($answer, '0')) {
              # code...
              $spersonidfinal=$spersonidfinal."_00009";
              $answer=$answer."0_";
            }

          }
          $query= "UPDATE seal SET ifs = '{$answer}',sperson ='{$spersonidfinal}' WHERE sealid = '{$_POST['sealid']}' "; 
           if (mysqli_query($link, $query)){
        echo "success";
        var_dump($row);
         if (strlen($nextid)>1&&$_POST["decision"]=='1') {//wechat
          # code...
         
          sendcheck($link,$accesstoken,$nextid,"印章",$row['type'],$row['filename'],$row['sdate'],$row['starter'],"123.207.96.71/daweijia/demo/checkseal.php?sealid={$_POST['sealid']}");


        }
        sendstarter($link,$accesstoken,$row['starter'],"印章",$name,$row['type'],$_POST['decision'],$_POST['suggestion'],"");
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