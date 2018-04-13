jQuery(document).ready(function($){

	var data = [];
	var _index = 0;
	var c = 0;

	function togglePerson(){
		$('#steps li').removeClass('current');
		$('#steps li:eq('+_index+')').addClass('current');
		$('fieldset[rel=step-2] input, fieldset[rel=step-2] select').vForm('detach');
		$('fieldset[rel=step-2] legend + div input').each(function(){
			$(this).val($(this)[0].defaultValue);
		});
		if(data[_index]){
			$('fieldset[rel=step-2] input, fieldset[rel=step-2] select').each(function(){
				_n = $(this).attr('name');
				if(data[_index][_n]){
					$(this).val(data[_index][_n]);
				}
			});
		}
		$('fieldset[rel=step-2] input, fieldset[rel=step-2] select').vForm();
	}
	function saveData(){
		var correct = true;
		$('fieldset[rel=step-2] input').each(function(){
			if($(this).val() == $(this)[0].defaultValue){
				correct = false;
				alert('Proszę wypełnić wszystkie pola.');
				return false;
			}
		});
		if(correct){
			if(!validatePESEL($('#pesel').val())){
				alert('Proszę podać poprawny nr PESEL.');
				$('#pesel').focus();
				return false;
			} else if(!validateEmail($('#email').val())){
				alert('Proszę podać poprawny adres email.');
				$('#email').focus();
				return false;
			} else if(!validatePostalCode($('#postalcode').val())){
				alert('Proszę podać poprawny kod pocztowy.');
				$('#postalcode').focus();
				return false;
			}
		}
		if(!correct) return false;
		if(!data[_index]) data[_index] = [];
		$('fieldset[rel=step-2] input, fieldset[rel=step-2] select').each(function(){
			_n = $(this).attr('name');
			data[_index][_n] = $(this).val();
		});
		
		return true;
	}

	function validatePESEL(pesel){
		if (pesel.length != 11) { return false; } 
		else {
			var steps = new Array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3); 
			var sum_nb = 0;
			for (var x = 0; x < 10; x++) { sum_nb += steps[x] * pesel[x];}
			sum_m = 10 - sum_nb % 10;
			if (sum_m == 10) { sum_c = 0; } else { sum_c = sum_m;}
			if (sum_c != pesel[10]) {	return false;}
		}
		return true;
	}

	function validatePostalCode(c){
		var reg = /^[0-9]{2}\-[0-9]{3}$/gi;
		return reg.test(c);
	}

	function validateEmail(c){
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		return reg.test(c);
	}

	function createEmail(){
		var txt = 'Wyjazd: ' + $('#offert :selected').text()
				+ '\nTermin wyjazdu: ' + $('#time :selected').text()
				+ '\nDorosłych: ' + $('#participants-adults').val()
				+ '\nDzieci: ' + $('#participants-children').val()
				+ '\nZakwaterowanie: ' + $('input[name=accommodation]:checked').val()
				+ '\nZakwaterowanie z innymi uczestnikami: ' + $('input[name=accommodation-shared]:checked').val()
				+ '\nUbezpieczenie: ' + $('input[name=insurance]:checked').val()
				+ '\nSzkolenie: ' + $('input[name=training]:checked').val()
		
		if ($('#question').length) {
				txt+= '\n'+ ($('.question label').text()) +': ' + $('#question').val()
		}
		
		for(i=0;i<c;i++){
			txt+= '\n\n'
				+ '\nOsoba ' + (i+1)
				+ '\nImię: ' + data[i].name
				+ '\nNazwisko: ' + data[i].surname
				+ '\nData urodzenia: ' + data[i].birth
				+ '\nPESEL: ' + data[i].pesel
				+ '\nAdres email: ' + data[i].email
				+ '\nTelefon: ' + data[i].telephone
				+ '\nWojewództwo: ' + data[i].province
				+ '\nMiejscowość: ' + data[i].city
				+ '\nUlica: ' + data[i].street
				+ '\nNr lokalu: ' + data[i].number
				+ '\nKod pocztowy: ' + data[i].postalcode;
		}
			txt+= '\n\n'
				+ '\nForma płatności: ' + $('#payment').val()
				+ '\nUwagi: ' + $('#msg').val()
				+ '\nZnamy się?: ' + $('#info2').val()
				+ '\nSkąd dowiedziałem się o Adventure Element?: ' + $('#info').val();
		$('textarea[name=message]').val(txt);
		$('.thx').show();
		$('.wpcf7-form').submit();
		
	}

	$('#offert').change(
		
		function(){
		
			if( $(this).find(':selected')[0].id ) {
		
				var url_id = $(this).find(':selected')[0].id.replace('trip-','');
				var url_new = $(location).attr('href').replace(/oferta=\d+/,'oferta='+url_id);
			
				window.location = url_new;
				
			};
			
		}
		
	);


    $('textarea[name=message]').css('position', 'absolute').css('left', '-1000px');
    
	$('#next').click(function(){
	
        c = parseInt($('#participants-adults').val());
        
		if($('fieldset[rel=step-1] select')[0].selectedIndex == 0) { alert('Proszę wybrać wycieczkę.'); return false; }
        if($('fieldset[rel=step-1] select')[1].selectedIndex == 0) { alert('Proszę wybrać termin.'); return false; }
		
		if(isNaN(c) || c < 1){ alert('Proszę wprowadzić poprawną ilość osób.'); return false; }		
		
		if ($('input[name=accommodation]').length) {
			if($('input[name=accommodation]:checked').size() == 0) {alert('Proszę wybrać zakwaterowanie.'); return false;}
		} else if ($('input[name=accommodation-shared]').length) {
			if($('input[name=accommodation-shared]:checked').size() == 0) {alert('Proszę wybrać zakwaterowanie.'); return false;}
		}
		
        if ($('input[name=insurance]').length) {
			if($('input[name=insurance]:checked').size() == 0) {alert('Proszę wybrać ubezpieczenie.'); return false;}
		}
		
		if ($('input[name=training]').length) {
			if($('input[name=training]:checked').size() == 0) {alert('Proszę wybrać typ szkolenia.'); return false;}
		}

		if ($('#question').length) {
			if($('#question').val() == $('#question')[0].defaultValue) {alert('Proszę wypełnić wszystkie pola.'); return false;}
		}		
        
		for(i=0;i<c;i++){
            $('#steps').append('<li>'+(i+1)+'</li>');
        }
        
		$('fieldset[rel=step-1]').hide();
        $('fieldset[rel=step-2]').show();
        
		togglePerson();
    
	});
	
    $('#prev-person').click(function(){
        if(!saveData()) return false;
        if(_index == 0) return false;
        _index--;
        togglePerson();
    });
	
    $('#next-person').click(function(){
        if(!saveData()) return false;
        if(_index+1 == c){
            $('fieldset[rel=step-2]').hide();
            $('fieldset[rel=step-3]').show();
			
            txt = $('#offert :selected').text() + ', ' + $('#time :selected').text() + '<br />dorosłych: '+$('#participants-adults').val()+', dzieci: '+$('#participants-children').val()+'<br />dojazd: we własnym zakresie';
            
			if ($('input[name=accommodation]').length) txt = txt + '<br />'+$('input[name=accommodation]:checked').val();
			if ($('input[name=accommodation-shared]:checked').length) txt = txt + ' ('+$('input[name=accommodation-shared]:checked').val()+')';
			if ($('input[name=insurance]:checked').length) txt = txt + '<br />ubezpieczenie: '+$('input[name=insurance]:checked').val();
			if ($('input[name=training]').length && ($('input[name=training]:checked').val() != 'nie') && ($('input[name=training]:checked').val() != 'bez szkolenia')) txt = txt + '<br />szkolenie: '+$('input[name=training]:checked').val();
			
			$('#details').html(txt);
        }
        else {
            _index++;
            togglePerson();
        }
    });
	
    $('fieldset[rel=step-3] #next').click(function(){
        if($('#payment')[0].selectedIndex == 0){
            alert('Proszę wybrać sposób płatności.');
        } else if($('#msg').val() == $('#msg')[0].defaultValue){
            alert('Proszę wypełnić wszystkie pola.');
        } else {
			$('fieldset[rel=step-3]').hide();
			$('fieldset[rel=step-4]').show();
		}
    });
	
    $('#send').click(function(){
		if($('#info')[0].selectedIndex == 0 || $('#info2')[0].selectedIndex == 0){
            alert('Proszę wypełnić wszystkie pola.');
        } else {
            createEmail();
        }
    });	
	
    $('fieldset:gt(0)').hide();
	
});