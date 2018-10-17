<?php
  header("Content-type: text/html;charset=utf-8");
  session_start();
      $id=$_SESSION['userID'];
      $name=$_SESSION['name'];
      $department=$_SESSION['department'];
      $position=$_SESSION['position'];
      $LV=$_SESSION['LV'];
     
      include("../sqlconnect.php"); 
       


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
<form action="upload_file.php" method="post" enctype="multipart/form-data">
    <label for="file">文件名：</label>
    <input type="file" name="file" id="file"><br>
    <h3>是否置顶</h3>
    <input type="radio" name="top" value="0" checked /> 普通<br />
    <input type="radio" name="top" value="1" /> 置顶<br />
    <input type="submit" name="submit" value="提交">
</form>


<footer>
  版权所有 2017-<?php echo date("Y")?> all right resverved

</footer>
</body>
</html>