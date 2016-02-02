$(function() {
	PUI(".pui-tab").tab({
		 speed : "slow",
         showMode : "slide", 
		// cached : true,
		// ajax : true,
		// ajaxLoading : '<div class="pui-loading-spinner pui-animation-rotate
		// pui-animation-repeat pui-animation-reverse pui-text-center"><span
		// class="fa fa-spinner fa-2x"></span></div> 正在加载内容，请稍后...',
			callback : function(tab, tabHead, tabBox, index, settings) {

		}
	});
});

function deleteByCode(code)
{
	var xmlhttp;  
    // 创建XMLHttpRequest对象  
    if (window.XMLHttpRequest)  
    {// code for IE7+, Firefox, Chrome, Opera, Safari 现代浏览器  
        xmlhttp=new XMLHttpRequest();  
    }  
    else  
    {// code for IE6, IE5 用户低版本ie  
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");  
    }  
	if(confirm("你确定要删除序列号为"+code+"的光交箱吗？"))
	{		
		// 设置请求类型,请求地址，以及是否启用异步处理请求，大多数设置开启 true  
		xmlhttp.open("GET","rank.php?active=delete&code="+code,true);  
		// 将请求发送至服务器  
		xmlhttp.send();  
		// 处理onreadystatechange事件 我们规定当服务器响应已做好被处理的准备时所执行的任务  
		xmlhttp.onreadystatechange=function()  
		{  
			// 4,200 不知道可以看看上面我贴出来的介绍  
			if (xmlhttp.readyState==4 && xmlhttp.status==200)  
			{  
				var bRet = xmlhttp.responseText;
				if(bRet == true)
				{
				
					var tbody = document.getElementById("rank");
				
					var cell  = document.getElementById(code);
				
					tbody.removeChild(cell);
				}
			} 
		}
		return true;
	}
    
}