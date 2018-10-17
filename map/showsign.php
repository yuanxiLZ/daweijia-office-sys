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
      

    <div >
       
                  <div class="row">
                    <div class="col-md-6">
                        <div class="tim-title">
                            <h3>考勤</h3>
                        </div>
                        <br>
                     <!-- Collect the nav links, forms, and other content for toggling -->
                                
                                  <ul class="nav navbar-nav">
                                    <li class="active"><a href="location.php"><h3>打卡</h3></a></li>
                                    <li><a href="../leave/leave.php"><h3>请假</h3></a></li>
                                  <li class="active"><a href="../out/newout.php"><h3>外出</h3></a></li>
                                    <li><a href=""><h3></h3></a></li>
                                  </ul>
                      
                       

                    </div>
                    <div class="col-md-6">
                    </div>
                </div> <!-- end row -->
                <table class='table table-condensed'>
        <thead>
          <tr>
           <th><h2>签到日期</h2></th>
            <th><h2>签到时间</h2></th>
            
          </tr>
      </thead> <tbody>
        <?php  
header("Content-type: text/html;charset=utf-8");
include("../sqlconnect.php"); 

if (!$link){
    echo"alert('数据库连接失败！')";
}else {
        
        $query = "select * from clockin where userID = '$id' order by clock_date desc";
        $result = mysqli_query($link, $query);
       while($row = mysqli_fetch_array($result))
            {
               
                echo  "<tr><td><h3>".$row['clock_date']."</h3></td>";
                echo  "<td><h3>".$row['clock_time']."</h3></td></tr>";
             
                //echo "<p class='name'>" . $row['name'] . "</p>";
                //echo "</tr>";
            }
                mysqli_close($link);
    }
    

    ?>
    </tbody></table>
  

    </div>
  
    <div id="other">
        <?php 
    echo "<p id='id'>";
    echo $id."</p>";
 ?>
    </div>
</body>
</html>
  <script type="text/javascript" src='../js/selfdefin_function.js'></script>
 <script type="text/javascript" src='../js/map.js'></script>
