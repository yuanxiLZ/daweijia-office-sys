<?php
	session_start();
	//		$_SESSION['userID'];
    	$name=$_SESSION['name'];
   		$department=$_SESSION['department'];
    	$position=$_SESSION['position'];
    	$LV=$_SESSION['LV'];
    


?>
<!DOCTYPE html>
<html>
<head>
	 
	 <meta charset="UTF-8">
   <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Cache-Control" content="no-cache">
  <meta http-equiv="Expires" content="0">
	 <script type="text/javascript" src='js/selfdefin_function.js'></script>
	 <link href="css/selfdefinedcss.css" rel="stylesheet" /> 
   <title>智慧大魏家</title>
	 <link rel="icon" type="image/png" href="img/logo.png">
	 <meta name="viewport"content="width=device-width,  initial-scale=1.0,user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />
    
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" /> 


    
  <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

  <script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
  
  <!--  Plugins -->
  <script src="assets/js/ct-paper-checkbox.js"></script>
  <script src="assets/js/ct-paper-radio.js"></script>
  <script src="assets/js/bootstrap-select.js"></script>
  <script src="assets/js/bootstrap-datepicker.js"></script>
  
  
</head>
<body style= "overflow:auto">


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
					 echo "</h4>";
           
          ?>
            
              <button class="btn btn-default btn-lg"  onclick="logout_confirm()">注销</button>
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





                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a  href="http://www.daweijia.cn/daweijia/Announ/index.php"><h3>公示·公告</h3></a>
                    </div>


                   
                 <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navigation-example-2">
                      <ul class="nav navbar-nav navbar-right">
                            <!-- <li>
                                <a href="#">
                                    <i class="fa fa-facebook-square"></i>
                                    Facebook
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                    Twitter
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope"></i> 
                                    Email
                                </a>
                            </li> -->
                       </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-->
               
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a  href="examine.php"><h3>新申请</h3></a>
                    </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navigation-example-2">
                      <ul class="nav navbar-nav navbar-right">
                            <!-- <li>
                                <a href="#">
                                    <i class="fa fa-facebook-square"></i>
                                    Facebook
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                    Twitter
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope"></i> 
                                    Email
                                </a>
                            </li> -->
                       </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-->
               
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a  href="checkapplication.php"><h3>待我审批</h3></a>
                    </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navigation-example-2">
                      <ul class="nav navbar-nav navbar-right">
                            <!-- <li>
                                <a href="#">
                                    <i class="fa fa-facebook-square"></i>
                                    Facebook
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                    Twitter
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope"></i> 
                                    Email
                                </a>
                            </li> -->
                       </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-->
               
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a href="application.php"><h3>我的申请</h3></a>
                    </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navigation-example-2">
                      <ul class="nav navbar-nav navbar-right">
                            <!-- <li>
                                <a href="#">
                                    <i class="fa fa-facebook-square"></i>
                                    Facebook
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                    Twitter
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope"></i> 
                                    Email
                                </a>
                            </li> -->
                       </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-->
               



                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a href="map/showsign.php"><h3>考勤</h3></a>
                    </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navigation-example-2">
                      <ul class="nav navbar-nav navbar-right">
                            <!-- <li>
                                <a href="#">
                                    <i class="fa fa-facebook-square"></i>
                                    Facebook
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                    Twitter
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope"></i> 
                                    Email
                                </a>
                            </li> -->
                       </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-->
                
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a  href="informandhistory/informindex.php"><h3>查询</h3></a>
                    </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navigation-example-2">
                      <ul class="nav navbar-nav navbar-right">
                            <!-- <li>
                                <a href="#">
                                    <i class="fa fa-facebook-square"></i>
                                    Facebook
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                    Twitter
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope"></i> 
                                    Email
                                </a>
                            </li> -->
                       </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-->
               
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a  href="sendfile/sendfile.php"><h3>发文</h3></a>
                    </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navigation-example-2">
                      <ul class="nav navbar-nav navbar-right">
                            <!-- <li>
                                <a href="#">
                                    <i class="fa fa-facebook-square"></i>
                                    Facebook
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                    Twitter
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope"></i> 
                                    Email
                                </a>
                            </li> -->
                       </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-->
                
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a  href="receive/receivefile.php"><h3>收文</h3></a>
                    </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navigation-example-2">
                      <ul class="nav navbar-nav navbar-right">
                            <!-- <li>
                                <a href="#">
                                    <i class="fa fa-facebook-square"></i>
                                    Facebook
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                    Twitter
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope"></i> 
                                    Email
                                </a>
                            </li> -->
                       </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-->
               
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                     <a  href="wechat/getcode.php"><h3>绑定微信</h3></a>
                    </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navigation-example-2">
                      <ul class="nav navbar-nav navbar-right">
                            <!-- <li>
                                <a href="#">
                                    <i class="fa fa-facebook-square"></i>
                                    Facebook
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                    Twitter
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope"></i> 
                                    Email
                                </a>
                            </li> -->
                       </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-->
               

                   
    <footer class="footer-demo section-dark">
    <div class="container">
       <!--  <nav class="pull-left">
            <ul>

                <li>
                    <a href="#">
                        Creative Tim
                    </a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com">
                       Blog
                    </a>
                </li>
                <li>
                    <a href="#/product/rubik">
                        Licenses 
                    </a>
                </li>
            </ul>
        </nav> -->
        <div class="copyright pull-right">
           版权所有 2017-<?php echo date("Y")?> all right resverved

        </div>
    </div>
</footer>
</body>
</html>