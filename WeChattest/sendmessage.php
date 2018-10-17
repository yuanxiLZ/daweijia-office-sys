<?php  

 //推送模板信息  参数：发送给谁的openid,客户姓名，客户电话，推荐楼盘（参数自定）
  function sendMessage($accesstoken,$openid,$info1,$info2,$info3,$backurl){
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
                "value"=>"您有新客户，请及时查看！",
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


$token="12_Jj39ILnVcJr0IXHR4op-Fs40o1myKTczNP2Q7ibqMrPHMTj_5tPRZ5ngDjw2YVKcG4tkGLzLrZLVgzmZUGbyXdE0GGnrGXiSH2kr2aEArRxPcq2BKWvfIKkyGpwQCFgAEAGSV";
$openid="oXZ1Pwp1R1O8GDffwx9jydHlNzNw";
$a="coder";
$b="测试！！";
$c="cc";
$url="www.baidu.com";

sendMessage($token,$openid,$a,$b,$c,$url);


?>