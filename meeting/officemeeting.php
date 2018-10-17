 <?php
	header("Content-type: text/html;charset=utf-8");
 include("../sqlconnect.php"); 

  session_start();
	    $id=$_SESSION['userID'];
    	$name=$_SESSION['name'];
   		$department=$_SESSION['department'];
    	$position=$_SESSION['position'];
    	$LV=$_SESSION['LV'];
      $_SESSION['meetingroom']=$row['meetingroom'];
     

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
<a href="workerpage.php">工作人员入口</a>
<?php  

    
if (!$link){
    echo"alert('数据库连接失败！')";
}else {
      
        $query = "select * from meetingroom where meetingid = '{$_GET['meetingid']}'";
        $result = mysqli_query($link, $query);
       while($row = mysqli_fetch_array($result))
      {
          if (date("Y-m-d")>$row['meetingdate']) {
           continue;          }
          echo "<br>";
          echo $row['meetingstarter'] ."_".$row['meetingstart'] ."_". $row['meetingdate'];
          echo $row['meetingcontent']."_".$row['meetingroom'];
          $room=$row['meetingroom'];
          echo "<h4>会议发起人:&nbsp&nbsp".$row['meetingstarter'] ."</h4>";
          echo "<h4>会议日期:&nbsp&nbsp".$row['meetingdate'] ."</h4>";
          echo "<h4>会议开始时间:&nbsp&nbsp".$row['meetingstart'] ."会议结束时间:&nbsp&nbsp".$row['meetingend']."</h4>";
          echo "<h4>会议内容:&nbsp&nbsp".$row['meetingcontent'] ."</h4>";
          echo "<h4>会议地点:&nbsp&nbsp".$row['meetingroom'] ."</h4>";
      }
          
          //mysqli_close($link);
    }
    


?>
<form action="officesubmit.php" method="get">
  
   <?php

     echo $row['meetingroom'];
     echo "<input type='text' style='display:none' value='{$_GET['meetingid']}' name='meetingID'/>";
    //  echo "<select name='meetingroom' >";
    //  for ($i=1; $i <5 ; $i++) { 
    //    echo "<option value='{$i}'";
    //    if (strpos($room,(string)$i)!==FALSE) {
    //      echo "selected='selected'";
    //    }
    //    echo ">";
    //    echo "会议室{$i}";
    //    echo "</option>";
    //  }
    // echo "</select>"
   ?>
  <select name="meetingroom" id="meetingroom">
                                   
                                    <option value="" selected="blank">选择会议室</option>
                                    <option value="301会议室">301会议室</option>
                                    <option value="312会议室">312会议室</option>
                                    
                                    <option value="412会议室">412会议室</option>
                                   <option value="5楼会议室">5楼会议室</option>
                                  
                                   </select></h4>
   
   <select name="decision" >
            <option value="1">同意</option>
            <option value="-1">不同意</option>
            <!-- <option value="" selected="selected">是否同意</option> -->
    </select>
<h4><input type="submit" name="submit" value="提交" /></h4>
</form>

<footer>
	版权所有 2017-<?php echo date("Y")?> all right resverved

</footer>
</body>
</html>