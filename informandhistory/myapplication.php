    <?php
    header("Content-type: text/html;charset=utf-8");
    include("../sqlconnect.php"); 

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
     <script type="text/javascript" src='../js/selfdefin_function.js'></script>
     <link href="../css/selfdefinedcss.css" rel="stylesheet" /> 
   <title>智慧大魏家</title>
     <link rel="icon" type="image/png" href="img/logo.png">
     <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    
    
    <link href="../bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="../assets/css/demo.css" rel="stylesheet" /> 


    
  <script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="../assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

  <script src="../bootstrap3/js/bootstrap.js" type="text/javascript"></script>
  
  <!--  Plugins -->
  <script src="../assets/js/ct-paper-checkbox.js"></script>
  <script src="../assets/js/ct-paper-radio.js"></script>
  <script src="../assets/js/bootstrap-select.js"></script>
  <script src="../assets/js/bootstrap-datepicker.js"></script>
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
            
             <a href="../index.php"><button  class="btn btn-simple">主页</button></a>
            
            </div>
      
    </div>

<!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navigation-example-2">
      <ul class="nav navbar-nav navbar-right">
         
          
       </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-->
</nav>         
      

    <div >
       
                  <div class="row">
                    <div class="col-md-6">
                        <div class="tim-title">
                            <h3>查询条件</h3>
                        </div>
                        <br>
                     <!-- Collect the nav links, forms, and other content for toggling -->
                    <form action="applicationhistory.php" method="post" enctype="multipart/form-data">
                    <nav class="navbar navbar-default" role="navigation-demo">
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                     <h3>查询类型</h3>
                                    <input type="hidden" name="id" <?php echo "value='{$id}'"; ?> />
                                    <h4>    
                                      <select name="type" >
                                      <option value="seal">印章</option>
                                      <option value="holiday" selected="selected">请假</option>
                                      <option value="meetingroom" >会议室</option>
                                     </select>
                                   </h4>
                                   </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navigation-example-2">
                      <ul class="nav navbar-nav">
                        <li>
                           
                        </li>
                        <li>
                            
                        </li>
                      </ul>
                      <ul class="nav navbar-nav navbar-right">
                            
                                
                                   
                         
                                
                            
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                   
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope"></i> 
                                    
                                </a>
                            </li>
                       </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-->
                </nav> 
                <!-- line end -->

                 <nav class="navbar navbar-default" role="navigation-demo">
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <h3>开始时间</h3>  
                         <h4><input type="date" id="start_datetime" name="start_datetime"/></h4> 
                      
                    </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navigation-example-2">
                      <ul class="nav navbar-nav">
                        <li>
                           
                        </li>
                        <li>
                            
                        </li>
                      </ul>
                      <ul class="nav navbar-nav navbar-right">
                            <li>
                               
                                    <i class="fa fa-facebook-square"></i>
                                 
      
                                
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope"></i> 
                                    
                                </a>
                            </li>
                       </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-->
                </nav> 
                <!-- line end -->
                 <nav class="navbar navbar-default" role="navigation-demo">
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                            <h3>结束时间</h3>  
                             <h4><input type="date" id="end_datetime" name="end_datetime" /></h4> 
                    </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navigation-example-2">
                      <ul class="nav navbar-nav">
                        <li>
                           
                        </li>
                        <li>
                            
                        </li>
                      </ul>
                      <ul class="nav navbar-nav navbar-right">
                            <li>
                                
                                    <i class="fa fa-facebook-square"></i>
                                                              
                                
                                
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                   
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope"></i> 
                                    
                                </a>
                            </li>
                       </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-->
                </nav> 
                <!-- line end -->
              
      <input type="submit" name="submit" value="Submit" /> 
</form>
                       

                    </div>
                    <div class="col-md-6">
                    </div>
                </div> <!-- end row -->
               

    </div>
  
   
</body>
</html>
  <script type="text/javascript" src='../js/selfdefin_function.js'></script>
 <script type="text/javascript" src='../js/map.js'></script>
