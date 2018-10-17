<?php
	header("Content-type: text/html;charset=utf-8");
  session_start();
	    $id=$_SESSION['userID'];
    	$name=$_SESSION['name'];
   		$department=$_SESSION['department'];
    	$position=$_SESSION['position'];
    	$LV=$_SESSION['LV'];
     
      include("sqlconnect.php"); 
         switch ($position)
{

  case '会议室管理':
    header('location:checkapplication_meetingworker.php');
    # code...
    break;
default:
  break;
}


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

        $query_seal = "select * from seal where sperson like '%$id%' and sdate >= '$today'  order by sdate desc";
        $result_seal = mysqli_query($link, $query_seal);
       
        $query_meeting = "select * from meetingroom where meetingcheckid = '$id' and meetingdate >= '$today'  order by meetingdate desc";
        $result_meeting = mysqli_query($link, $query_meeting);

        $query_holiday = "select * from holiday where checkid like '%$id%' and starttime >= '$today'  order by starttime  desc";
        $result_holiday = mysqli_query($link, $query_holiday);


        $query_outwork = "select * from outwork where checkid like '%$id%' and starttime >= '$today'  order by starttime  desc";
        $result_outwork = mysqli_query($link, $query_outwork);


        $query_sendfile = "select * from sendfile where checkid like '%$id%' and senddate >= '$today'  order by senddate  desc";
        $result_sendfile = mysqli_query($link, $query_sendfile);

         $query_acceptfile = "select * from acceptfile where checkid like '%$id%' and token = 0  order by acceptdate  desc";
        $result_acceptfile = mysqli_query($link, $query_acceptfile);





        $rows = mysqli_fetch_array($result_seal);
        $rowm = mysqli_fetch_array($result_meeting);
        $rowh = mysqli_fetch_array($result_holiday);
        $rowo = mysqli_fetch_array($result_outwork);
        $rowsf = mysqli_fetch_array($result_sendfile);
       // $rowaf = mysqli_fetch_array($result_acceptfile);


        while ($rowaf = mysqli_fetch_array($result_acceptfile)) {
          # code...
             $checkid = explode('_',$rowaf['checkid']);
          $checkstatus = explode('_',$rowaf['checkstatus']);
        
        for ($x=0; $x<(sizeof($checkid)-1); $x++){
                  
                  if($checkid[$x]==$id){
                      if ($x==0) {
                        # code... 
                        if($checkstatus[$x]==0){
                         echo "<h4>收文：<p class='myapplication'>" . $rowaf['urgencylv'] ."_".$rowaf['address'] ."_". $rowaf['title'] ."_"."<a href='receive/check.php?afid={$rowaf['id']}'>未审核</a></p></h4>";
                         break;
                         //echo "<a href='{$row['file_road']}'>下载文件</a></p>";
                      }
                      //  if($checkstatus[$x]==1){
                      //    echo "<h4>收文：<p class='myapplication'>" . $rowaf['urgencylv'] ."_".$rowaf['address'] ."_". $rowaf['title'] ."_"."已同意</p></h4>";
                      //    break;

                      // }
                      //   if($checkstatus[$x]==(-1)){
                      //    echo "<h4>收文：<p class='myapplication'>" . $rowaf['urgencylv'] ."_".$rowaf['address'] ."_". $rowaf['title'] ."_"."已拒绝</p></h4>";
                      //    break;

                      // }
                      
                      }// 判断审批顺序是否是第一个
                      if ($x>0&&$checkstatus[$x-1]==0) {//不是第一个审批
                        # code...
                         //echo "<h4>收文：<p class='myapplication'>" . $rowaf['urgencylv'] ."_".$rowaf['address'] ."_". $rowaf['title'] ."_"."未审核</p></h4>";
                         break;

                          
                      }
                        if($checkstatus[$x]==0){
                         echo "<h4>收文：<p class='myapplication'>" . $rowaf['urgencylv'] ."_".$rowaf['address'] ."_". $rowaf['title'] ."_"."<a href='receive/check.php?afid={$rowaf['id']}'>未审核</a></p></h4>";
                         //echo "<a href='{$row['file_road']}'>下载文件</a></p>";
                      }
                      //  if($checkstatus[$x]==1){
                      //    echo "<h4>收文：<p class='myapplication'>" . $rowaf['urgencylv'] ."_".$rowaf['address'] ."_". $rowaf['title'] ."_"."已同意</p></h4>";

                      // }
                      //   if($checkstatus[$x]==(-1)){
                      //    echo "<h4>收文：<p class='myapplication'>" . $rowaf['urgencylv'] ."_".$rowaf['address'] ."_". $rowaf['title'] ."_"."已拒绝</p></h4>";

                      // }


                     

                    }
                   
                  }
        }

       
   

        $date = $today;
        $type = "";
        $i=1;
        while ($rows||$rowm||$rowh||$rowo||$rowsf) {
          # code...       
                          $date=$today;
                          $i++;
                           $type="none"; 
                          if (strtotime($rows['sdate'])>=strtotime($date)) {
                   # code...
                            $date=$rows['sdate'];
                            $type="seal";
                          }//seal finish
                          

                          $d=$rowm['meetingdate'].$rowm['meetingstart'];
                         
                           
                           if (strtotime($d)>=strtotime($date)) {
                   # code..
                            $date=$d;
                            $type="meeting";



                          }

                           if ($rowh['starttime']>=$date) {
                   # code...
                             $date=$rowh['starttime'];
                            $type="holiday";

                          }



                           if ($rowo['starttime']>=$date) {
                   # code...
                            $date=$rowo['starttime'];
                            $type="outwork";

                          }



                           if ($rowsf['senddate']>=$date) {
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

          $spersonid = explode('_',$rows['sperson']);
          $ifs = explode('_',$rows['ifs']);
        
        for ($x=0; $x<(sizeof($spersonid)-1); $x++){
                  
                  if($spersonid[$x]==$id){
                      if ($x==0) {
                        # code... 
                        if($ifs[$x]==0){
                         echo "<h4>印章：<p class='myapplication'>" . $rows['type'] ."_".$rows['sdate'] ."_". $rows['starter'] ."_"."<a href='seal/checkseal.php?sealid={$rows['sealid']}'>未审核</a></p></h4>";
                         break;
                         //echo "<a href='{$row['file_road']}'>下载文件</a></p>";
                      }
                      //  if($ifs[$x]==1){
                      //    echo "<h4>印章：<p class='myapplication'>" . $rows['type'] ."_".$rows['sdate'] ."_". $rows['starter'] ."_"."已同意</p></h4>";
                      //    break;

                      // }
                      //   if($ifs[$x]==(-1)){
                      //    echo "<h4>印章：<p class='myapplication'>" . $rows['type'] ."_".$rows['sdate'] ."_". $rows['starter'] ."_"."已拒绝</p></h4>";
                      //    break;

                      // }
                      
                      }// 判断审批顺序是否是第一个
                      if ($x>0&&$ifs[$x-1]==0) {//不是第一个审批
                        # code...
                         //echo "<h4>印章：<p class='myapplication'>" . $rows['type'] ."_".$rows['sdate'] ."_". $rows['starter'] ."_"."未审核</p></h4>";
                         break;

                          
                      }
                        if($ifs[$x]==0){
                         echo "<h4>印章：<p class='myapplication'>" . $rows['type'] ."_".$rows['sdate'] ."_". $rows['starter'] ."_"."<a href='seal/checkseal.php?sealid={$rows['sealid']}'>未审核</a></p></h4>";
                         //echo "<a href='{$row['file_road']}'>下载文件</a></p>";
                      }
                      //  if($ifs[$x]==1){
                      //    echo "<h4>印章：<p class='myapplication'>" . $rows['type'] ."_".$rows['sdate'] ."_". $rows['starter'] ."_"."已同意</p></h4>";

                      // }
                      //   if($ifs[$x]==(-1)){
                      //    echo "<h4>印章：<p class='myapplication'>" . $rows['type'] ."_".$rows['sdate'] ."_". $rows['starter'] ."_"."已拒绝</p></h4>";

                      // }


                     

                    //}
                   
                  }
                }
                   $rows = mysqli_fetch_array($result_seal);


                            break;
                            //seal code end

                            case 'meeting':
                            //echo "<br>";
                           
          
         if ($rowm['meetingoffice']=="0") {
           echo "<br>";
             echo "<h4>会议：";
          echo $rowm['meetingstarter'] ."_".$rowm['meetingstart'] ."_". $rowm['meetingdate'] ."_".$rowm['meetingroom'];
          echo $rowm['meetingcontent']."_";
           echo "<a href='meeting/officemeeting.php?meetingid={$rowm['meetingID']}'>未审核</a></p>";
         }else{
          // echo "<a href='meeting/officemeeting.php?meetingid={$rowm['meetingID']}'>已审核</a></p>";

         }
         echo "</h4>";
           $rowm = mysqli_fetch_array($result_meeting);
                            break;
                            case 'holiday':
                              # code...

                          $checkid = explode('_',$rowh['checkid']);
          $checkstatus = explode('_',$rowh['checkstatus']);
        
        for ($x=0; $x<(sizeof($checkid)-1); $x++){
                  
                  if($checkid[$x]==$id){
                      if ($x==0) {
                        # code... 
                        if($checkstatus[$x]==0){
                         echo "<h4>请假：<p class='myapplication'>" . $rowh['type'] ."_".$rowh['starttime'] ."_". $rowh['starter'] ."_"."<a href='leave/leave_check.php?leaveid={$rowh['id']}'>未审核</a></p></h4>";
                         break;
                         //echo "<a href='{$row['file_road']}'>下载文件</a></p>";
                      }
                      //  if($checkstatus[$x]==1){
                      //    echo "<h4>请假：<p class='myapplication'>" . $rowh['type'] ."_".$rowh['starttime'] ."_". $rowh['starter'] ."_"."已同意</p></h4>";
                      //    break;

                      // }
                      //   if($checkstatus[$x]==(-1)){
                      //    echo "<h4>请假：<p class='myapplication'>" . $rowh['type'] ."_".$rowh['starttime'] ."_". $rowh['starter'] ."_"."已拒绝</p></h4>";
                      //    break;

                      // }
                      
                      }// 判断审批顺序是否是第一个
                      if ($x>0&&$checkstatus[$x-1]==0) {//不是第一个审批
                        # code...
                         //echo "<h4>请假：<p class='myapplication'>" . $rowh['type'] ."_".$rowh['starttime'] ."_". $rowh['starter'] ."_"."未审核</p></h4>";
                         break;

                          
                      }
                        if($checkstatus[$x]==0){
                         echo "<h4>请假：<p class='myapplication'>" . $rowh['type'] ."_".$rowh['starttime'] ."_". $rowh['starter'] ."_"."<a href='leave/leave_check.php?leaveid={$rowh['id']}'>未审核</a></p></h4>";
                         //echo "<a href='{$row['file_road']}'>下载文件</a></p>";
                      }
                      //  if($checkstatus[$x]==1){
                      //    echo "<h4>请假：<p class='myapplication'>" . $rowh['type'] ."_".$rowh['starttime'] ."_". $rowh['starter'] ."_"."已同意</p></h4>";

                      // }
                      //   if($checkstatus[$x]==(-1)){
                      //    echo "<h4>请假：<p class='myapplication'>" . $rowh['type'] ."_".$rowh['starttime'] ."_". $rowh['starter'] ."_"."已拒绝</p></h4>";

                      // }


                     

                    }
                   
                  }
                   $rowh = mysqli_fetch_array($result_holiday);
                              break;
                              //holiday end


                              case 'outwork':
                              # code...

                          $checkid = explode('_',$rowo['checkid']);
                          $checkstatus = explode('_',$rowo['checkstatus']);
        
        for ($x=0; $x<(sizeof($checkid)-1); $x++){
                  
                  if($checkid[$x]==$id){
                      if ($x==0) {
                        # code... 
                        if($checkstatus[$x]==0){
                         echo "<h4>外出：<p class='myapplication'>" . $rowo['starter'] ."_".$rowo['starttime'] ."_". $rowo['endtime'] ."_"."<a href='out/outcheck.php?outid={$rowo['id']}'>未审核</a></p></h4>";
                         //echo "<a href='{$row['file_road']}'>下载文件</a></p>";

                         break;
                      }
                      //  if($checkstatus[$x]==1){
                      //    echo "<h4>外出：<p class='myapplication'>" . $rowo['starter'] ."_".$rowo['starttime'] ."_". $rowo['endtime'] ."_"."已同意</p></h4>";

                      //    break;

                      // }
                      //   if($checkstatus[$x]==(-1)){
                      //    echo "<h4>外出：<p class='myapplication'>" . $rowo['starter'] ."_".$rowo['starttime'] ."_". $rowo['endtime'] ."_"."已拒绝</p></h4>";

                      //    break;

                      // }
                      
                      }// 判断审批顺序是否是第一个
                      if ($x>0&&$checkstatus[$x-1]==0) {//不是第一个审批
                        # code...
                         //echo "<h4>外出：<p class='myapplication'>" . $rowo['starter'] ."_".$rowo['starttime'] ."_". $rowo['endtime'] ."_"."未审核</p></h4>";
                         break;

                          
                      }
                        if($checkstatus[$x]==0){
                         echo "<h4>外出：<p class='myapplication'>" . $rowo['starter'] ."_".$rowo['starttime'] ."_". $rowo['endtime'] ."_"."<a href='out/outcheck.php?outid={$rowo['id']}'>未审核</a></p></h4>";
                         //echo "<a href='{$row['file_road']}'>下载文件</a></p>";
                      }
                      //  if($checkstatus[$x]==1){
                      //   echo "<h4>外出：<p class='myapplication'>" . $rowo['starter'] ."_".$rowo['starttime'] ."_". $rowo['endtime'] ."_"."已同意</p></h4>";

                      // }
                      //   if($checkstatus[$x]==(-1)){
                      //   echo "<h4>外出：<p class='myapplication'>" . $rowo['starter'] ."_".$rowo['starttime'] ."_". $rowo['endtime'] ."_"."已拒绝</p></h4>";

                      // }


                     

                    }
                   
                  }
                   $rowo = mysqli_fetch_array($result_outwork);
                              break;
                              //outwork end



                                case 'sendfile':
                              # code...

                          $checkid = explode('_',$rowsf['checkid']);
          $checkstatus = explode('_',$rowsf['checkstatus']);
        
        for ($x=0; $x<(sizeof($checkid)-1); $x++){
                  
                  if($checkid[$x]==$id){
                      if ($x==0) {
                        # code... 
                        if($checkstatus[$x]==0){
                         echo "<h4>发文：<p class='myapplication'>" . $rowsf['starter'] ."_".$rowsf['title'] ."_". $rowsf['senddate'] ."_"."<a href='sendfile/leader2check.php?id={$rowsf['id']}'>未审核</a></p></h4>";
                         //echo "<a href='{$row['file_road']}'>下载文件</a></p>";

                         break;
                      }
                      //  if($ckeckstatus[$x]==1){
                      //    echo "<h4>发文：<p class='myapplication'>" . $rowsf['starter'] ."_".$rowsf['title'] ."_". $rowsf['senddate'] ."_"."已同意</p></h4>";

                      //    break;

                      // }
                      //   if($checkstatus[$x]==(-1)){
                      //    echo "<h4>发文：<p class='myapplication'>" . $rowsf['starter'] ."_".$rowsf['title'] ."_". $rowsf['senddate'] ."_"."已拒绝</p></h4>";

                      //    break;

                      // }
                      
                      }// 判断审批顺序是否是第一个
                      if ($x>0&&$checkstatus[$x-1]==0) {//不是第一个审批
                        # code...
                        // echo "<h4>发文：<p class='myapplication'>" . $rowsf['starter'] ."_".$rowsf['title'] ."_". $rowsf['senddate'] ."_"."未审核</p></h4>";
                         break;

                          
                      }
                        if($checkstatus[$x]==0){
                         echo "<h4发文：><p class='myapplication'>" . $rowsf['starter'] ."_".$rowsf['title'] ."_". $rowsf['senddate'] ."_"."<a href='sendfile/leader2check.php?id={$rowsf['id']}'>未审核</a></p></h4>";
                         //echo "<a href='{$row['file_road']}'>下载文件</a></p>";
                      }
                      //  if($checkstatus[$x]==1){
                      //   echo "<h4>发文：<p class='myapplication'>" . $rowsf['starter'] ."_".$rowsf['title'] ."_". $rowsf['senddate'] ."_"."已同意</p></h4>";

                      // }
                      //   if($checkstatus[$x]==(-1)){
                      //   echo "<h4>发文：<p class='myapplication'>" . $rowsf['starter'] ."_".$rowsf['title'] ."_". $rowsf['senddate'] ."_"."已拒绝</p></h4>";

                      // }


                     

                    }
                   
                  }
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