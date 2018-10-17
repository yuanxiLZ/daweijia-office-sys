

function login()	//Ajax登陆
{ 
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request");
 return
 }

var url="login.php";
/*url=url+"?q="+str
url=url+"&sid="+Math.random()*/

xmlHttp.open("POST",url,true);

xmlHttp.onreadystatechange=stateChanged;
xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlHttp.send("name="+document.getElementById("name").value+"&password="+document.getElementById("password").value);
// document.cookie="name="+document.getElementById("name").value
// document.cookie="password="+document.getElementById("password").value
addCookie('name',document.getElementById("name").value,Infinity)
addCookie('password',document.getElementById("password").value,Infinity)
}

function addCookie(objName,objValue,objDays){ ///设置cookie
var str = objName + "=" + escape(objValue);
console.log(Infinity);   //Infinity
console.log(typeof Infinity);   //number
console.log(Infinity.constructor); //function Number() { [native code] }
if(objDays > 0){
var date = new Date();
var ms = objDays*24*3600*1000;
date.setTime(date.getTime() + ms);
str += "; expires=" + date.toGMTString();
}
if(objDays===Infinity){
  str += "; expires=Fri, 31 Dec 9999 23:59:59 GMT";
}
 
str += "; path=/";
document.cookie = str;
};



function logincookie(name,password)  //cookieAjax登陆
{ 
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request");
 return
 }

var url="login.php";
/*url=url+"?q="+str
url=url+"&sid="+Math.random()*/

xmlHttp.open("POST",url,true);

xmlHttp.onreadystatechange=stateChanged;
xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlHttp.send("name="+name+"&password="+password);

}

function getCookie(objName)
  {//获取指定名称的cookie的值   
                var arrStr = document.cookie.split("; ");   
                for (var i = 0; i < arrStr.length; i++) {   
                    var temp = arrStr[i].split("=");   
                    if (temp[0] == objName)   
                        return unescape(temp[1]);   
                }   
            }   

 function delCookie(name) {  //删除指定cookie
        var exp = new Date();  
        exp.setTime(exp.getTime() - 60 * 60 * 1000);  
        var cval = getCookie(name);  
        if (cval != null)  
            document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString() + ";path=/";  
    }  
 
function clearAllCookie() {  //删除所有cookie
                var keys = document.cookie.match(/[^ =;]+(?=\=)/g);  
                if(keys) {  
                    for(var i = keys.length; i--;)  
                        document.cookie = keys[i] + '=0;expires=' + new Date(0).toUTCString()  
                }  
            }  


function load()//cookie登陆
  {   var name = getCookie("name")
      var password = getCookie("password")
     
      
      logincookie(name,password);
  }



function checkCookie()//检测cookie状态
{ 
  var username=document.cookie
 

  if (username!="")
  {
    // alert("Welcome again " + username);
    load();
  }
  
}


function stateChanged() 
{ 
if ((xmlHttp.readyState==4 || xmlHttp.readyState=="complete")&&(xmlHttp.status==200))
 { 
 		
 		document.getElementById("error_text").innerHTML=xmlHttp.responseText;
 		//setTimeout("window.location.href = 'index.html'",500);
 		var x=xmlHttp.responseText
 		
 		if(x.indexOf("success")!=-1) {
 			setTimeout("window.location.href = 'index.php'",500);
 		}

 		
 	
 } 
}

function GetXmlHttpObject()	//创建请求
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}

function formReset()//重置表单
{

document.getElementById("name").value="";
document.getElementById("password").value="";
}


function logout_confirm()//注销账号
{
	var x=confirm("确定重新登陆吗")
	if (x==true)
  {
  delCookie("name"); 
  delCookie("password");  
  clearAllCookie()
  window.location.href="login_ajax.php";
  
  
  }
else
  {
 	//nothing
  }
}
$(document).ready(function(){       //ajax选择部门人员名单

  $("#select_department").change(function(){

   $.post("../select_department.php",
  {
    
    department:$(this).val()
  },
  function(data){
    $("#getname").html(data);
    
  });
  });
});


$(document).ready(function(){       //审批ajax选择1级别人员名单

  $("#select_leader1").change(function(){

   $.post("../select_leader1.php",
  {
    
    name:$(this).val()
  },
  function(data){
    $("#sealid").val(data);

    
  });
  });
});


$(document).ready(function(){       //审批ajax选择3级别人员名单

  $("#select_leader3").change(function(){

   $.post("../select_leader3.php",
  {
    
    name:$(this).val()
  },
  function(data){
    $("#sealid").val(data);

   
  });
  });
});



$(document).ready(function(){       //审批ajax选择人员名单

  $("#select").change(function(){

   $.post("../select_list.php",
  {
    
    name:$(this).val()
  },
  function(data){
    var txt=data.split('_')
    $("#checkid").val(txt[0]+"_");
    $("#checkname").val(txt[1]+"_");
   
  });
  });
});



$(document).ready(function(){//Jquery事件绑定 添加审核人
 
$("#getname").on("click", ".userinfo", function(){

alert($(this).text());
var txt = $(this).text();
var arr = $(this).text().split('_');
alert(arr[0]);
$("#checkid").val($("#checkid").val()+arr[0]+"_");
//$("#b").text(arr[1]);
$("#checkname").val($("#checkname").val()+arr[1]+"_");
$("#showname").append("<h4 class='showname'>"+txt+"</h4>");

});
});

$(document).ready(function(){
 //Jquery事件绑定 删除审核人
$("#showname").on("click", ".showname", function(){

var txt = $(this).text();
var arr = $(this).text().split('_');
alert(arr[0]);
var id=$("#checkid").val();
var name=$("#checkname").val();
id=id.replace(arr[0]+"_","");
name=name.replace(arr[1]+"_","");

alert(id);
$(this).remove();
$("#checkid").val(id);
$("#checkname").val(name);
});
});



// $(document).ready(function(){       //ajax查看会议室使用情况

//   $("#meetingdate").change(function(){

//    $.post("select_department.php",
//   {
    
//     department:$(this).val()
//   },
//   function(data){
//     $("#getname").html(data);
//     $.getScript('selfdefin_function.js');
//   });
//   });
// });







