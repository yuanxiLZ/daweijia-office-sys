  
<?php
//error_reporting(0);//不显示php报错
include("sqlconnect.php"); 
include("wechat/wechatfunction.php");
if (!$link){
    echo"alert('数据库连接失败！')";
}else {
    	
        $query = "select * from userinfo where account_name = '{$_POST['name']}' and password = '{$_POST['password']}'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 1){
            echo "success";
        	
        	$row = $result->fetch_assoc();
        	echo $row["userID"];
        	session_start();
        	$_SESSION['userID']=$row["userID"];
        	$_SESSION['name']=$row["name"];
        	$_SESSION['department']=$row["department"];
        	$_SESSION['position']=$row["position"];
        	$_SESSION['LV']=$row["LV"];
            $_SESSION['openid']=$row["openid"];
       
        }else{
        	echo "账号密码错误！";
        	
    }
    
}

mysqli_close($link);


check_token();

	

?>


