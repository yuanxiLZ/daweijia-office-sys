
<?php
//error_reporting(0);//不显示php报错
include("../sqlconnect.php"); 

date_default_timezone_set('Etc/GMT-8'); //设置时区
if (!$link){
    echo"alert('数据库连接失败！')";
}else {
    	$time=date("H:i:s");
    	$date=date("Y/m/d");
        $query = "INSERT INTO clockin (userID,clock_time,clock_date,signstatus)VALUES('{$_POST['id']}','{$time}','{$date}','1')";
        if (mysqli_query($link, $query)){
        echo "success";
     }else{
         echo ("Errorcode: " . mysqli_errno($link));
        // echo ($_POST["id"].date('H:i:s').date('Y-m-d')."1");
         echo ("query:".$query);
       
     }
    
}

mysqli_close($link);

	

?>


