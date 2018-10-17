<?php  
header("Content-type: text/html;charset=utf-8");
include("../sqlconnect.php"); 

if (!$link){
    echo"alert('数据库连接失败！')";
}else {
    	
        $query = "select * from meetingroom where meetingdate = '{$_POST['date']}' order by meetingstart desc";
        $result = mysqli_query($link, $query);
       while($row = mysqli_fetch_array($result))
			{
    			echo  "会议开始时间".$row['meetingstart']."_";
                echo  "会议时长".$row['meetingtime']."_";
    			//echo "<p class='name'>" . $row['name'] . "</p>";
    			//echo "</tr>";
			}
    			mysqli_close($link);
    }
    


  