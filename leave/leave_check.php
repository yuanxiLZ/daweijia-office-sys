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
      
        $query = "select * from holiday where id = '{$_GET['leaveid']}' ";
        $result = mysqli_query($link, $query);
       while($row = mysqli_fetch_array($result))
      {
          echo "<h4>发起人:&nbsp&nbsp".$row['starter'] ."</h4>";
          echo "<h4>请假类型:&nbsp&nbsp".$row['type'] ."</h4>";
          echo "<h4>请假开始时间:&nbsp&nbsp".$row['starttime'] ."结束时间:&nbsp&nbsp".$row['endtime']."</h4>";
          echo "<h4>请假原因:&nbsp&nbsp".$row['reason'] ."</h4>";
          echo "<h4>备注:&nbsp&nbsp".$row['remark'] ."</h4>";
            echo "<h4><a href='";
          
          echo "".$row['fileroad']."'>";
          echo "查看文件</a></h4>";
      }
          
          mysqli_close($link);
    }
    


?>
<form action="leave_checksubmit.php" method="get">
  
   <?php
   echo " <input type='text' name='leaveid' style='display:none' value='{$_GET['leaveid']}'> ";

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