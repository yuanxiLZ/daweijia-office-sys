<?php
	header("Content-type: text/html;charset=utf-8");
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
	 <script type="text/javascript" src='js/selfdefin_function.js'></script>
	 <title>智慧大魏家</title>
	 <link rel="icon" type="image/png" href="img/logo.png">
	 
</head>
<body>
<nav class="navbar navbar-ct-transparent" role="navigation-demo" id="demo-navbar">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
  
      
           <div class="logo-container">
                
                <div class="brand">
                   <?php
	
						echo $name,"-";
						echo $department,"-";
						echo $position,"-";
					?>
                </div>
            </div>
      
    </div>

<!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navigation-example-2">
      <ul class="nav navbar-nav navbar-right">
          <li>
            <input type="button" onclick="logout_confirm()" value="注销" />
          </li>
        
           <li>
           <a href="index.php">主页</a>
          </li>
          
       </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-->
</nav>         
<?php  
include("sqlconnect.php"); 

if (!$link){
    echo"alert('数据库连接失败！')";
}else {
      
        $query = "select * from seal where token = 1 order by sdate desc";
        $result = mysqli_query($link, $query);
       while($row = mysqli_fetch_array($result))
      // { $spersonid = explode('_',$row['sperson']);
      //     $ifs = explode('_',$row['ifs']);
        
      //   for ($x=0; $x<(sizeof($spersonid)-1); $x++){
                  
      //             if($spersonid[$x]==$id){
                      
      //                 if($ifs[$x]==0){
      //                    echo "<p class='myapplication'>" . $row['type'] ."_".$row['sdate'] ."_". $row['filename'] ."_"."<a href='checkseal.php?sealid={$row['sealid']}'>未审核</a></p>";

      //                 }
      //                  if($ifs[$x]==1){
      //                    echo "<p class='myapplication'>" . $row['type'] ."_".$row['sdate'] ."_". $row['filename'] ."_"."已同意</p>";

      //                 }
      //                   if($ifs[$x]==(-1)){
      //                    echo "<p class='myapplication'>" . $row['type'] ."_".$row['sdate'] ."_". $row['filename'] ."_"."已拒绝</p>";

      //                 }

      //               }
                   
      //             }
        
        echo "<p class='myapplication'>" . $row['type'] ."_".$row['sdate'] ."_". $row['filename'] ."_"."已同意</p>";

         
      }
          mysqli_close($link);
    }
    


?>

<footer>
	版权所有 2017-<?php echo date("Y")?> all right resverved

</footer>
</body>
</html>