$(document).ready(function(){	
  	//树
  	$("#userMgr").tree({
  		url:'treeJson.json',
  		"animate":true,
  		"checkbox":false,
  		//定义是否只有叶子节点有checkbox
  		onlyLeafCheck:true,
  		dnd:true,
  		//点击菜单时触发
  		onClick:function(node){
  						if(typeof(node.attributes.url)=="undefined")
  						{
  							alert("URL未定义");
  						}else
  						{
  							var tab = $('#tt').tabs('getTab',node.text);
							if(null !== tab) {
								$('#tt').tabs('select',node.text);
							} else {
								var content = '<iframe scrolling="auto" frameborder="0" src="'+node.attributes.url+'" style="width:100%;height:100%;overflow-x:hidden;overflow:auto;" id="'+node.id+'"></iframe>';
								//tab
								$('#tt').tabs('add',{
									id: node.id,
									title: node.text,
									content:content,
									selected: true,
									closable: true
									
								});
							}
  						}
						
  		}
  	});
  	$("#areaMgr").tree({
  		url:'areaJson.json',
  		"animate":true,
  		"checkbox":false,
  		//定义是否只有叶子节点有checkbox
  		onlyLeafCheck:true,
  		dnd:true,
  		//点击菜单时触发
  		onClick:function(node){
  						if(typeof(node.attributes.url)=="undefined")
  						{
  							alert("URL未定义");
  						}else
  						{
  							var tab = $('#tt').tabs('getTab',node.text);
							if(null !== tab) {
								$('#tt').tabs('select',node.text);
							} else {
								var content = '<iframe scrolling="auto" frameborder="0" src="'+node.attributes.url+'" style="width:100%;height:100%;overflow-x:hidden;overflow:auto;" id="'+node.id+'"></iframe>';
								//tab
								$('#tt').tabs('add',{
									id: node.id,
									title: node.text,
									content:content,
									selected: true,
									closable: true
									
								});
							}
  						}
						
  		}
  	});
	$("#roadMgr").tree({
  		url:'roadJson.json',
  		"animate":true,
  		"checkbox":false,
  		//定义是否只有叶子节点有checkbox
  		onlyLeafCheck:true,
  		dnd:true,
  		//点击菜单时触发
  		onClick:function(node){
  						if(typeof(node.attributes.url)=="undefined")
  						{
  							alert("URL未定义");
  						}else
  						{
  							var tab = $('#tt').tabs('getTab',node.text);
							if(null !== tab) {
								$('#tt').tabs('select',node.text);
							} else {
								var content = '<iframe scrolling="auto" frameborder="0" src="'+node.attributes.url+'" style="width:100%;height:100%;overflow-x:hidden;overflow:auto;" id="'+node.id+'"></iframe>';
								//tab
								$('#tt').tabs('add',{
									id: node.id,
									title: node.text,
									content:content,
									selected: true,
									closable: true
									
								});
							}
  						}
						
  		}
  	});
	$("#boxMgr").tree({
  		url:'boxJson.json',
  		"animate":true,
  		"checkbox":false,
  		//定义是否只有叶子节点有checkbox
  		onlyLeafCheck:true,
  		dnd:true,
  		//点击菜单时触发
  		onClick:function(node){
  						if(typeof(node.attributes.url)=="undefined")
  						{
  							alert("URL未定义");
  						}else
  						{
  							var tab = $('#tt').tabs('getTab',node.text);
							if(null !== tab) {
								$('#tt').tabs('select',node.text);
							} else {
								var content = '<iframe scrolling="auto" frameborder="0" src="'+node.attributes.url+'" style="width:100%;height:100%;overflow-x:hidden;overflow:auto;" id="'+node.id+'"></iframe>';
								//tab
								$('#tt').tabs('add',{
									id: node.id,
									title: node.text,
									content:content,
									selected: true,
									closable: true
									
								});
							}
  						}
						
  		}
  	});
 	/*	$('#tt').tabs({
				onSelect:function(title){
					
					var selectTab=$("#tt").tabs('getSelected');
					var tabOptions=selectTab.panel('options');
					if(tabOptions.title=='首页')
					{
						alert("欢迎回到首页");
						if(confirm("是否关闭其他所有tab?"))
						{
							var allTabs=$("#tt").tabs('tabs');
							for(var i=0;i<allTabs.length;i++)
							{
								if(allTabs[i].panel('options').title!='首页')
								$("#tt").tabs('close',allTabs[i].panel('options').title);
							}
						}
						
					}
										
				}
		}); 	*/
  
  });
  
  //删除选择的菜单节点
  $("#removeOneTreeNode").bind('click',function(){
  		$("#menuTree").tree('remove',$("#menuTree").tree('getSelected').target);
  });