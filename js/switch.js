var status = 1;
var Menus = new DvMenuCls;

document.onclick=Menus.Clear;
function switchSysBar(){
	var switchPoint=document.getElementById("switchPoint");
	var frmTitle=document.getElementById("frmTitle");
    var frmsq=document.getElementById("frmsq");
     if (1 == window.status){
		  var maxWidth = Math.max(
				document.documentElement["clientWidth"],
				document.body["scrollWidth"], document.documentElement["scrollWidth"],
				document.body["offsetWidth"], document.documentElement["offsetWidth"]
			);
		  window.status = 0;
		  //alert(switchPoint);
		  //document.getElementById("switchbox").style.left=12+'px';
		  //frmTitle.style.width=12+'px';
		  frmTitle.style.display="none";
		  //frmsq.style.display="block";
          switchPoint.style.backgroundImage = 'url(/images/switch_left.png)';
		  switchPoint.style.left=-2+'px';
		  document.getElementById("contents").style.width =( maxWidth - 20) +'px';
		  
     }
     else{
		  var maxWidth = Math.max(
				document.documentElement["clientWidth"],
				document.body["scrollWidth"], document.documentElement["scrollWidth"],
				document.body["offsetWidth"], document.documentElement["offsetWidth"]
			);
		  window.status = 1;
          //document.getElementById("switchbox").style.left=0+'px';
		  //frmTitle.style.width=200+'px';
		  switchPoint.style.backgroundImage = 'url(/images/switch_right.png)'; 
		  switchPoint.style.left=-13+'px';
		  //frmsq.style.display="none";
		  frmTitle.style.display="block";
		  document.getElementById("contents").style.width =( maxWidth - 208) +'px';
		  
     }
}

