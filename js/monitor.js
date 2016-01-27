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