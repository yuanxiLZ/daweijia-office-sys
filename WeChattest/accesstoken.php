<?php 
        header('Cache-Control:no-cache,must-revalidate');   
        header('Pragma:no-cache');   
        header("Expires:0"); 
// 		   function get_token(){



//                 $appid ="wxb83617b4598b4705";
//                 $appsec = "56e46d501126255278c5c0c20e2f35a1";
//                 $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$appsec}";
//               //初始化
// 			    $curl = curl_init();
// 			    //设置抓取的url
// 			    curl_setopt($curl, CURLOPT_URL, $url);
// 			    //设置头文件的信息作为数据流输出
// 			    //curl_setopt($curl, CURLOPT_HEADER, 1);
// 			    //设置获取的信息以文件流的形式返回，而不是直接输出。
// 			    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// 			    //执行命令
// 			     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//跳过证书验证
//  				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
// 			    $raw = curl_exec($curl);
// 			    //关闭URL请求
			    
// 			    //显示获得的数据
// 			  	echo $raw;



//                 // $raw = curl_get($url);
               
//                     $data = json_decode($raw,true);
//                     echo json_last_error();
                  
                    
//                         if(key_exists('access_token',$data)){
//                             return $data['access_token'];
//                         }else{
//                             return false;
//                             echo $raw;
//                         }
                  
//                curl_close($curl);
//         }


// $access_token=get_token();
// echo "凭证：".$access_token;

include("../wechat/wechatfunction.php");

check_token();

var_dump($_SESSION);



 ?>