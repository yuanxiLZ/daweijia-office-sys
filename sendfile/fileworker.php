<?php
  header("Content-type: text/html;charset=utf-8");
 include("../sqlconnect.php"); 

  session_start();
      $id=$_SESSION['userID'];
      $name=$_SESSION['name'];
      $department=$_SESSION['department'];
      $position=$_SESSION['position'];
      $LV=$_SESSION['LV'];
      $sendid=$_SESSION['sendid'];
    
    
    

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

if (!$link){
    echo"alert('数据库连接失败！')";
}else {
      
        $query = "select * from sendfile where id = '{$_GET['id']}' ";
        $result = mysqli_query($link, $query);
       while($row = mysqli_fetch_array($result))
      {
          echo $row['starter'] ."_".$row['senddate'] ."_". $row['maincontent'] ."_";
          echo $_GET['id'];
          echo "<br>";
          echo "<a href='";
          echo $row['fileroad']."'>";
          echo "下载文件</a>";
      }
          
          mysqli_close($link);
    }
    


?>
<form action="fileworkersubmit.php" method="post">
  
   <?php
   echo " <input type='text' name='leaveid' style='display:none' value='{$_GET['id']}'> ";

   ?>
   <h4>发文字号</h4>
   <input type="text" name="fileid">
   <h4>机密程度</h4>
   <input type="text" name="safelv">

<input type="submit" name="submit" value="Submit" />
<select name="decision" >
            <option value="1">同意</option>
            <option value="-1">不同意</option>
            <option value="" selected="selected">是否同意</option>
    </select>
<h4><input type="submit" name="submit" value="提交" /></h4>
</form>

<footer>
  版权所有 2017-<?php echo date("Y")?> all right resverved

</footer>
</body>
</html>