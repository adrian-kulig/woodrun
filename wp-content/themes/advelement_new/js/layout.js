Cufon.replace('#sport h3, #offer > h3, #nav a, #list-all, #slogan h2, #slogan h1, #authors h3, .sidebar h3, #blog-sidebar h3, .price, .single-entry > a:first-child, .single-entry h3, .single-entry h1, .single-entry h2, #friends h3, legend, .page-kontakt #content h2, #logotype h3, .post-list .more a');
jQuery(document).ready(function(){
    //setInterval('slideForward()', 3000);
    
    jQuery('input[type=text], textarea').focus(function(){
        if(jQuery(this).val() == jQuery(this)[0].defaultValue) jQuery(this).val('');
    }).blur(function(){
        if(jQuery(this).val() == '') jQuery(this).val(jQuery(this)[0].defaultValue);
    });
    
    jQuery('select[name=cat]').change(function(){
        c = jQuery('select[name=cat]:eq(0)').val();
        d = jQuery('select[name=cat]:eq(1)').val();
        jQuery('input#cat').val(c+','+d);
    }).change();
    
    jQuery('.sidebar form').submit(function(){
        jQuery('select', this).attr('name', '');
    });
    
    if(jQuery().vForm) jQuery('.form fieldset input, .form fieldset select, .page-kontakt input, .page-kontakt select').vForm();
    
    jQuery('.wpcf7-form br').remove();
    
    jQuery('#nav li').mouseenter(function(){
        jQuery(this).children('span').animate({height: '37px'}, 150);
    }).mouseleave(function(){
        if(jQuery(this).hasClass('current')) return false;
        jQuery(this).children('span').animate({height: '0px'}, 150);
    }).each(function(){
        jQuery(this).append('<span><a href="' + jQuery('a', this).attr('href') + '" title="' + jQuery('a', this).attr('title') + '">' + jQuery('a', this).text() + '</a></span>');
    });
    
    jQuery('#list-all').mouseenter(function(){
        jQuery(this).animate({'height' : '+=5px'}, 100);
    }).mouseleave(function(){
        jQuery(this).animate({'height' : '-=5px'}, 100);
    });
    
    jQuery('.single-entry > a:first-child').mouseenter(function(){
        jQuery(this).animate({'padding-top' : '+=5px'}, 100);
    }).mouseleave(function(){
        jQuery(this).animate({'padding-top' : '-=5px'}, 100);
    });
    
    jQuery('.reservation').mouseenter(function(){
        jQuery('a, span', this).animate({'left': '10px'}, 150);
    }).mouseleave(function(){
        jQuery('a, span', this).animate({'left': '0px'}, 150);
    });

    
    Cufon.replace('#nav span a');
    jQuery('#nav .current').mouseenter();
});
function slideForward(){
    jQuery('#banners ul').animate({'left' : '-227px'}, 1000, function(){
        jQuery(this).css('left', 0);
        jQuery('li:first', this).detach().appendTo(jQuery(this));
    })
}