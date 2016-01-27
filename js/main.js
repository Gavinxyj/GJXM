$(document).ready(function(){	
		
		var tab = $('#tt').tabs('getTab',"总体预览");
		if(null !== tab) {
			$('#tt').tabs('select',"总体预览 ");
		} else {
			var content = '<iframe scrolling="auto" frameborder="0" src="templates/main.html" style="width:100%;height:100%;overflow-x:hidden;overflow:auto;" id="0"></iframe>';
			// tab
			$('#tt').tabs('add',{
				id: 0,
				title: "总体预览",
				content:content
			});
		}
		
		  $('#tt').tabs('select',"实时监控");
  });
  
