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
   <link href="css/selfdefinedcss.css" rel="stylesheet" /> 
   <title>智慧大魏家</title>
   <link rel="icon" type="image/png" href="img/logo.png">
   <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" /> 


    
  <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

  <script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
  
  <!--  Plugins -->
  <script src="assets/js/ct-paper-checkbox.js"></script>
  <script src="assets/js/ct-paper-radio.js"></script>
  <script src="assets/js/bootstrap-select.js"></script>
  <script src="assets/js/bootstrap-datepicker.js"></script>
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
          
        
           
           <a href="../index.php"><h3>主页</h3></a>
        
          
       </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-->
</nav>         
<a href="fileform.php">上传文件</a>

<footer>
  版权所有 2017-<?php echo date("Y")?> all right resverved

</footer>
</body>
</html>