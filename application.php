<?php
	header("Content-type: text/html;charset=utf-8");
  session_start();
	    $id=$_SESSION['userID'];
    	$name=$_SESSION['name'];
   		$department=$_SESSION['department'];
    	$position=$_SESSION['position'];
    	$LV=$_SESSION['LV'];
     
      include("sqlconnect.php");
      include("commonfunction.php"); 


?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
  
   <title>智慧大魏家</title>
   <link rel="icon" type="image/png" href="img/logo.png">
  <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
<!--   <script src="../js/mobiscroll.custom.min.js" type="text/javascript"></script> -->
  <script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
   <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <!--  Plugins -->
  <!-- <script src="../assets/js/ct-paper-checkbox.js"></script>
  <script src="../assets/js/ct-paper-radio.js"></script> -->
  <script src="assets/js/bootstrap-select.js"></script>
  <script src="assets/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src='js/selfdefin_function.js'></script>
  <script src="assets/js/ct-paper.js"></script>    
  <script type="text/javascript" src='js/test.js'></script>

  <script type="text/javascript" src='js/mobiscroll.custom.min.js'></script>
  <!-- css-->

    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    
    <link href="assets/css/demo.css" rel="stylesheet" /> 
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
include("sqlconnect.php"); 


if (!$link){
    echo"alert('数据库连接失败！')";
}else {
      
        $today = date("Y-m-d");

        $query_seal = "select * from seal where userid = '$id' and sdate >= '$today'  order by sdate desc";
        $result_seal = mysqli_query($link, $query_seal);
       
        $query_meeting = "select * from meetingroom where meetingstarter = '$name' and meetingdate >= '$today'  order by meetingdate desc";
        $result_meeting = mysqli_query($link, $query_meeting);

        $query_holiday = "select * from holiday where starterid = '$id' and starttime >= '$today'  order by starttime  desc";
        $result_holiday = mysqli_query($link, $query_holiday);


        $query_outwork = "select * from outwork where starterid = '$id' and starttime >= '$today'  order by starttime  desc";
        $result_outwork = mysqli_query($link, $query_outwork);

        $query_sendfile = "select * from sendfile where starterid = $id and senddate >= '$today'  order by senddate  desc";
        $result_sendfile = mysqli_query($link, $query_sendfile);


        $rows = mysqli_fetch_array($result_seal);
        $rowm = mysqli_fetch_array($result_meeting);
        $rowh = mysqli_fetch_array($result_holiday);
        $rowo = mysqli_fetch_array($result_outwork);
        $rowsf = mysqli_fetch_array($result_sendfile);

        
       echo $today;
        $date = $today;
        $type = "";
        $i=1;
        while ($rows||$rowm||$rowh||$rowo||$rowsf) {
          # code...     
                        echo "date:".$date; 
                        $date=$today; 
                        $type="none"; 
                          $i++;
                          if ($rows&&strtotime($rows['sdate'])>=strtotime($date)) {
                   # code...
                            
                            $date=$rows['sdate'];
                            $type="seal";
                          }//seal finish
                          

                          $d=$rowm['meetingdate']."＆nbsp".$rowm['meetingstart'];
                          $time= date_create($d);
                           
                           if ($rowm&&strtotime($d)>=strtotime($date)) {
                   # code..
                            $date=$d;
                            $type="meeting";



                          }

                           if ($rowh&&strtotime($rowh['starttime'])>=strtotime($date)) {
                   # code...
                             $date=$rowh['starttime'];
                            $type="holiday";

                          }

                           if ($rowo&&strtotime($rowo['starttime'])>=strtotime($date)) {
                   # code...
                             $date=$rowh['starttime'];
                            $type="outwork";

                          }


                           if ($rowsf&&strtotime($rowsf['senddate'])>=strtotime($date)) {
                   # code...
                             $date=$rowsf['senddate'];
                            $type="sendfile";
                          
                          }
                            if ($type=="none") {
                              # code...
                              break;
                            }
                            
                        switch ($type) {
                          case 'seal':
                            # sealcode...
                          writeseal($rows);

                          // if ($rows['token']==1) {
                          //   # code...
                          //    echo "<h4><p class='myapplication'>" . $rows['type'] ."_".$rows['sdate'] ."_". $rows['starter'] ."_"."已同意</p></h4>";


                          // }
                          //  if ($rows['token']==-1) {
                          //   # code...
                          //    echo "<h4><p class='myapplication'>" . $rows['type'] ."_".$rows['sdate'] ."_". $rows['starter'] ."_"."已拒绝</p></h4>";


                          // }
                          // if ($rows['token']==0) {
                          //   # code...
                          //      echo "<h4><p class='myapplication'>" . $rows['type'] ."_".$rows['sdate'] ."_". $rows['starter'] ."_"."进行中</p></h4>";

                          // }
                          

                   $rows = mysqli_fetch_array($result_seal);


                            break;
                            //seal code end

                            case 'meeting':
                           writemeeting($rowm);
                          //   if ($rowm['meetingoffice']==1) {
                          //   # code...
                          //    echo "<h4><p class='myapplication'>" . $rowm['meetingroom'] ."_".$rowm['meetingdate'] ."_".$rowm['meetingstart']. $rowm['meetingstarter'] ."_"."已同意</p></h4>";


                          // }
                          //  if ($rowm['meetingoffice']==-1) {
                          //   # code...
                          //    echo "<h4><p class='myapplication'>" . $rowm['meetingroom'] ."_".$rowm['meetingdate'] ."_".$rowm['meetingstart']. $rowm['meetingstarter'] ."_"."已拒绝</p></h4>";


                          // }
                          // if ($rowm['meetingoffice']==0) {
                          //   # code...
                          //      echo "<h4><p class='myapplication'>" . $rowm['meetingroom'] ."_".$rowm['meetingdate'] ."_".$rowm['meetingstart']. $rowm['meetingstarter'] ."_"."进行中</p></h4>";

                          // }
                          
                        $rowm = mysqli_fetch_array($result_meeting);
                            break;
                            case 'holiday':
                              # code...
                            writeholiday($rowh);
                          //   if ($rowh['token']==1) {
                          //   # code...
                          //    echo "<h4><p class='myapplication'>" . $rowh['type'] ."_".$rowh['starttime'] ."_". $rowh['starter'] ."_"."已同意</p></h4>";


                          // }
                          //  if ($rowh['token']==-1) {
                          //   # code...
                          //    echo "<h4><p class='myapplication'>" . $rowh['type'] ."_".$rowh['starttime'] ."_". $rowh['starter'] ."_"."已拒绝</p></h4>";


                          // }
                          // if ($rowh['token']==0) {
                          //   # code...
                          //      echo "<h4><p class='myapplication'>" . $rowh['type'] ."_".$rowh['starttime'] ."_". $rowh['starter'] ."_"."进行中</p></h4>";

                          // }
                          
                          $rowh = mysqli_fetch_array($result_holiday);
                              break;
                              //holiday end


                              case 'outwork':
                              # code...
                            writeoutwork($rowo);
                          //   if ($rowh['token']==1) {
                          //   # code...
                          //    echo "<h4><p class='myapplication'>" . $rowh['type'] ."_".$rowh['starttime'] ."_". $rowh['starter'] ."_"."已同意</p></h4>";


                          // }
                          //  if ($rowh['token']==-1) {
                          //   # code...
                          //    echo "<h4><p class='myapplication'>" . $rowh['type'] ."_".$rowh['starttime'] ."_". $rowh['starter'] ."_"."已拒绝</p></h4>";


                          // }
                          // if ($rowh['token']==0) {
                          //   # code...
                          //      echo "<h4><p class='myapplication'>" . $rowh['type'] ."_".$rowh['starttime'] ."_". $rowh['starter'] ."_"."进行中</p></h4>";

                          // }
                          
                          $rowo = mysqli_fetch_array($result_outwork);
                              break;
                              //outwork end


                                case 'sendfile':
                              # code...
                            writesendfile($rowsf);
                          //   if ($rowh['token']==1) {
                          //   # code...
                          //    echo "<h4><p class='myapplication'>" . $rowh['type'] ."_".$rowh['starttime'] ."_". $rowh['starter'] ."_"."已同意</p></h4>";


                          // }
                          //  if ($rowh['token']==-1) {
                          //   # code...
                          //    echo "<h4><p class='myapplication'>" . $rowh['type'] ."_".$rowh['starttime'] ."_". $rowh['starter'] ."_"."已拒绝</p></h4>";


                          // }
                          // if ($rowh['token']==0) {
                          //   # code...
                          //      echo "<h4><p class='myapplication'>" . $rowh['type'] ."_".$rowh['starttime'] ."_". $rowh['starter'] ."_"."进行中</p></h4>";

                          // }
                          
                          $rowsf = mysqli_fetch_array($result_sendfile);
                              break;
                              //outwork end
                          
                          default:
                            # code...
                            break;
                        }
                        // end switch

                        


                        }
                        //end while
      







    
        




      
    }
    


?>

<footer>
	版权所有 2017-<?php echo date("Y")?> all right resverved

</footer>
</body>
</html>