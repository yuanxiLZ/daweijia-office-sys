<?php  
	include("sqlconnect.php");
  function writeseal($rows) {//印章展示函数
    if ($rows['token']==1) {
                            # code...
                             echo "<h4><p class='myapplication'>" . "印章".$rows['type'] ."_".$rows['sdate'] ."_". $rows['starter'] ."_"."已同意</p></h4>";


                          }
                           if ($rows['token']==-1) {
                            # code...
                             echo "<h4><p class='myapplication'>" . "印章".$rows['type'] ."_".$rows['sdate'] ."_". $rows['starter'] ."_"."已拒绝</p></h4>";


                          }
                          if ($rows['token']==0) {
                            # code...
                               echo "<h4><p class='myapplication'>" ."印章". $rows['type'] ."_".$rows['sdate'] ."_". $rows['starter'] ."_"."审批中</p></h4>";
}



}

//function end
function writemeeting($rowm) {//会议室展示函数
     if ($rowm['meetingoffice']==1) {
                            # code...
                             echo "<h4><p class='myapplication'>" ."会议室" .$rowm['meetingroom'] ."_".$rowm['meetingdate'] ."_".$rowm['meetingstart']. $rowm['meetingstarter'] ."_"."已同意</p></h4>";


                          }
                           if ($rowm['meetingoffice']==-1) {
                            # code...
                             echo "<h4><p class='myapplication'>" ."会议室" .$rowm['meetingroom'] ."_".$rowm['meetingdate'] ."_".$rowm['meetingstart']. $rowm['meetingstarter'] ."_"."已拒绝</p></h4>";


                          }
                          if ($rowm['meetingoffice']==0) {
                            # code...
                               echo "<h4><p class='myapplication'>" ."会议室" .$rowm['meetingroom'] ."_".$rowm['meetingdate'] ."_".$rowm['meetingstart']. $rowm['meetingstarter'] ."_"."审批中</p></h4>";

                          }

}

//function end


function writeholiday($rowh) {//请假展示函数
      if ($rowh['token']==1) {
                            # code...
                             echo "<h4><p class='myapplication'>" ."请假". $rowh['type'] ."_".$rowh['starttime'] ."_". $rowh['starter'] ."_"."已同意</p></h4>";


                          }
                           if ($rowh['token']==-1) {
                            # code...
                             echo "<h4><p class='myapplication'>" ."请假". $rowh['type'] ."_".$rowh['starttime'] ."_". $rowh['starter'] ."_"."已拒绝</p></h4>";


                          }
                          if ($rowh['token']==0) {
                            # code...
                               echo "<h4><p class='myapplication'>" ."请假".$rowh['type'] ."_".$rowh['starttime'] ."_". $rowh['starter'] ."_"."审批中</p></h4>";

                          }
                      }

//function end



  function writeoutwork($rowo) {//请假展示函数
      if ($rowo['token']==1) {
                            # code...
                             echo "<h4><p class='myapplication'>" ."外出". $rowo['reason'] ."_".$rowo['starttime'] ."_". $rowo['endtime'] ."_"."已同意</p></h4>";


                          }
                           if ($rowo['token']==-1) {
                            # code...
                             echo "<h4><p class='myapplication'>" . "外出".$rowo['reason'] ."_".$rowo['starttime'] ."_". $rowo['endtime'] ."_"."已拒绝</p></h4>";


                          }
                          if ($rowo['token']==0) {
                            # code...
                               echo "<h4><p class='myapplication'>" ."外出". $rowo['reason'] ."_".$rowo['starttime'] ."_". $rowo['endtime'] ."_"."审批中</p></h4>";

                          }
                      }

//function end


 function writesendfile($rowsf) {//请假展示函数
      if ($rowsf['token']==1) {
                            # code...
                             echo "<h4><p class='myapplication'>" ."发文". $rowsf['title'] ."_".$rowsf['senddate'] ."_" ."_"."已同意</p></h4>";


                          }
                           if ($rowsf['token']==-1) {
                            # code...
                             echo "<h4><p class='myapplication'>" . "发文".$rowsf['title'] ."_".$rowsf['senddate'] ."_" ."_"."已拒绝</p></h4>";


                          }
                          if ($rowsf['token']==0) {
                            # code...
                               echo "<h4><p class='myapplication'>" . "发文".$rowsf['title'] ."_".$rowsf['senddate'] ."_" ."_"."审批中</p></h4>";

                          }
                      }

//function end
  function leadershowlist($id,$link){
    if (!$link){
    echo"alert('数据库连接失败！')";
}else {
      
        $query = "select * from userinfo where leader like '%$id%' ";
        $result = mysqli_query($link, $query);
       while($row = mysqli_fetch_array($result))
      {
         echo " <option value='".$row['name']."'>{$row['name']}</option>";
      }
          
        
    }
    

  }




  function checkmeetingtime($link,$date,$start,$end,$room){
      if (!$link){
    echo"alert('数据库连接失败！')";
}else {
      
        $query = "select * FROM meetingroom WHERE meetingdate = '$date' AND (meetingstart<'$start'<meetingend OR meetingstart<'$end'<meetingend) AND meetingroom='$room'";
        $result = mysqli_query($link, $query);
       if($row = mysqli_fetch_array($result))
      {
        header('Location:meetingerror.php');
        return "false";
      }
          
      return "ture";  
    }

  }


?>
