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
  <script src="../js/mobiscroll.custom.min.js" type="text/javascript"></script>
 <!--  <script src="../bootstrap3/js/bootstrap.js" type="text/javascript"></script> -->
   <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <!--  Plugins -->
  <!-- <script src="../assets/js/ct-paper-checkbox.js"></script>
  <script src="../assets/js/ct-paper-radio.js"></script> -->
  <!-- <script src="../assets/js/bootstrap-select.js"></script>
  <script src="../assets/js/bootstrap-datepicker.js"></script> -->
  <script type="text/javascript" src='../js/selfdefin_function.js'></script>
<!--   <script src="../assets/js/ct-paper.js"></script>    
  <script type="text/javascript" src='../js/test.js'></script> -->
<link href="../css/mobiscroll.custom.min.css" rel="stylesheet" type="text/css" />
 
  <!-- css-->

    <link href="../bootstrap3/css/bootstrap.css" rel="stylesheet" />
    
   <!--  <link href="../assets/css/demo.css" rel="stylesheet" />  -->
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
<form action="leave_submit.php" method="post" enctype="multipart/form-data">
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
                     
                                    <h4>
                                     <select name="type" >
                                      <option value="病假">病假</option>
                                      <option value="事假" selected="selected">事假</option>
                                      <option value="产假" >产假</option>
                                      <option value="丧假">丧假</option>
                                      <option value="带薪年假">带薪年假</option>
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
                      <h4><input type="text" id="start_datetime" name="start_datetime"/></h4> 
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
                            <h4><input type="text" id="end_datetime" name="end_datetime" /></h4> 
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
                      <h3>请假原因</h3>
                       <h4> <textarea rows="6" cols="50" name="reason" id="meetingcontent">

                                      </textarea></h4> 
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
                            <h3>备注</h3> 
                            <h4><textarea rows="6" cols="50" id="leaveremark" name="remark">

                                      </textarea></h4>
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
                              <h3>文件上传</h3>
                              <h4> <input type="file" name="file" id="file"></h4>
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
                     <h3>审核人</h3> 
                     <h4>部门</h4> 
                            <select name="cars" id="select_department">
                   
                                <option value="fiat" selected="selected">部门</option>
                                 <option value="主要领导">主要领导</option>
                                <option value="分管领导">分管领导</option>
                                <option value="办公室">办公室</option>
                               
                              </select>
                              <h4>人员名单</h4>
                                ID:<input type="text" value="" placeholder="Inactive" class="form-control" readonly="readonly" id="checkid"  name="checkid" />
                              <h4>姓名：<input type="text" value="" placeholder="Inactive" class="form-control" readonly="readonly" id="checkname" name="checkname" /></h4> 
                               <div class="col-md-6" id="showname">
                                       已选择人员：
                                  </div>  
                                  <div class="col-md-6" id="getname">
                                  
                                  </div>   
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
                               
                            </li>
                            <li>
                                 
                              
                            </li>
                            <li>
                                
                            </li>
                       </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-->
                </nav> 
                <!-- line end -->
        
            <!--   <h3>请假类型</h3>
               <select name="type" >
                <option value="病假">病假</option>
                <option value="事假" selected="selected">事假</option>
                <option value="产假" >产假</option>
                <option value="丧假">丧假</option>
               <option value="带薪年假">带薪年假</option>
              
               </select>
                         
       <h2>开始时间</h2>
      
            <div class="section">
          
          <input type="text" id="start_datetime" name="start_datetime" />
      

        </div>
         <h2>结束时间</h2>
       
            <div class="section">
         
          <input type="text" id="end_datetime" name="end_datetime" />
      

        </div>
    
            
              <h3>请假原因</h3>
              <div class="form-group">
                  <textarea rows="6" cols="50" name="reason" id="meetingcontent">

                  </textarea>
              </div>
           
     
           
            
                <h3>备注</h3>
               
              <textarea rows="6" cols="50" id="leaveremark" name="remark">

            </textarea>
            
             文件上传
            <input type="file" name="file" id="file"><br>
           
        
                <h3>审核人员</h3>
               
                  <h4>部门</h4>
                  <select name="cars" id="select_department">
                   
                    <option value="fiat" selected="selected">部门</option>
                    <option value="办公室">办公室</option>
                    <option value="lol">LOL</option>
                   
                  </select>
                  <h4>人员名单</h4>
                  ID:<input type="text" value="" placeholder="Inactive" class="form-control" readonly="readonly" id="checkid"  name="checkid" />
                  姓名：<input type="text" value="" placeholder="Inactive" class="form-control" readonly="readonly" id="checkname" name="checkname" />
                  <div class="col-md-6" id="showname">
                       已选择人员：
                  </div>    
                  <div class="col-md-6" id="getname">
                  
                  </div> 
     -->
     <h4><input type="submit" name="submit" value="提交" /></h4>
</form>

<footer>
  版权所有 2017-<?php echo date("Y")?> all right resverved

</footer>
</body>
 <script>

        var theme = "ios";
        var mode = "scroller";
        var display = "bottom";
        var lang="zh";


     
        // Date & Time demo initialization
        $('#start_datetime').mobiscroll().datetime({
            theme: theme,
            mode: mode,
            display: display,
            lang: lang,
            dateFormat:"yyyy-mm-dd",
            minDate: new Date(2000,3,10,9,22),
            maxDate: new Date(2030,7,30,15,44),
            stepMinute: 1
        });
         // Date & Time demo initialization
        $('#end_datetime').mobiscroll().datetime({
            theme: theme,
            mode: mode,
            display: display,
            lang: lang,
            dateFormat:"yyyy-mm-dd",
            minDate: new Date(2000,3,10,9,22),
            maxDate: new Date(2030,7,30,15,44),
            stepMinute: 1
        });


     
    </script>  
</html>