
<?php
//error_reporting(0);//不显示php报错
include("../sqlconnect.php"); 
if (!$link){
    echo"alert('数据库连接失败！')";
}else {
    	
        $query = "select * from normalclockin ";
        $result = mysqli_query($link, $query);
        if ($row = mysqli_fetch_array($result)){
           echo $row['site'];
       
        }
   
    
}

mysqli_close($link);

	

?>


