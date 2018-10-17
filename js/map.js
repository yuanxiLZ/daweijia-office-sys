	var map = new BMap.Map("map"); 
	//初始化打卡页面
	//ajax 获取打卡地点
	var site ="123455";
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request");

 }
 	var url="signmap.php";
 	xmlHttp.open("POST",url,true);
	xmlHttp.onreadystatechange=stateChanged1;
	xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlHttp.send("id="+document.getElementById("id").text);
	// 百度地图API功能
	//var map = new BMap.Map("map");    // 创建Map实例
	
 
	
function stateChanged1() 
{ 
if ((xmlHttp.readyState==4 || xmlHttp.readyState=="complete")&&(xmlHttp.status==200))
 { 
 		
 		site = xmlHttp.responseText
 		var locate=site.split(",");
	//var site ="121.704012,39.212237";
	
	var point =new BMap.Point(locate[0],locate[1]);
	map.centerAndZoom(point, 15);  // 初始化地图,设置中心点坐标和地图级别
	//添加地图类型控件
	map.addControl(new BMap.MapTypeControl({
		mapTypes:[
            BMAP_NORMAL_MAP,
            BMAP_HYBRID_MAP
        ]}));	  
	map.setCurrentCity("大连");          // 设置地图显示的城市 此项是必须设置的
	map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
	var circle = new BMap.Circle(point,500,{strokeColor:"blue", strokeWeight:2, strokeOpacity:0.5}); //创建圆
	map.addOverlay(circle);
	var label = new BMap.Label("打卡地点",{offset:new BMap.Size(20,-10)});
	var marker = new BMap.Marker(point);
	map.addOverlay(marker);              // 将标注添加到地图中
	marker.setLabel(label);
	var geolocation = new BMap.Geolocation();
	geolocation.getCurrentPosition(function(r){
		if(this.getStatus() == BMAP_STATUS_SUCCESS){
			var mk = new BMap.Marker(r.point);
			var convertor = new BMap.Convertor();
        	var pointArr = [];
        	pointArr.push(r.point);
        	
			map.addOverlay(mk);
			map.panTo(r.point);
			//alert('您的位置：'+r.point.lng+','+r.point.lat);
		}
		else {
			alert('failed'+this.getStatus());
		}        
	},{enableHighAccuracy: true})
 	
}

}


function signin(){//签到按钮
	
	
	var target=site.split(",");
	var pointA =new BMap.Point(target[0],target[1]);//打卡地点
	var pointB =new BMap.Point(0,0);
	var geolocation = new BMap.Geolocation();
	geolocation.getCurrentPosition(function(r){
		if(this.getStatus() == BMAP_STATUS_SUCCESS){
			pointB = r.point
			
			var distance = map.getDistance(pointA,pointB).toFixed(2)
	alert("距离打卡点:"+distance)
	if(distance>500){
		alert("打卡失败,距离打卡地点过远")
	}else{
		
		url="signsuccess.php"
		xmlHttp.open("POST",url,true);
		xmlHttp.onreadystatechange=stateChanged2;
		xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		
		xmlHttp.send("id="+document.getElementById("id").innerHTML);

	}
			// var mk = new BMap.Marker(r.point);
			// var convertor = new BMap.Convertor();
   //      	var pointArr = [];
   //      	pointArr.push(r.point);
        	
			// map.addOverlay(mk);
			// map.panTo(r.point);
			// alert('您的位置：'+r.point.lng+','+r.point.lat);
		}
		else {
			alert('failed'+this.getStatus());

		}        
	},{enableHighAccuracy: true})

}



function stateChanged2() 
{ 
if ((xmlHttp.readyState==4 || xmlHttp.readyState=="complete")&&(xmlHttp.status==200))
 { 
 	alert(xmlHttp.responseText)
 		
}

}




// 百度地图API功能
	// var map = new BMap.Map("allmap");
	// var point = new BMap.Point(116.331398,39.897445);
	// map.centerAndZoom(point,12);

	// var geolocation = new BMap.Geolocation();
	// geolocation.getCurrentPosition(function(r){
	// 	if(this.getStatus() == BMAP_STATUS_SUCCESS){
	// 		var mk = new BMap.Marker(r.point);
	// 		var convertor = new BMap.Convertor();
 //        	var pointArr = [];
 //        	pointArr.push(r.point);
 //        	convertor.translate(pointArr, 1, 5, translateCallback);
	// 		// map.addOverlay(mk);
	// 		// map.panTo(r.point);
	// 		// alert('您的位置：'+r.point.lng+','+r.point.lat);
	// 	}
	// 	else {
	// 		alert('failed'+this.getStatus());
	// 	}        
	// },{enableHighAccuracy: true})

	// translateCallback = function (data){
 //      if(data.status === 0) {
 //        var marker = new BMap.Marker(data.points[0]);
 //       map.addOverlay(marker);
 //        var label = new BMap.Label("转换后的百度坐标（正确）",{offset:new BMap.Size(20,-10)});
 //        marker.setLabel(label); //添加百度labels
 //        map.setCenter(data.points[0]);
 //        alert('您的位置：'+data.points[0].lng+','+data.points[0].lat);
 //      }
 //    }
	//关于状态码
	//BMAP_STATUS_SUCCESS	检索成功。对应数值“0”。
	//BMAP_STATUS_CITY_LIST	城市列表。对应数值“1”。
	//BMAP_STATUS_UNKNOWN_LOCATION	位置结果未知。对应数值“2”。
	//BMAP_STATUS_UNKNOWN_ROUTE	导航结果未知。对应数值“3”。
	//BMAP_STATUS_INVALID_KEY	非法密钥。对应数值“4”。
	//BMAP_STATUS_INVALID_REQUEST	非法请求。对应数值“5”。
	//BMAP_STATUS_PERMISSION_DENIED	没有权限。对应数值“6”。(自 1.1 新增)
	//BMAP_STATUS_SERVICE_UNAVAILABLE	服务不可用。对应数值“7”。(自 1.1 新增)
	//BMAP_STATUS_TIMEOUT	超时。对应数值“8”。(自 1.1 新增)