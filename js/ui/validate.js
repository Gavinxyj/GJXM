/**
if(window.Event) {
	document.captureEvents(Event.MOUSEUP);
}

function nocontextmenu() { 
	event.cancelBubble = true 
	event.returnValue = false; 
	return false; 
} 

function norightclick(e) {
	if (window.Event) {
	  if (e.which == 2 || e.which == 3) 
	  return false; 
	} else if (event.button == 2 || event.button == 3) {
		event.cancelBubble = true 
		event.returnValue = false; 
		return false; 
	}
} 
document.oncontextmenu = nocontextmenu; // for IE5+ 
document.onmousedown = norightclick; // for all others 

**/

/*
* 校验按钮权限
*/
function validateBtnRight(funcId) {
	var params = {
		'funcId':funcId
	};
	$.ajax({
		type: 'post',
		url: '/sysmgmt/validateBtnsSubRight.action',
		data: params,
		dataType: 'text',
		success:function(data, textStatus) {
			var obj = jQuery.parseJSON(data);
			if(obj && obj.length > 0) {
				for(var j=0;j<obj.length;j++) {
					if($("#"+obj[j].limit_flag)) {
						$("#"+obj[j].limit_flag).hide();
					}
				}
			}
		}
	});
}

/*
* 校验数据权限
*/
function validateDataRight(createOprId) {
	var result;
	var params = {
		'bean.userId':createOprId
	};
	$.ajax({
		type: 'post',
		url: '/sysmgmt/validateDataRight.action',
		data: params,
		dataType: 'text',
		async: false,
		success: function(data, textStatus) {
			var obj = jQuery.parseJSON(data);
			result = obj.success;
		}
	});
	return result;
}

/*
* 校验请选择选项
*/
$.extend($.fn.validatebox.defaults.rules, {
    validNullSelect: {
        validator: function(value, param) {
            return ("--请选择--" != value && "" != value);  
        },
        message: '请选择相关记录'  
    }
});

/*
* 检查输入字符串是否只由英文字母和数字组成 
*/
$.extend($.fn.validatebox.defaults.rules, {
    isNumberOrLetter: {
        validator: function(value, param) {
        	var regu = "^[0-9a-zA-Z]+$";
		    var re = new RegExp(regu);
		    if (re.test(value)) {
		        return true;
		    } else {
		        return false;
		    }
        },
        message: '请输入字母或数字'  
    }
});

/*
* 检查输入手机号码是否正确
*/
$.extend($.fn.validatebox.defaults.rules, {
    checkMobile: {
        validator: function(value, param) {
        	var regu = /^[1][0-9]{10}$/;
		    var re = new RegExp(regu);
		    if (re.test(value)) {
		        return true;
		    } else {
		        return false;
		    }
        },
        message: '请输入正确的手机号码'  
    }
});

/*
* 校验ip地址的格式
*/
$.extend($.fn.validatebox.defaults.rules, {
    isIP: {
        validator: function(value, param) {
        	var regu = /^(\d+)\.(\d+)\.(\d+)\.(\d+)$/g;
		    var re = new RegExp(regu);
		    if (re.test(value)) {
		        if (RegExp.$1 < 256 && RegExp.$2 < 256 && RegExp.$3 < 256 && RegExp.$4 < 256) {
		            return true;
		        } else {
		        	return false;
		        }
		    } else {
		        return false;
		    }
        },
        message: '请输入正确的IP地址'  
    }
});
