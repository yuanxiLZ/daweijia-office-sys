<?php
  header("Content-type: text/html;charset=utf-8");
 include("../sqlconnect.php"); 

  session_start();
      $id=$_SESSION['userID'];
      $name=$_SESSION['name'];
      $department=$_SESSION['department'];
      $position=$_SESSION['position'];
      $LV=$_SESSION['LV'];
    

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

if (!$link){
    echo"alert('数据库连接失败！')";
}else {
      
        $query = "select * from outwork where id = '{$_GET['outid']}' ";
        $result = mysqli_query($link, $query);
       while($row = mysqli_fetch_array($result))
      {
         echo "<h4>申请人:&nbsp&nbsp".$row['starter'] ."</h4>";
          echo "<h4>外出开始时间:&nbsp&nbsp".$row['starttime'] ."</h4>";
          echo "<h4>外出结束时间:&nbsp&nbsp".$row['endtime'] ."</h4>";
          echo "<h4>外出原因:&nbsp&nbsp".$row['reason'] ."</h4>";
         

         
         
      }
          
          mysqli_close($link);
    }
    


?>
<form action="outcheck_submit.php" method="get">
  
   <?php
   echo " <input type='text' name='outid' style='display:none' value='{$_GET['outid']}'> ";

   ?>
   建议：
    <textarea rows="6" cols="50" name="suggestion">

    </textarea>
   <select name="decision" >
            <option value="1">同意</option>
            <option value="-1">不同意</option>
            
    </select>
<h4><input type="submit" name="submit" value="提交" /></h4>
</form>

<footer>
  版权所有 2017-<?php echo date("Y")?> all right resverved

</footer>
</body>
</html>