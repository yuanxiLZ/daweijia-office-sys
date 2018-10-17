<?php 


function check_token(){  //自动检测，刷新access_token
			  $json_string = file_get_contents('wechatfile/access_token.json');
			  $data = json_decode($json_string, true);


			if (strtotime("now")>=$data["time"]) {
				# code...
				$token=get_token();	
				$accesstoken=array("access_token"=>$token,"time"=>strtotime("+1.8 hours"));
				echo "array:".$accesstoken['access_token'];
                $json_string = json_encode($accesstoken);
				file_put_contents("wechatfile/access_token.json", $json_string);

					
	               
    				$_SESSION['access_token']=$token;
                    echo "new token";
   		           return $token;
    
			}else{
                
				
	
    			$_SESSION['access_token']=$data["access_token"];
                    echo "old token";
                    return $data['access_token'];
			}


}


function check_tokens(){  //自动检测，刷新access_token
              $json_string = file_get_contents('../wechatfile/access_token.json');
              $data = json_decode($json_string, true);


            if (strtotime("now")>=$data["time"]) {
                # code...
                $token=get_token(); 
                $accesstoken=array("access_token"=>$token,"time"=>strtotime("+1.8 hours"));
                echo "array:".$accesstoken['access_token'];
                $json_string = json_encode($accesstoken);
                file_put_contents("../wechatfile/access_token.json", $json_string);

                    
                   
                    $_SESSION['access_token']=$token;
                    echo "new token";
                   return $token;
    
            }else{
                
                
    
                $_SESSION['access_token']=$data["access_token"];
                    echo "old token";
                    return $data['access_token'];
            }


}








function get_token(){  //获取access_woken



                $appid ="wxb83617b4598b4705";
                $appsec = "56e46d501126255278c5c0c20e2f35a1";
                $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$appsec}";
              //初始化
			    $curl = curl_init();
			    //设置抓取的url
			    curl_setopt($curl, CURLOPT_URL, $url);
			    //设置头文件的信息作为数据流输出
			    //curl_setopt($curl, CURLOPT_HEADER, 1);
			    //设置获取的信息以文件流的形式返回，而不是直接输出。
			    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

			    //执行命令
			     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//跳过证书验证
 				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
			   
                


                $raw = curl_exec($curl);
			    //关闭URL请求
			

                curl_close($curl);
			    //显示获得的数据
			  	
			  	echo $raw;



                // $raw = curl_get($url);
               
                    $data = json_decode($raw,true);
                    echo json_last_error();
                  
                        if(key_exists('access_token',$data)){
                            return $data['access_token'];
                        }else{
                            return false;
                        }
                    
               curl_close($curl);
        }

        //end function


        function getcode($backurl,$id){     //获取微信code

             $appid='wxb83617b4598b4705';
            $redirect_uri = urlencode ($backurl );//将字符串以 URL 编码。
            $url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$redirect_uri&response_type=code&scope=snsapi_userinfo&state=$id#wechat_redirect";
            header("Location:".$url);//header() 函数向客户端发送原始的 HTTP 报头。




        }










         function getopenid(){
             header("content-type:text/html;charset=utf-8");
                $code = $_GET["code"];//预定义的 $_GET 变量用于收集来自 method="get" 的表单中的值。
                if (isset($_GET['code'])){//判断code是否存在
                    $openid = getUserInfo($code);
                    $wechatname = $userinfo['nickname'];//获取nickname对应的值,即用户名
                    print '<h2 style="text-align:center">openid：'.$openid.'</h2>';//打印输出
                    return $openid;
                }else{
                    echo "NO CODE";
                }



        
    }
   
    
    function getUserInfo($code)
    {
        $appid = "wxb83617b4598b4705";
        $appsecret = "56e46d501126255278c5c0c20e2f35a1";

        //Get access_token
        $access_token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$appsecret&code=$code&grant_type=authorization_code";
        $access_token_json = https_request($access_token_url);//自定义函数
        $access_token_array = json_decode($access_token_json,true);//对 JSON 格式的字符串进行解码，转换为 PHP 变量，自带函数
        //获取access_token
        $access_token = $access_token_array['access_token'];//获取access_token对应的值
        //获取openid
        $openid = $access_token_array['openid'];//获取openid对应的值

        echo "openid:".$openid;

        // //Get user info
        // $userinfo_url = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid";
        // $userinfo_json = https_request($userinfo_url);
        // $userinfo_array = json_decode($userinfo_json,ture);
        return $openid;
    }

    






    function https_request($url)//自定义函数,访问url返回结果
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl,  CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);
        if (curl_errno($curl)){
            return 'ERROR'.curl_error($curl);
        }
        //curl_close($curl);
       
        echo $data;
        return $data;
    }







    function get_openid($id){


if (!$link){
    echo"alert('数据库连接失败！')";
}else {
      
        $query = "SELECT * FROM userinfo WHERE userID = '$id' ";
        if ($row=mysqli_query($link, $query)){
        echo "success";
        return $row['openid'];
        
     }else{
         echo("Errorcode: " . mysqli_errno($link));
     }
          
    }


    }



