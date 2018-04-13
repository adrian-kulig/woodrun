jQuery(document).ready(function(){
	jQuery('.frame a').fancybox({
        fitToView   : true,
		helpers	: {
            title   : null,
            buttons : null,
			thumbs	: null,
            media   : {}
		}
	});
    setInterval('slideToggle()', 5000);
});
function slideToggle(){
    var c = jQuery('#slider li').size();
    var o = jQuery('#slider li:visible');
    var i = (jQuery('#slider li').index(o) + 1)%c;
    jQuery('#slider li:eq('+i+')').show();
    o.css('z-index', 1).fadeOut(1000, function(){
        jQuery(this).css('z-index', '');
    });
}