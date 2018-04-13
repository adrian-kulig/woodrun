jQuery(document).ready(function(){

	jQuery('.reservation a').fancybox({
        width   : 702,
        height  : 752,
        padding : 0,
        type    : 'iframe',
        autoSize: false,
		helpers	: {
            title   : null
		}
	});
	
	jQuery('a[href$=".jpg"], a[href$=".jpeg"], a[href$=".png"], a[href$=".gif"]').attr('rel','gallery').fancybox({

	});	
	
});