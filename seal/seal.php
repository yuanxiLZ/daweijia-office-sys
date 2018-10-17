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

   <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    

  <script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
  
  <!--  Plugins -->
  <script src="../assets/js/ct-paper-checkbox.js"></script>
  <script src="../assets/js/ct-paper-radio.js"></script>
  <script src="../assets/js/bootstrap-select.js"></script>
  <script src="../assets/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src='../js/selfdefin_function.js'></script>
  <script src="../assets/js/ct-paper.js"></script>    
  <!-- css-->

    <link href="../bootstrap3/css/bootstrap.css" rel="stylesheet" />
    
    <link href="../assets/css/demo.css" rel="stylesheet" /> 

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


  <form action="seal_submit.php" method="post" enctype="multipart/form-data">

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
                    <h3>用印事由</h3>
                      <textarea rows="6" cols="50" name="reason">

                                    </textarea>
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
                     <h3>印章类型</h3>
                       <h4><!-- <select name="type" >
                                        <option value="公章">党工委公章</option>
                                        <option value="合同章" selected="selected">办事处公章</option>
                                        <option value="党工委书记法人章" >党工委书记法人章</option>
                                        <option value="办事处主任法人章">办事处主任法人章</option>
                                        <option value="安委会章">安委会章</option>
                                        <option value="安委办章">安委办章</option>
                                    </select> -->
                                    <input name="type[]" type="checkbox" value="党工委公章">党工委公章
                                    <input name="type[]" type="checkbox" value="办事处公章">办事处公章
                                    <input name="type[]" type="checkbox" value="党工委书记法人章">党工委书记法人章
                                    <input name="type[]" type="checkbox" value="办事处主任法人章">办事处主任法人章
                                    <input name="type[]" type="checkbox" value="安委会章">安委会章
                                    <input name="type[]" type="checkbox" value="安委办章">安委办章
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
                     <h3>文件上传</h3>
                     <h4><input type="file" name="file" id="file"></h4>
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
                     <h3>文件份数</h3>
                     <h4><input type="text" value="" placeholder="Inactive" class="form-control" name="number" /> 
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
                      <h3>用印日期</h3>  
                      <input  type="date" name="sdate" />
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
                                      <h4>
                                       
                                      </h4>
                                     
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
                     <h3>审批人</h3>
                       ID:<input type="text" value="" placeholder="Inactive" class="form-control" readonly="readonly" id="sealid" name="sperson" />
                        <h4>  <select name="cars" id="select_leader1">
               
                                        <option value="" selected="selected">名单</option>
                                        <option value="于清泉">于清泉</option>
                                        <option value="葛茂柱">葛茂柱</option>
                                        <option value="于文英">于文英</option>
                                        <option value="贾清生">贾清生</option>
                                        <option value="郑国伟">郑国伟</option>
                                        <option value="于广超">于广超</option>
                                        <option value="姜成洋">姜成洋</option>
                                       
                                      </select></h4>
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


    <h4><input type="submit" name="submit" value="提交" /></h4>
  </form>
  



<footer>
  版权所有 2017-<?php echo date("Y")?> all right resverved

</footer>
</body>
   
</html>