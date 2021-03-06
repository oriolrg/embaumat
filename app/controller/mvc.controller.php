<?php

require 'app/model/dameBanner.class.php';

class mvc_controller {
   
	/* METODO QUE RECIBE LA ORDEN DE BUSQUEDA, PREPARA LOS DATOS Y SE COMUNICA
	     CON EL MODELO  PARA REALIZAR LA CONSULTA
		INPUT
		 $carrera | nombre de la carrera a buscar
		 $limit | cantidad de registros a mostrar
		 OUTPUT
		 HTML 	| el resultado obtenido del modelo es procesado y convertido en codigo html para que el VIEW pueda mostrarlo	
	*/
    function buscar($carrera, $cantidad)
   {
		$universitario = new universitario();	
		//carga la plantilla 
		$pagina=$this->load_template('- Resultados de la busqueda -');				
		//carga html del buscador
  	    //$buscador = $this->load_page('app/views/default/modules/m.buscador.php');				
	      //obtiene  los registros de la base de datos
		  ob_start();
		  //realiza consulta al modelo
		   $tsArray = $universitario->universitarios($carrera,$cantidad);			   
	   		if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos 
						$titulo = 'Resultado de busqueda por "'.$carrera.'" ';
						//carga la tabla de la seccion de VIEW
			  			include 'app/views/default/modules/m.table_univ.php';
						$table = ob_get_clean();	
						//realiza el parseado 
						$pagina = $this->replace_content('/\#CONTENIDO\#/ms', $buscador.$table , $pagina);	
	   		}else{//si no existen datos -> muestra mensaje de error
		   			$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$buscador.'<h1>No existen resultados</h1>' , $pagina);	
	   		}		
		$this->view_page($pagina);
   }
   
        /* METODO QUE MUESTRA LA PAGINA PRINCIPAL CUANDO NO EXISTEN NUEVAS ORDENES
        OUTPUT
        HTML | codigo html de la pagina   
        */
        function principal()
        {
        	$universitario = new universitario();
                        $pagina=$this->load_template('Relleus, Embauma\'t aventures a Vall de Lord');				
                        $html = $this->load_page('app/views/default/modules/m.principal.php');
                        $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
                        $this->view_page($pagina);
        }

        /* METODE QUE MOSTRA LA PAGINA DE RELLEUS
        OUTPUT
        HTML | codi html de la pagina   
        */
        function relleus()
        {
                        $pagina=$this->load_template('Relleus Guies de Muntanya','app/views/default/sections/s.menurelleus.php');				
                        $html = $this->load_page('app/views/default/modules/relleus/relleus.php');
                        $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
                        $this->view_page($pagina);
        }
			/* METODE QUE MOSTRA LA PAGINA D?EMBAUMAT
			OUTPUT
        HTML | codi html de la pagina
			*/
			function embaumat(){
				$pagina=$this->load_template('Embauma\'t a la Vall de Lord, una experiència única, un viatge al passat','app/views/default/sections/s.menuembaumat.php');						
				$buscador = $this->load_page('app/views/default/modules/embaumat/embaumat.php');
				$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$buscador , $pagina);	
				$this->view_page($pagina);
			}
			/* METODE QUE MOSTRA EL FORMULARI DE RESERVA
			OUTPUT
        HTML | codi html de la pagina
			*/
			function reserva(){
				$pagina=$this->load_template('Fés la teva reserva');						
				$buscador = $this->load_page('app/views/default/modules/reserva/formulario.php');
				$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$buscador , $pagina);	
				$this->view_page($pagina);
			}
	/* METODO QUE CARGA LAS PARTES PRINCIPALES DE LA PAGINA WEB
	INPUT
		$title | titulo en string del header
	OUTPIT
		$pagina | string que contiene toda el cocigo HTML de la plantilla 
	*/
	function load_template($title='Sin Titulo', $menu_left='app/views/default/sections/s.menurelleus.php'){
		$pagina = $this->load_page('app/views/default/page.php');
		$header = $this->load_page('app/views/default/sections/s.header.php');
		$pagina = $this->replace_content('/\#HEADER\#/ms' ,$header , $pagina);
		$pagina = $this->replace_content('/\#TITLE\#/ms' ,$title , $pagina);				
		$menu_left = $this->load_page($menu_left);
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu_left , $pagina);
		return $pagina;
	}
	

	
	/* METODO QUE CARGA UNA PAGINA DE LA SECCION VIEW Y LA MANTIENE EN MEMORIA
		INPUT
		$page | direccion de la pagina 
		OUTPUT
		STRING | devuelve un string con el codigo html cargado
	*/	
	private function load_page($page)
	{
		return file_get_contents($page);
	}
	
	/* METODO QUE ESCRIBE EL CODIGO PARA QUE SEA VISTO POR EL USUARIO
		INPUT
		$html | codigo html
		OUTPUT
		HTML | codigo html		
	*/
	private function view_page($html)
	{
		echo $html;
	}
	
	/* PARSEA LA PAGINA CON LOS NUEVOS DATOS ANTES DE MOSTRARLA AL USUARIO
		INPUT
		$out | es el codigo html con el que sera reemplazada la etiqueta CONTENIDO
		$pagina | es el codigo html de la pagina que contiene la etiqueta CONTENIDO
		OUTPUT
		HTML 	| cuando realiza el reemplazo devuelve el codigo completo de la pagina
	*/
	private function replace_content($in='/\#CONTENIDO\#/ms', $out,$pagina)
	{
		 return preg_replace($in, $out, $pagina);	 	
	}
	
}
/* Archivo para funciones */
function getUserLanguage() { 
       $idioma =substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);
       return $idioma; 
} 
?>