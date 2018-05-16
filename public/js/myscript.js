$(document).ready(function(){

	/*Ajax setup*/

	$.ajaxSetup({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
		},type:"get"
	});

	/*Photo before and after*/
	var before = $('.before');
	var imgTmp = document.querySelector('.img1');
	var container = $('.before-after');

	container.on("mousemove",function(e){
		e.preventDefault();
		if((($(this).width() - imgTmp.offsetLeft) - e.clientX > 0) && ((e.clientX - imgTmp.offsetLeft) > 0)){
			$(this).children(".before").offset({left:imgTmp.offsetLeft});
			$(this).children(".before").width(e.clientX - imgTmp.offsetLeft);
		}
	}); 

	/*Services modal wiwndow*/

	$('#sendOrder').click(function(e){
		var lang = $('#dateOrder').attr('lang');
		var type;
		$("select option:selected").each(function(){
			type = $(this).text();
		});
		var name = '';
		var date = '';
		var phone = '';
		var validation = true;

		$('.nameCustom').text('');
		$('.phoneCustom').text('');
		$('.dateOrder').text('');
		$('.sendordersuc').text('');

		if($("#nameCustom").val().length == 0){
			if(lang == 'en')
				$('.nameCustom').text('This field is necessary!');
			else 
				$('.nameCustom').text('Это поле является обязательным!');
			validation = false;
		}
		else
			name = $('#nameCustom').val();
		if($('#phoneCustom').val().length == 0){
			if(lang == 'en')
				$('.phoneCustom').text('This field is necessary!');
			else $('.phoneCustom').text('Это поле является обязательным!');
			validation = false;
		}
		else phone = $('#phoneCustom').val();
		if($('#dateOrder').val().length == 0){
			if(lang == 'en')
				$('.dateOrder').text('This field is necessary!');
			else 
				$('.dateOrder').text('Это поле является обязательным!');
			validation = false;
		}
		else date = $('#dateOrder').val();

		if(validation){
			$.ajax({
				url:"/sendmodel",
				data: "name=" + name + "&type=" + type + "&date=" + date + "&phone=" + phone,
				beforeSend:function(){
					if(lang == 'en')
						$('#sendOrder').text('Sending..');
					else $('#sendOrder').text('Отправляется..');
				},
				success:function(data){
					if(lang == 'en'){
						$('#sendOrder').text('Send');
						$('.sendordersuc').text('Successfully sending');
					}
					else{
						$('#sendOrder').text('Отправить');
						$('.sendordersuc').text('Успешно отправлено');
					} 
					$('.nameCustom').text('');
					$('.phoneCustom').text('');
					$('.dateOrder').text('');
					$('#nameCustom').val('');
					$('#phoneCustom').val('');
					$('#dateOrder').val('');
					
				}, 
				error:function(xhr){

				}
			});
		}

	});


	/*Model modal window*/

	$('#sendModel').click(function(e){
		// var name;
		// $('.help-name').text('');
		// $('.help-phone').text('');
		// if($('#nameModel').val().length == 0){
		// 	$('.help-name').text('This field is necessary!');
		// }
		// else{
		// 	name = $('#nameModel').val();
		// }
		// if($('#phoneModel').val().length == 0){
		// 	$('.help-phone').text('This field is necessary!');
		// }

		// $.ajax({
		// 	url:"/sendmodel",
		// 	data: "firstphoto="+first,
		// 	beforeSend:function(){

		// 	},
		// 	success:function(data){

		// 	}, 
		// 	error:function(xhr){

		// 	}
		// });

	});

})
