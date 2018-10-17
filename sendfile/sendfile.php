<?php
  header("Content-type: text/html;charset=utf-8");
  session_start();
  //    $_SESSION['userID'];
      $name=$_SESSION['name'];
      $department=$_SESSION['department'];
      $position=$_SESSION['position'];
      $LV=$_SESSION['LV'];



?>
<!DOCTYPE html>
<html>
<head>
   
   <meta charset="UTF-8">
  
   <title>智慧大魏家</title>
   <link rel="icon" type="image/png" href="../img/logo.png">
  <script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="../assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
<!--   <script src="../js/mobiscroll.custom.min.js" type="text/javascript"></script> -->
  <script src="../bootstrap3/js/bootstrap.js" type="text/javascript"></script>
   <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <!--  Plugins -->
  <!-- <script src="../assets/js/ct-paper-checkbox.js"></script>
  <script src="../assets/js/ct-paper-radio.js"></script> -->
  <script src="../assets/js/bootstrap-select.js"></script>
  <script src="../assets/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src='../js/selfdefin_function.js'></script>
  <script src="../assets/js/ct-paper.js"></script>    
  <script type="text/javascript" src='../js/test.js'></script>

  <script type="text/javascript" src='../js/mobiscroll.custom.min.js'></script>
  <!-- css-->

    <link href="../bootstrap3/css/bootstrap.css" rel="stylesheet" />
    
    <link href="../assets/css/demo.css" rel="stylesheet" /> 
   <!-- · -->

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
            
            
             <a href="../index.php"><button  class="btn btn-default btn-lg">主页</button></a>
            
            </div>
      
    </div>

<!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navigation-example-2">
      <ul class="nav navbar-nav navbar-right">
         
          
       </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-->
</nav>    


  <form action="submit.php" method="post" enctype="multipart/form-data">

 <!-- line start -->
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
                    <h3>文件标题</h3>
                      <input type="text" name="title">
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
                                    <i class="fa fa-facebook-square"></i>
                                    
                                </a>
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
                      <h3>发文时间</h3>  
                      <h4><input type="date" id="start_datetime" name="send_date"/></h4> 
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
                            <h3>主送机关</h3>  
                            <h4><input type="text" name="firstaddress" /></h4> 
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
                            <h3>抄送机关</h3>  
                            <h4><input type="text" name="secondaddress" /></h4> 
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
                            <h3>附件</h3>  
                            <h4><input type="file" name="file" /></h4> 
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
                           
                    </div>
                 <h3>正文内容</h3>  
                            <textarea name="content" style="width:200px; height:100px">
                              

                            </textarea>
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




                                    <!-- line start -->
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
                       <h3>审核人员</h3>
                      <h4>  <select name="cars" id="select_department">
               
                <option value="fiat" selected="selected">部门</option>
                <option value="办公室">办公室</option>
                <option value="主要领导">主要领导</option>
                <option value="分管领导">分管领导</option>
           
               
              </select></h4>、
                      ID:<input type="text" value="" placeholder="Inactive" class="form-control" readonly="readonly" id="checkid" name="checkid" />
                      姓名：<input type="text" value="" placeholder="Inactive" class="form-control" readonly="readonly" id="checkname" name="checkname" />
                       <div class="col-md-6" id="getname">
                                  
                       </div>
                      <div class="col-md-6" id="showname">
                                     已选择人员：
                      </div>    
                    </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navigation-example-2">
                      <ul class="nav navbar-nav">
                        <li>
                             
            <div class="col-md-6">
              
              
            
                        </li>
                        <li>
                                                       
                                   
                        </li>
                      </ul>
                      <ul class="nav navbar-nav navbar-right">
                            <li>
                               
                                    <i class="fa fa-facebook-square"></i>
                             
                                
                            </li>
                            <li>
                              
                                    <i class="fa fa-twitter"></i>
                             
                                
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


 <h4><input type="submit" name="submit" value="提交" /></h4>
  </form>
  



<footer>
  版权所有 2017-<?php echo date("Y")?> all right resverved

</footer>
</body>
   
</html>