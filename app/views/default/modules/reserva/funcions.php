<?php
/* Archivo para funciones */
function getUserLanguage() { 
       $idioma =substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);
       return $idioma; 
} 
function conectaBaseDatos(){
	try{
		$servidor = "localhost";
		$puerto = "3306";
		$basedatos = "bnzdzndx_Relleus";
		$usuario = "bnzdzndx";
		$contrasena = "valllord1714";
	
		$conexion = new PDO("mysql:host=$servidor;port=$puerto;dbname=$basedatos",
							$usuario,
							$contrasena,
							array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		
		$conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		return $conexion;
	}
	catch (PDOException $e){
		die ("No se puede conectar a la base de datos". $e->getMessage());
	}
}

function dameProducte(){
	$resultado = false;
	$consulta = "SELECT * FROM PRODUCTE";
	
	$conexion = conectaBaseDatos();
	$sentencia = $conexion->prepare($consulta);
	
	try {
		if(!$sentencia->execute()){
			print_r($sentencia->errorInfo());
		}
		$resultado = $sentencia->fetchAll();
		//$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
	}
	catch(PDOException $e){
		echo "Error al ejecutar la sentencia: \n";
			print_r($e->getMessage());
	}
	
	return $resultado;
}

function damePersones($producte = ''){
        $consulta = "SELECT adults FROM PRODUCTE WHERE id_producte = :producte";
//         echo $consulta;
        $conexion = conectaBaseDatos();
	$sentencia = $conexion->prepare($consulta);
	$sentencia->bindParam('producte',$producte);
	try {
		if(!$sentencia->execute()){
			print_r($sentencia->errorInfo());
		}
		$resultado = $sentencia->fetchAll();
		//$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
	}
	catch(PDOException $e){
		echo "Error al ejecutar la sentencia: \n";
			print_r($e->getMessage());
	}
	foreach($resultado as $indice => $registro){
			$persones= $registro['persones'];
	}
	return $persones;
}
function dameServei($producte = ''){
	$_SESSION["producte"]=$producte;
	$resultado = false;
	$consulta = "SELECT * FROM SERVEIS";

	if($producte != ''){
		$consulta .= " WHERE id_servei in(SELECT id_servei FROM Producte_Servei WHERE id_producte= :producte)";
	}
	$conexion = conectaBaseDatos();
	$sentencia = $conexion->prepare($consulta);
	$sentencia->bindParam('producte',$producte);
	
	try {
		if(!$sentencia->execute()){
			print_r($sentencia->errorInfo());
		}
		$resultado = $sentencia->fetchAll();
		//$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
	}
	catch(PDOException $e){
		echo "Error al ejecutar la sentencia: \n";
			print_r($e->getMessage());
	}
	return $resultado;
}
function damePreu($producte = ''){
	$resultado = false;
	$consulta = "SELECT * FROM SERVEIS";

	if($producte != ''){
		$consulta .= " WHERE id_servei in(SELECT id_servei FROM Producte_Servei WHERE id_producte= :producte)";
	}

	$conexion = conectaBaseDatos();
	$sentencia = $conexion->prepare($consulta);
	$sentencia->bindParam('producte',$producte);
	
	try {
		if(!$sentencia->execute()){
			print_r($sentencia->errorInfo());
		}
		$resultado = $sentencia->fetchAll();
		//$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
	}
	catch(PDOException $e){
		echo "Error al ejecutar la sentencia: \n";
			print_r($e->getMessage());
	}
	return $resultado;
}
function dameBanner(){
	$resultado = false;
	$consulta = "SELECT * FROM banner";
	
	$conexion = conectaBaseDatos();
	$sentencia = $conexion->prepare($consulta);
	
	try {
		if(!$sentencia->execute()){
			print_r($sentencia->errorInfo());
		}
		$resultado = $sentencia->fetchAll();
		//$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
	}
	catch(PDOException $e){
		echo "Error al ejecutar la sentencia: \n";
			print_r($e->getMessage());
	}
	return $resultado;
}	
	
function afegirUsuari($Nom = '',$Cognom = '',$DNI = '',$Email = '',$Telefon = ''){
	$consulta = "INSERT INTO Usuaris VALUES (NULL, :Nom, :Cognoms, :DNI, :Email, :Telefon)";
	$conexion = conectaBaseDatos();
	$sentencia = $conexion->prepare($consulta);
	$sentencia->bindParam('Nom',$Nom);
	$sentencia->bindParam('Cognoms',$Cognom);
	$sentencia->bindParam('DNI',$DNI);
	$sentencia->bindParam('Email',$Email);
	$sentencia->bindParam('Telefon',$Telefon);
	try {
		if(!$sentencia->execute()){
			print_r($sentencia->errorInfo());
		}
		//$resultado = $sentencia->fetchAll();
		//$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
	}
	catch(PDOException $e){
		echo "Error al ejecutar la sentencia: \n";
			print_r($e->getMessage());
	}
	
	//echo $resultado;
return $conexion->lastInsertId();
}
function afegirBanner($Titol = '',$Descripcio = '',$path_banner = '',$link = ''){
	$consulta = "INSERT INTO banner VALUES (NULL, :titol, :descripcio, :imatge, :link)";
	$conexion = conectaBaseDatos();
	$sentencia = $conexion->prepare($consulta);
	$sentencia->bindParam('titol',$Titol);
	$sentencia->bindParam('descripcio',$Descripcio);
	$sentencia->bindParam('imatge',$path_banner);
	$sentencia->bindParam('link',$link);
	try {
		if(!$sentencia->execute()){
			print_r($sentencia->errorInfo());
		}
		//$resultado = $sentencia->fetchAll();
		//$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
	}
	catch(PDOException $e){
		echo "Error al ejecutar la sentencia: \n";
			print_r($e->getMessage());
	}
	
	//echo $resultado;
return $conexion->lastInsertId();
}
function borrarBanner($Titol = ''){
	$consulta = "DELETE FROM banner WHERE titol = :titol";
	$conexion = conectaBaseDatos();
	$sentencia = $conexion->prepare($consulta);
	$sentencia->bindParam('titol',$Titol);

	try {
		if(!$sentencia->execute()){
			print_r($sentencia->errorInfo());
		}
		//$resultado = $sentencia->fetchAll();
		//$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
	}
	catch(PDOException $e){
		echo "Error al ejecutar la sentencia: \n";
			print_r($e->getMessage());
	}
	
	//echo $resultado;
return $conexion->lastInsertId();
}
//falta completar
function afegirReserva($id_usuari = '',$Data_ini = '', $Data_fi = '', $Data_reserva = '',$Persones = '',$Preu_final = ''){
	$consulta = "INSERT INTO Reserva VALUES (NULL, :id_usuari, :Data_ini, :Data_fi, :Data_fi, :Persones, :Preu)";
	$conexion = conectaBaseDatos();
	$sentencia = $conexion->prepare($consulta);
	$sentencia->bindParam('id_usuari',$id_usuari);
	$sentencia->bindParam('Data_ini',$Data_ini);
	$sentencia->bindParam('Data_fi',$Data_fi);
 	$sentencia->bindParam('Data_reserva',$Data_fi);
	$sentencia->bindParam('Persones',$Persones);
	$sentencia->bindParam('Preu',$Preu_final);
	try {
		if(!$sentencia->execute()){
			print_r($sentencia->errorInfo());
		}
		
		$resultado = $sentencia->fetchAll();
		//$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		
		$sentencia->closeCursor();
	}
	catch(PDOException $e){
		echo "Error al ejecutar la sentencia: \n";
			print_r($e->getMessage());
	}
	
return $conexion->lastInsertId();
}
//   echo afegirReserva(130,'2015-5-15','2014-6-15','2015-6-14');
function afegirReserva_serveis($id_reserva = '',$id_producte = '', $id_servei = ''){
	$consulta = "INSERT INTO Reserva_servei VALUES ( :id_reserva, :id_producte, :id_servei)";
	$conexion = conectaBaseDatos();
	$sentencia = $conexion->prepare($consulta);
	$sentencia->bindParam('id_reserva',$id_reserva);
	$sentencia->bindParam('id_producte',$id_producte);
	$sentencia->bindParam('id_servei',$id_servei);
	try {
		if(!$sentencia->execute()){
			print_r($sentencia->errorInfo());
		}
		$resultado = $sentencia->fetchAll();
		//$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
	}
	catch(PDOException $e){
		echo "Error al ejecutar la sentencia: \n";
			print_r($e->getMessage());
	}
return $resultado;
}

function idUsuari($Nom = '',$Cognom = '',$DNI = ''){
	$consulta = "SELECT id_usuari FROM Usuaris WHERE Nom= :Nom AND Cognoms= :Cognoms AND DNI= :DNI";
	$conexion = conectaBaseDatos();
	$sentencia = $conexion->prepare($consulta);
	$sentencia->bindParam('Nom',$Nom);
	$sentencia->bindParam('Cognoms',$Cognom);
	$sentencia->bindParam('DNI',$DNI);
	
	try {
		if(!$sentencia->execute()){
			print_r($sentencia->errorInfo());
		}
		$resultado = $sentencia->fetchAll();
		//$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
	}
	catch(PDOException $e){
		echo "Error al ejecutar la sentencia: \n";
			print_r($e->getMessage());
	}
	return $resultado;
}
function rang_dates($datainici, $datafi){
//     $datainici = "18-01-2010";
//     $datafi = "10-02-2010";
    $fechaaamostar=$datainici;
    $array_dates =array();

     while(strtotime($datafi) >= strtotime($datainici))
     {
      
       if(strtotime($datafi) != strtotime($fechaaamostar))
       {
// 	echo $datainici;
// 	echo $datafi;
 	  array_push($array_dates,$fechaaamostar);
 	  //echo "$fechaaamostar<br />";
 	  $fechaaamostar = date("Y-m-d", strtotime($fechaaamostar . " + 1 day"));
 	  	
       }
       
       else
       {
       break;
 	  array_push($array_dates,$fechaaamostar);
//  	  echo "$fechaaamostar<br />";
 	  break;
       }
     }
     //print_r($array_dates);
     return $array_dates;
     }
function obtenir_dates_res(){
	$consulta = "SELECT Data_ini,Data_fi FROM Reserva";
	$conexion = conectaBaseDatos();
	$sentencia = $conexion->prepare($consulta);
	
	try {
		if(!$sentencia->execute()){
			print_r($sentencia->errorInfo());
		}
		$resultado = $sentencia->fetchAll();
		//$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
	}
	catch(PDOException $e){
		echo "Error al ejecutar la sentencia: \n";
			print_r($e->getMessage());
	}
	$llista= array();
 	$llista=['NULL'];
	foreach($resultado as $indice => $registro){
			$rang=rang_dates($registro['Data_ini'],$registro['Data_fi']);
			$llista=array_merge($llista,$rang);
	}
	return $llista;
}
function calcul_preuFi($prod){
        $consulta = "SELECT preu_base FROM PRODUCTE WHERE id_producte = :prod";
	$conexion = conectaBaseDatos();
	$sentencia = $conexion->prepare($consulta);
	$sentencia->bindParam('prod',$prod);
	try {
		if(!$sentencia->execute()){
			print_r($sentencia->errorInfo());
		}
		$resultado = $sentencia->fetchAll();
		//$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
	}
	catch(PDOException $e){
		echo "Error al ejecutar la sentencia: \n";
			print_r($e->getMessage());
	}

	foreach($resultado as $indice => $registro){
			return $registro['preu_base'];
	}
}
// echo damePersones(1);
// calcul_preuFi(1,1);
// $m= obtenir_dates_res();
// echo json_encode($m);
// afegirReserva_serveis(1,2,3);
// $b= idUsuari("Oriol","Riu Gispert","122","1212@12.2","1212");

//dameServei("1");
?>