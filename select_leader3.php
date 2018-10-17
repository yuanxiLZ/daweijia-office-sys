<?php  
header("Content-type: text/html;charset=utf-8");
include("sqlconnect.php"); 

if (!$link){
    echo"alert('数据库连接失败！')";
}else {
    	
        $query = "select userID from userinfo where name = '{$_POST['name']}' and LV=3";
        $result = mysqli_query($link, $query);
       while($row = mysqli_fetch_array($result))
			{
    			//echo "<tr>";
    			echo  $row['userID']."_";
    			//echo "<p class='name'>" . $row['name'] . "</p>";
    			//echo "</tr>";
			}
    			mysqli_close($link);
    }
    


?>