jQuery(document).ready(function(){
    jQuery('#albums div').click(function(){
        jQuery('a:first', jQuery(this).parent()).click();
    });
	jQuery('.thumbs a').fancybox({
		prevEffect	: 'fade',
		nextEffect	: 'fade',
        prevSpeed   : 'slow',
        nextSpeed   : 'slow',
        fitToView   : true,
		helpers	: {
            title   : {
                type: 'inside'
            },
            buttons : {},
			thumbs	: {
				width	: 70,
				height	: 50
			}
		}
	});
});