<?php
    $appid='wxb83617b4598b4705';
    $redirect_uri = urlencode ( 'http://www.daweijia.cn/daweijia/demo/WeChattest/getuserInfo.php' );//将字符串以 URL 编码。
    $url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$redirect_uri&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect";
    header("Location:".$url);//header() 函数向客户端发送原始的 HTTP 报头。
?>