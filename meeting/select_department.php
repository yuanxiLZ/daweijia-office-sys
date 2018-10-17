<?php  
header("Content-type: text/html;charset=utf-8");
include("../sqlconnect.php"); 

if (!$link){
    echo"alert('数据库连接失败！')";
}else {
        
        $query = "select * from userinfo where department = '{$_POST['department']}'";
        $result = mysqli_query($link, $query);
       while($row = mysqli_fetch_array($result))
            {
                echo "<p class='userinfo'>";
                echo  $row['userID']."_";
               // echo "</p>";
                echo  $row['name'] . "</p>";
               // echo "</tr>";
            }
                mysqli_close($link);
    }
    


?>