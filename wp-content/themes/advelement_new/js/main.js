(function ($) {

    $(document).ready(function () {
        if ($('.logotypes-przyjaciel').length > 0) {
            $('.logotypes-przyjaciel.owl-carousel').owlCarousel({
                margin: 20,
                responsiveClass: true,
                items: 3,
                nav: true,
                dots: false,
                loop: true,
                autoplay: true,
                autoplayTimeout: 2500,
                autoplaySpeed: 1500,
                autoplayHoverPause: false,
                navText: ['<span class="next"></span>', '<span class="prev"></span>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    800: {
                        items: 3
                    },
                    1024: {
                        items: 4
                    }
                }
            });
        }

        if ($('.slider-carousel').length > 0) {
            $('.slider-carousel.owl-carousel').owlCarousel({
                margin: 0,
                items: 1,
                // items: 5,
                nav: true,
                dots: false,
                loop: true,
                autoplay: true,
                autoplayTimeout: 4500,
                autoplaySpeed: 1500,
                autoplayHoverPause: false,
                navText: ['<span class="prev"></span>', '<span class="next"></span>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    800: {
                        items: 1
                    },
                    1024: {
                        items: 1
                    }
                }
            });
        }


        $('.user-profil button').click(function (e) {
            e.preventDefault();
            $('.user-profil button').each(function () {
                $(this).removeClass('active');
            });
            $(this).toggleClass('active');
            if ($(this).val() == 'Firma') {
                $('.company-fields').fadeIn(500);
            } else {
                $('.company-fields').fadeOut(500);
            }
            $('.form-group').fadeIn(500);
            $('.confirm-order').fadeIn(500);
            $('.rules-container').fadeIn(500);
        })

        var userDetails = {};
        var type;

        $('.confirm-button').click(function (e) {
            e.preventDefault();
            var errors = [];
            type = $('.user-profil button.active').val();


            $('.form-group .input-type').each(function () {
                var name = $(this).attr('id');
                var value = $(this).val();

                if(type =='Person'){
                    if(!($(this).hasClass('company-team'))){

                        if(!value){
                            $(this).addClass('error');
                        }else{
                            $(this).removeClass('error');
                        }

                        //validate email
                        if(name == 'person-email'){
                            if(!isEmail(value)){
                                $(this).addClass('error');
                            }else{
                                $(this).removeClass('error');
                            }
                        }
                        //validate zipcode
                        if(name == 'person-zipcode'){
                            if(!validatePostalCode(value)){
                                $(this).addClass('error');
                            }else{
                                $(this).removeClass('error');
                            }
                        }

                        userDetails[name] = value;
                    }
                }else if(type == 'Firma'){

                    if(!value){
                        $(this).addClass('error');
                    }else{
                        $(this).removeClass('error');
                    }
                    if(name == 'person-email'){
                        if(!isEmail(value)){
                            $(this).addClass('error');
                        }else{
                            $(this).removeClass('error');
                        }
                    }
                    if(name == 'person-zipcode'){
                        if(!validatePostalCode(value)){
                            $(this).addClass('error');
                        }else{
                            $(this).removeClass('error');
                        }
                    }
                    userDetails[name] = value;
                }
            });



            if($('.input-type.error').length > 0){
                if(type == 'Firma') {
                    var id = $('.input-type.error:first').attr('id');
                }else if(type == 'Person'){
                    var id = $('.input-type.error:not(.company-team):first').attr('id');
                }
                errors.push(id);
            }

            $('.checkbox').each(function () {
                if(!($(this).is(':checked'))){
                    errors.push($(this).attr('id'));
                    $(this).parent().parent().find('.rule_text').addClass('error');
                }else{
                    $(this).parent().parent().find('.rule_text').removeClass('error');
                }
            })




            if(errors.length > 0){
                errors = errors.filter(function(e){return e});

                $('html, body').animate({
                    scrollTop: $("#"+errors[0]).offset().top - 50
                }, 1000);
                $('.order-details').fadeOut(500);
            }else{
                $('.order-details').fadeIn(500);
                $('html, body').animate({
                    scrollTop: $(".order-details").offset().top - 50
                }, 1000);

                printUserData(userDetails);
            }
        })


        $('#confirm-button-end').click(function (e) {
            e.preventDefault();

            var voucher = {};
            voucher.post = $('#offer_form').attr('data-postid');
            voucher.price = $('#voucher_price').html();
            voucher.name = $('#voucher_name').html();
            voucher.duration = $('#voucher_duration').html();
            voucher.link = $('#voucher_link').html();


            $.ajax({
                type: "POST",
                url: '/wp-admin/admin-ajax.php',
                data: ({
                    action: "order_offer",
                    data : userDetails,
                    type: type,
                    voucher: voucher
                }),
                beforeSend: function(){
                  $('.ajax-spinner').show();
                },
                success: function (data) {
                    $('.ajax-spinner').hide();
                    if (data) {
                        if (data.data.status == 200) {
                            $('.offer_form').fadeOut(500);
                            $('.confirmation-order-success').fadeIn(1000);
                            $('html, body').animate({
                                scrollTop: $(".confirmation-order-success").offset().top - 50
                            }, 1000);

                            if($('#confirm-button-end').hasClass('austriacamp')){
                                console.log('purchaste');
                                fbq('track', 'Purchase');
                            }
                        }else{
                            $('.offer_form').fadeOut(500);
                            $('.confirmation-order-error').fadeIn(1000);
                            $('.confirmation-order-error .error-log').html(data.data.status);
                            $('html, body').animate({
                                scrollTop: $(".confirmation-order-error").offset().top - 50
                            }, 1000);
                        }
                    }
                }
            })


        });


        $('.reservation span').click(function (e) {
            e.preventDefault();
            $('.offer_form').fadeIn(500);
            $('html, body').animate({
                scrollTop: $("#offer_form").offset().top
            }, 1000);
        })

        $('.ankieta, .ankieta-sg').click(function () {
            $('.ankieta-body').show();
            $("#ankieta-modal").show();
        })


        if(location.hash == '#ankieta-dietetyk'){
            $("#ankieta-dietetyk-modal").show();
        }

        if(location.hash == '#konkurs-zgloszenie'){
            $("#konkrus-modal").show();
        }

        $(".target-competition-modal").click(function () {
            $("#konkrus-modal").show();
        })


        $(".modal .close").click(function () {
            $(this).closest('.modal').hide();
        });

        document.addEventListener( 'wpcf7mailsent', function( event ) {
            if($('#ankieta-modal').length > 0){
                $('.ankieta-body').fadeOut(500);
            }
        }, false );

        function printUserData(userDetails){
            //print user data
            for(var key in userDetails) {
                $("[data-name="+key+"]").html(userDetails[key]);
            }
        }

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        function validatePostalCode(c){
            var reg = /^[0-9]{2}\-[0-9]{3}$/gi;
            return reg.test(c);
        }


        $('.movie-box .show-more, .movie-box .poster').click(function (e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: '/wp-admin/admin-ajax.php',
                data: ({
                    action: "render_competition_movie",
                    data : $(this).attr('data-id'),
                }),
                beforeSend: function(){
                    $('#template-movie-modal .competition-body').html('');
                },
                success: function (data) {
                    if (data) {
                        if (data.data.status == 200) {
                            $('#template-movie-modal .competition-body').html(data.data.html);
                            $('#template-movie-modal').show();

                        }else{
                            alert('Wystąpił błąd. Prosimy spróbować później.')
                        }
                    }
                }
            })
        })

        $('#template-movie-modal .close').click(function (e) {
            e.preventDefault();
            $('#template-movie-modal').hide();
            $('#template-movie-modal .competition-body').empty();
        })

    })

})(jQuery);