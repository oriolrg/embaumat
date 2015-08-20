<?php
	require 'app/controller/mvc.controller.php';

     //se instancia al controlador 
	$mvc = new mvc_controller();

	if( $_GET['action'] == 'relleus' ) //mostra relleus
	{	
			$mvc->relleus();	
	}
	else 	if( $_GET['action'] == 'embaumat' ) //mostra embaumat
	{
			$mvc->embaumat();	
	}
	else 	if( $_GET['action'] == 'reserva' ) //mostra el formulari de registre
	{
			$mvc->buscar();	
	}
	else if( isset($_POST['carrera']) && isset($_POST['cantidad']) )//muestra el buscador y los resultados
	{
			$mvc->buscar( $_POST['carrera'], $_POST['cantidad'] );
	}
	else //Si no existe GET o POST -> muestra la pagina principal
	{	
		$mvc->principal();
	}

	

?>