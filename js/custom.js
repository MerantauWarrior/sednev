$( document ).ready(function() {
	/*mobile menu*/
	$('.mobmenu').click(function(){
		$(this).toggleClass('change');
		$('.menu').slideToggle(400);
	});
	/*scroll to*/
	$('.menu__link').click(function(e){
		e.preventDefault();
		var goTo = $(this).attr('href');
		$('html,body').animate({
			scrollTop: $(goTo).offset().top},
		'slow');
	});
	/*Ajax mail*/
	$('button.question__form-submit').click(function(e){
		e.preventDefault();
		var nameUser = $('#username').val();
		var emailUser = $('#usermail').val();
		var telUser = $('#usertel').val();
		var messageUser = $('#userquestion').val();
		if(nameUser === "" && emailUser === "" && messageUser === ""){
			$('<span class="msgRes">заполните обязательные поля</span>').appendTo('.question__form-field-submit').delay(2000).fadeOut(600);
			return false;
		}else{
			$.ajax({
				type : 'POST',
				url : 'mailHandler.php',
				async : true,
				data : {
					nameUser:nameUser,
					telUser:telUser,
					emailUser:emailUser,
					messageUser:messageUser
					},
				error: function() {
				 $( "body" ).html( 'fail' );
				},
				success: function(data){
					$('#username').val('');
					$('#usermail').val('');
					$('#usertel').val('');
					$('#userquestion').val('');
					$('<span class="msgRes">Сообщение отправлено</span>').appendTo('.question__form-field-submit').delay(2000).fadeOut(600);
				}
			});
		}
	});
	/**/
	
});