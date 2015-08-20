// $("#municipio").on("change", buscarLocalidades);
$(document).ready(function () {
    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    $(".boton").click(function (){
        $(".error").remove();
        if( $(".Nom").val() == "" ){
            $(".Nom").focus().after("<span class='error'>Introdueix el nom</span>");
            return false;
        }else if( $(".Cognoms").val() == ""){
            $(".Cognoms").focus().after("<span class='error'>Introdueix els cognoms</span>");
            return false;
        }else if( $(".DNI").val() == "" ){
            $(".DNI").focus().after("<span class='error'>Introdueix el DNI</span>");
            return false;
        }else if( $(".Email").val() == "" || !emailreg.test($(".Email").val()) ){
            $(".Email").focus().after("<span class='error'>Introdueix un email correcte</span>");
            return false;
        }else if( $(".Telefon").val() == "" ){
            $(".Telefon").focus().after("<span class='error'>Introdueix el Telefon</span>");
            return false;
        }else{
	   //afegirUsuari(); 
	}
    });
    $(".Nom, .Cognoms, .DNI, .Telefon").keyup(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });
    $(".Email").keyup(function(){
        if( $(this).val() != "" && emailreg.test($(this).val())){
            $(".error").fadeOut();
            return false;
        }
    });
    $("#mostrar_altaUsuari").click(function (){
      	$('#form_usuari').show(); //muestro mediante id
	$('#mostrar_altaUsuari').hide();//amago alta usuari
    });
     $("#persones").change(function (){
      	$('#servei').show();
    });
            
});  
sum=0;
function buscarServeis(){

        var opt = $(this.options[this.selectedIndex]);
        $producte= opt.attr('data-id_producte');
        $preu_base = opt.attr('data-preu_base');
        $persones = opt.attr('data-persones');

	if($producte == ""){
			$("#servei").html("- Primero seleccioni un producte -");
	}
	else {
		$.ajax({
                    
			dataType: "json",
			data: {"producte": $producte, "preu_base": $preu_base},
			url:   'buscar.php',
			type:  'post',
			beforeSend: function(){
				//Lo que se hace antes de enviar el formulario
				},
			success: function(respuesta){
				//lo que se si el destino devuelve algo
				$("#servei").html(respuesta.html);
			},
			error:	function(xhr,err){ 
				//alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
			}
		});
	}
        $("#preu").html("<b>"+$preu_base+"</b>");
}
function buscarPersones(){
        var opt = $(this.options[this.selectedIndex]);
        $('#servei').hide();//amago alta serveis
        $producte= opt.attr('data-id_producte');
        $persones = opt.attr('data-persones');
	if($producte == ""){
			$("#servei").html("- Primero seleccioni un producte -");
	}
	else {
		$.ajax({
                    
			dataType: "json",
			data: {"producte": $producte, "persones": $persones},
			url:   'buscar.php',
			type:  'post',
			beforeSend: function(){
				//Lo que se hace antes de enviar el formulario
				},
			success: function(respuesta){
				//lo que se si el destino devuelve algo
				$("#persones").html(respuesta.html);
			},
			error:	function(xhr,err){ 
				//alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
			}
		});
	}
}
function calculPreu(){
        $(document).ready(function() {
            // Así accedemos al Valor de la opción seleccionada
            var valor = $("#numPersones").val();
            
            // Si seleccionamos la opción "Texto 1"
            // nos mostrará por pantalla "1"
        $servei = $('input[id="preu_base"]:checked').each(function()
        {
            sum=this.getAttribute('data-preu_base');
        });
        $servei = $('input[id="preu_persona"]:checked').each(function()
        {
            
                var fruitCount = this.getAttribute('data-preu'); 
                sum=(parseInt(sum)+(parseInt(fruitCount)*parseInt(valor)));
        });
        $("#preu").html("<b>"+sum+"</b>");
        });
        
}