function sendstarter($link,$accesstoken,$name,$info,$info1,$info2,$info3,$backurl){

if ($info2==1) {
   # code...
  $info2="同意";

 }else{
  $info2="不同意";
 }
if (!$link){
    echo"alert('数据库连接失败！')";
}else {
      
        $query = "select * from userinfo where name = '$name' ";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
   
          
        
    }
$token=check_tokens();
echo "token:".$token;
sendMessage($token,$row['openid'],$info,$info1,$info2,$info3,$backurl);




}



function sendcheck($link,$accesstoken,$nextid,$info,$info1,$info2,$info3,$info4,$backurl){
if ($nextid=="none") {
    # code...
    return "0";
}
if (!$link){
    echo"alert('数据库连接失败！')";
}else {
      
        $query = "select * from userinfo where userID = '$nextid' ";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
   
          
          mysqli_close($link);
    }

    $openid=$row['openid'];
    echo $openid;
$token=check_tokens();
echo "token:".$token;
sendMessage1($token,$openid,$info,$info1,$info2,$info3,$info4,$backurl);


}


function sendmission($link,$accesstoken,$nextid,$info,$info1,$info2,$info3,$info4,$backurl){

if (!$link){
    echo"alert('数据库连接失败！')";
}else {
      
        $query = "select * from userinfo where userID = '$nextid' ";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        var_dump($row);
          
         // mysqli_close($link);
         echo("Errorcode: " . mysqli_errno($link)); 
    }

    $openid=$row['openid'];
    echo $openid;

$token=check_tokens();
echo "token:".$token;
sendMessage2($token,$openid,$info,$info1,$info2,$info3,$info4,$backurl);


}



    //推送模板信息(申请人)   审批进度通知
  function sendMessage($accesstoken,$openid,$info,$info1,$info2,$info3,$backurl){
    //获取全局token
    $token = $accesstoken;
    $url="https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$token; //模板信息请求地址
    //发送的模板信息(微信要求json格式，这里为数组（方便添加变量）格式，然后转为json)
    $post_data = array(
        "touser"=>$openid, //推送给谁,openid
        "template_id"=>"8ZTlu9BYr5TWVv6cUkE-EaEZdjAY9IxaR46DobCuQtE", //微信后台的模板信息id
        "url"=>$backurl, //下面为预约看房模板示例
        "data"=> array(
            "first" => array(
                "value"=>$info,
                //"color"=>"#173177"
            ),
            "keyword1"=>array(
                "value"=>$info1, //传的变量
                //"color"=>"#173177"
            ),
            "keyword2"=>array(
                "value"=>$info2,
                //"color"=>"#173177"
            ),
            "keyword3"=> array(
                "value"=>$info3,
                //"color"=>"#173177"
            ),
            "keyword4"=> array(
                "value"=>date('Y-m-d H:i:s'),
                //"color"=>"#173177"
            ),
            "remark"=> array(
                "value"=>"check！",
                "color"=>"#173177"
            ),
        )
    );
   //将上面的数组数据转为json格式
    $post_data = json_encode($post_data);
$curl = curl_init();//创建curl请求
curl_setopt($curl, CURLOPT_URL,$url); //设置发送数据的网址
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); //设置有返回值，0，直接显示
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); //禁用证书验证
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);//post请求发送的数据包
    //接收执行返回的数据
    $data = curl_exec($curl);
    echo "data:".$data;
    //关闭句柄
    curl_close($curl);
    $data = json_decode($data,true); //将json数据转成数组
    return $data;
  }





  //推送模板信息(审批人)    办公审批提醒
   function sendMessage1($accesstoken,$openid,$info,$info1,$info2,$info3,$info4,$backurl){
    //获取全局token
    $token = $accesstoken;
    $url="https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$token; //模板信息请求地址
    //发送的模板信息(微信要求json格式，这里为数组（方便添加变量）格式，然后转为json)
    $post_data = array(
        "touser"=>$openid, //推送给谁,openid
        "template_id"=>"rXMfe47i73tX3fsyos_rg7HgQG4raIYwvwwpNnSpIzc", //微信后台的模板信息id
        "url"=>$backurl, //下面为预约看房模板示例
        "data"=> array(
            "first" => array(
                "value"=>$info,
                //"color"=>"#173177"
            ),
            "keyword1"=>array(
                "value"=>$info1, //传的变量
                //"color"=>"#173177"
            ),
            "keyword2"=>array(
                "value"=>$info2,
                //"color"=>"#173177"
            ),
            "keyword3"=> array(
                "value"=>$info3,
                //"color"=>"#173177"
            ),
            "keyword4"=> array(
                "value"=>$info4,
                //"color"=>"#173177"
            ),
             "keyword5"=> array(
                "value"=>date('Y-m-d H:i:s'),
                //"color"=>"#173177"
            ),
            "remark"=> array(
                "value"=>"check！",
                "color"=>"#173177"
            ),
        )
    );
   //将上面的数组数据转为json格式
    $post_data = json_encode($post_data);
$curl = curl_init();//创建curl请求
curl_setopt($curl, CURLOPT_URL,$url); //设置发送数据的网址
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); //设置有返回值，0，直接显示
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); //禁用证书验证
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);//post请求发送的数据包
    //接收执行返回的数据
    $data = curl_exec($curl);
    echo "data:".$data;
    //关闭句柄
    curl_close($curl);
    $data = json_decode($data,true); //将json数据转成数组
    return $data;
  }






   //推送模板信息   工作任务提醒
   function sendMessage2($accesstoken,$openid,$info,$info1,$info2,$info3,$info4,$backurl){
    //获取全局token
    $token = $accesstoken;
    $url="https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$token; //模板信息请求地址
    //发送的模板信息(微信要求json格式，这里为数组（方便添加变量）格式，然后转为json)
    $post_data = array(
        "touser"=>$openid, //推送给谁,openid
        "template_id"=>"E5X9Q4AD-py_icICwKyLgE1VVV-wbr5DYUaSkie70hA", //微信后台的模板信息id
        "url"=>$backurl, //下面为预约看房模板示例
        "data"=> array(
            "first" => array(
                "value"=>$info,
                //"color"=>"#173177"
            ),
            "keyword1"=>array(
                "value"=>$info1, //传的变量
                //"color"=>"#173177"
            ),
            "keyword2"=>array(
                "value"=>$info2,
                //"color"=>"#173177"
            ),
            "keyword3"=> array(
                "value"=>$info3,
                //"color"=>"#173177"
            ),
           
            "remark"=> array(
                "value"=>$info4,
                "color"=>"#173177"
            ),
        )
    );
   //将上面的数组数据转为json格式
    $post_data = json_encode($post_data);
$curl = curl_init();//创建curl请求
curl_setopt($curl, CURLOPT_URL,$url); //设置发送数据的网址
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); //设置有返回值，0，直接显示
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); //禁用证书验证
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);//post请求发送的数据包
    //接收执行返回的数据
    $data = curl_exec($curl);
    echo "data:".$data;
    //关闭句柄
    curl_close($curl);
    $data = json_decode($data,true); //将json数据转成数组
    return $data;
  }





 ?>