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
   <script type="text/javascript" src='js/selfdefin_function.js'></script>
   <title>智慧大魏家</title>
   <link rel="icon" type="image/png" href="img/logo.png">
   
</head>
<body>
<nav class="navbar navbar-ct-transparent" role="navigation-demo" id="demo-navbar">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
  
      
           <div class="logo-container">
                
                <div class="brand">
                   <?php
  
            echo $name,"-";
            echo $department,"-";
            echo $position,"-";
          ?>
                </div>
            </div>
      
    </div>

<!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navigation-example-2">
      <ul class="nav navbar-nav navbar-right">
          <li>
            <input type="button" onclick="logout_confirm()" value="注销" />
          </li>
        
           <li>
           <a href="../index.php">主页</a>
          </li>
          
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
      
        $query = "select * from outwork where id = '{$_GET['outid']}' ";
        $result = mysqli_query($link, $query);
       while($row = mysqli_fetch_array($result))
      {
         
          $spersonid = explode('_',$row['checkid']);
          $ifs = explode('_',$row['checkstatus']);
          $answer ="";
          for ($x=0; $x<(sizeof($spersonid)-1); $x++){
                  
                  if($spersonid[$x]==$id){
                      
                      $ifs[$x]=$_GET["decision"];
                     if (($x+1)<count($spersonid)) {//wechat
                        # code...
                         $nextid=$spersonid[($x+1)];
                      }else{

                        $nextid="none";
                      }
                    
                    }
                    $answer=$answer.$ifs[$x]."_";
                  }
                 
                  echo $answer;
               
          }
          $query= "UPDATE outwork SET checkstatus = '{$answer}' WHERE id = '{$_GET['outid']}' "; 
          if ( mysqli_query($link, $query)) {
            # code...
              if (strlen($nextid)>1&&$_GET["decision"]=='1') {//wechat
          # code...
         
          sendcheck($link,$accesstoken,$nextid,"外出",$row['starttime'],$row['reason'],$row['endtime'],$name,"123.207.96.71/daweijia/demo/out/outcheck.php?outid={{$_GET['outid']}");


        }
       sendstarter($link,$accesstoken,$row['starter'],"外出",$name,$_POST['decision'],$_POST['suggestion'],"");
          }else{

             echo("Errorcode: " . mysqli_errno($link));
          }
         
           


          mysqli_close($link);
    }
    


?>


<footer>
  版权所有 2017-<?php echo date("Y")?> all right resverved

</footer>
</body>
</html>