$(document).ready(function ()
{ 
	function autoSize() 
	{
			var maxWidth = Math.max(
				document.documentElement["clientWidth"],
				document.body["scrollWidth"], document.documentElement["scrollWidth"],
				document.body["offsetWidth"], document.documentElement["offsetWidth"]
			);
			
			document.getElementById("loginbox").style.height = ( document.documentElement["clientHeight"] - 90 ) +'px';
	}
		autoSize();
		window.onresize = autoSize;
	
	var userId = document.getElementById("userId");

	userId.onblur = function()
	{	
		if(this.value == "")
		{
			this.value = "请输入用户名";
		}
	};
	
	userId.onfocus = function()
	{
		if(this.value == "请输入用户名")
		{
			this.value = "";
		}
	};
	
	var pwd = document.getElementById("pwd");
	
	pwd.onblur = function()
	{
		if(this.value == "")
		{
			this.value = "请输入密码";
			password.style.display = "inline";
			this.style.display = "none";
		}
	};
	pwd.onfocus = function()
	{
		if(this.value == "请输入用户名")
		{
			this.value = "";
			this.style.display = "none";
			pwd.style.display = "inline";
			pwd.focus();
		}
	};
	
	var authCode = document.getElementById("authCode");
	
	authCode.onblur = function()
	{
		if(this.value == "")
		{
			this.value = "请输入验证码";
		}
	};
	
	authCode.onfocus = function()
	{
		if(this.value == "请输入验证码")
		{
			this.value = "";
		}
	}
});

$(window).load(function(){
			document.getElementById("userId").value = "请输入用户名";
			
			document.getElementById("pwd").value = "请输入密码";					
			
			document.getElementById("authCode").value = "请输入验证码";
});

function changeImg() {
			document.getElementById("authImg").src = "/images/captcha.png?" +  Math.random();
		}
		
document.onkeydown = function(event) {
	var e = event || window.event || arguments.callee.caller.arguments[0];
	if(e && e.keyCode==13) {
		 login();
	}
}; 