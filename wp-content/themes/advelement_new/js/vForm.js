(function($) {
    $.fn.extend({
        vForm: function(options, arg) {
            var defaults = {
                theme : 'vform'
            };
            
            if (!options || typeof(options) == 'object') {
                options = $.extend(defaults, options);
            } else if(options && typeof(options) == 'string') {
                switch (options) {
                    case 'detach':
                        return this.each(function() {
                            var p = $(this).parents('.vform-element');
                            var obj = $(this).detach();
                            $(p).replaceWith(obj);
                        });
                    break;
                    
                    case 'status':
                        return this.each(function() {
                            var p = $(this).parents('.vform-element');
                            if(!arg) {
                                $(p).removeClass('correct');
                                $(p).removeClass('incorrect');
                            } else {
                                if(arg == 'correct'){
                                    $(p).addClass('correct');
                                    $(p).removeClass('incorrect');
                                } else if(arg == 'incorrect'){
                                    $(p).addClass('incorrect');
                                    $(p).removeClass('correct');
                                }
                            }
                        });
                    break;
                }
            }
            
            function inputText(obj){
                var ctx = $('<div></div>').addClass('vform-element').addClass('vform-inputText').addClass(options.theme);
                ctx.insertBefore(obj);
                $(obj).detach();
                var _left = $('<span></span>').addClass('vform-inputText-left');
                ctx.append(_left);
                $(obj).appendTo(ctx);
                var _right = $('<span></span>').addClass('vform-inputText-right');
                ctx.append(_right);
            }
            
            function inputFile(obj){
                var ctx = $('<div></div>').addClass('vform-element').addClass('vform-inputFile').addClass(options.theme).click(function(e){
                    $('input', this).focus();
                });
                ctx.insertBefore(obj);
                $(obj).change(function(){
                    $(this).siblings('.vform-inputFile-text').text($(this).val());
                });
                $(obj).detach();
                var _text = $('<span></span>').addClass('vform-inputFile-text');
                ctx.append(_text);
                $(obj).appendTo(ctx);
                var _btn = $('<span></span>').addClass('vform-inputFile-button');
                ctx.append(_btn);
            }
            
            function inputRadio(obj){
                $(obj).focus(function(e){
                    console.log('!');
                    if(!$(this).is(':disabled')) {
                        $('.vform-inputRadio input[name='+$(this).attr('name')+']').each(function(){
                            $(this).parent().removeClass('checked').addClass('focus');
                        });
                        $(this).parent().addClass('checked');
                    }
                }).blur(function(){
                    $('.vform-inputRadio input[name='+$(this).attr('name')+']').each(function(){
                        $(this).parent().removeClass('focus');
                    });
                }).click(function(){
                    $(this).focus();
                });
                var ctx = $('<div></div>').addClass('vform-element').addClass('vform-inputRadio').addClass(options.theme);
                if($(obj).is(':checked')) $(ctx).addClass('checked');
                ctx.insertBefore(obj);
                $(obj).detach();
                var _img = $('<span></span>').addClass('vform-inputRadio-image').click(function(){
                    $(this).siblings().click();
                });
                ctx.append(_img);
                $(obj).appendTo(ctx);
            }
            
            function inputCheckbox(obj){
                $(obj).click(function(){
                    if(!$(this).is(':disabled')) $(this).parent().toggleClass('checked');
                });
                var ctx = $('<div></div>').addClass('vform-element').addClass('vform-inputCheckbox').addClass(options.theme);
                if($(obj).is(':checked')) $(ctx).addClass('checked');
                ctx.insertBefore(obj);
                var _img = $('<span></span>').addClass('vform-inputCheckbox-image');
                if($(obj).parents('label').size() == 0){
                    $(_img).click(function(){
                        $(this).siblings().click();
                    });
                }
                $(obj).detach();
                ctx.append(_img);
                $(obj).appendTo(ctx);
            }
            
            function textarea(obj){
                var ctx = $('<div></div>').addClass('vform-element').addClass('vform-textarea').addClass(options.theme);
                var _table = $('<table></table>').attr('cellspacing', 0);
                ctx.insertBefore(obj);
                $(obj).detach();
                for(i=0;i<3;i++) {
                    var _row = $('<tr></tr>');
                    for(j=0;j<3;j++){
                        _row.append('<td></td>');
                    }
                    _table.append(_row);
                }
                ctx.append(_table);
                $(obj).appendTo($('td:eq(4)', ctx));
                $('td:eq(0)', ctx).addClass('vertical').addClass('vform-textarea-tl');
                $('td:eq(1)', ctx).addClass('vertical').addClass('vform-textarea-t');
                $('td:eq(2)', ctx).addClass('vertical').addClass('vform-textarea-tr');
                $('td:eq(3)', ctx).addClass('horizontal').addClass('vform-textarea-l');
                $('td:eq(5)', ctx).addClass('horizontal').addClass('vform-textarea-r');
                $('td:eq(6)', ctx).addClass('vertical').addClass('vform-textarea-bl');
                $('td:eq(7)', ctx).addClass('vertical').addClass('vform-textarea-b');
                $('td:eq(8)', ctx).addClass('vertical').addClass('vform-textarea-br');
            }
            
            function select(obj){
                var ctx = $('<div></div>').addClass('vform-element').addClass('vform-select').addClass(options.theme).mousedown(function(e){
                    if(!e) var e = window.event;
                    e.preventDefault();
                    e.cancelBubble = true;
                    if(e.stopPropagation) e.stopPropagation();
                }).click(function(e){
                    if(!$(this).hasClass('focus')) $('select', this).focus();
                    $('ul', this).slideToggle('fast');
                    if(!e) var e = window.event;
                    e.cancelBubble = true;
                    if(e.stopPropagation) e.stopPropagation();
                });
                $(obj).blur(function(){
                    $('ul', $(this).parents('.vform-select')).slideUp('fast');
                });
                ctx.insertBefore(obj);
                var _i = $(obj)[0].selectedIndex;
                var _text = $('<p></p>').addClass('vform-select-text').text($('option:eq('+_i+')', obj).text());
                ctx.append(_text);
                var _arrow = $('<span></span>').addClass('vform-select-arrow');
                ctx.append(_arrow);
                var _list = $('<ul></ul>').addClass('vform-select-options');
                $('option', obj).each(function(){
                    var _option = $('<li></li>');
                    _option.append($('<span></span>').text($(this).text()));
                    _option.click(function(e){
                        $('p', $(this).parents('.vform-element')).text($(this).text());
                        $(this).parents('.vform-select-options').slideUp('fast');
                        _ind = $('li', $(this).parent()).index($(this));
                        $('option', $(this).parents('.vform-element')).each(function(index){this.selected = (index == _ind); });
                        if(!e) var e = window.event;
                        e.cancelBubble = true;
                        if(e.stopPropagation) e.stopPropagation();
                        $('select', $(this).parents('.vform-select')).blur();
                        if(!$(this).hasClass('selected')){
                            $('select', $(this).parents('.vform-select')).trigger('change');
                        }
                        $(this).siblings().removeClass('selected');
                        $(this).addClass('selected');
                    });
                    if(_i-- == 0) _option.addClass('selected');
                    _list.append(_option);
                });
                ctx.append(_list);
                $(obj).detach();
                $(obj).appendTo(ctx);
            }
            
            $(document).click(function(){
                $('.vform-select-options').slideUp('fast');
            });

            return this.each(function() {
                var tag = this.tagName.toLowerCase();
                $(this).focus(function(){
                    $(this).parents('.vform-element').addClass('focus');
                }).blur(function(){
                    $(this).parents('.vform-element').removeClass('focus');
                });
                if(tag == 'input'){
                    // input
                    switch ($(this).attr('type').toLowerCase()){
                        default:
                            // input text
                            inputText(this);
                        break;
                        
                        case 'hidden':
                        break;
                        
                        case 'file':
                            // input file
                            inputFile(this);
                        break;
                        
                        case 'radio':
                            // input radio
                            inputRadio(this);
                        break;
                        
                        case 'checkbox':
                            // input checkbox
                            inputCheckbox(this);
                        break;
                        
                        case 'button':
                        case 'submit':
                        case 'reset':
                            // nothing
                        break;
                    }
                } else if(tag == 'textarea'){
                    // textarea
                    textarea(this);
                } else if(tag == 'select'){
                    // select
                    select(this);
                }
            });
        }
    });
})(jQuery);