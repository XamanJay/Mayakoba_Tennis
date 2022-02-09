jQuery(document).ready(function($){

	// hide messages 
	$("#error").hide();
	$("#sent-form-msg").hide();
	
	// on submit...
	$("#contactForm #submit").click(function() {
		$("#error").hide();
		
		//Recuperamos la cancha seleccionada
		var cancha = $("#cancha").val();
		
		//Recuperamos el usuario
		var usuario = $("#usuario").val();
		
		//Recuperamos la empresa
		var empresa = $("#empresa").val();
		
		
		
		//hora y fecha
		var jc_date = $("input#jc_date").val();
		if(jc_date == ""){
			$("#error").fadeIn().text("Ingresa la fecha y hora de reservación.");
			$("input#jc_date").focus();
			return false;
		}
		
		// nombre concierge
		var nombre = $("input#nombre").val();
		if(nombre == ""){
			$("#error").fadeIn().text("Ingresa el nombre del concierge");
			$("input#nombre").focus();
			return false;
		}
		
		// Apellido Paterno
		var appaterno = $("input#appaterno").val();
		if(appaterno == ""){
			$("#error").fadeIn().text("Ingresa el apellido paterno del concierge");
			$("input#appaterno").focus();
			return false;
		}
		
		// Email
		var email = $("input#email").val();
		if(email == ""){
			$("#error").fadeIn().text("Ingresa el email del concierge");
			$("input#email").focus();
			return false;
		}
		
		// telefono
		var telefono = $("input#telefono").val();
		if(telefono == ""){
			$("#error").fadeIn().text("Ingresa el teléfono del concierge");
			$("input#telefono").focus();
			return false;
		}
		
				
		//validamos los datos del single, mínimo una persona debe de estar registrada
			//Nombre primer jugador
			var nombres1 = $("input#nombres1").val();
			if(nombres1 == "")
			{
				$("#error").fadeIn().text("Ingresa el nombre del primer jugador.");
				$("input#nombres1").focus();
				return false;
			}
			
			//apellido paterno
			var appaternos1 = $("input#appaternos1").val();
			if(appaternos1 == "")
			{
				$("#error").fadeIn().text("Ingresa el apellido del primer jugador.");
				$("input#appaternos1").focus();
				return false;
			}
			
			//apellido paterno
			var habitacions1 = $("input#habitacions1").val();
			if(habitacions1 == "")
			{
				$("#error").fadeIn().text("Ingresa el No. de habitación del primer jugador.");
				$("input#habitacions1").focus();
				return false;
			}
		
		
			
		
	
		
		// data string
		var dataString = 'cancha='+ cancha
						+ '&usuario=' + usuario        
						+ '&jc_date=' + jc_date
						+ '&nombre=' + nombre
						+ '&appaterno=' + appaterno
						+ '&email=' + email
						+ '&telefono=' + telefono
						+ '&empresa=' + empresa
						+ '&nombres1=' + nombres1
						+ '&appaternos1=' + appaternos1
						+ '&habitacions1=' + habitacions1						
						;						         
		// ajax
		$.ajax({
			type:"POST",
			url: insertareservacion.php,
			data: dataString,
			success: success()
		});
	});  
		
		
	// on success...
	 function success(){
	 	$("#sent-form-msg").fadeIn();
	 	$("#contactForm").fadeOut();
	 }
	
    return false;
});

