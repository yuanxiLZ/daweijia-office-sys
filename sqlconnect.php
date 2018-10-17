
<?php
/*链接数据库文件*/ 
header("Content-type: text/html;charset=utf-8");
$link = mysqli_connect('localhost', 'root', '123456', 'daweijia','3306');


$query_cx="set names utf8";
mysqli_query($link, $query_cx);
 ?>