<?php 
//inicio
session_start();
require_once("include/conexion.php"); 
$correo=$_SESSION['usuario'];
if (empty($correo))
{
	echo "<script type='text/javascript'>
				alert('No estas logueado.');
				window.location='http://reservation.mayakoba.com';
			  </script>";
}






$guid= $_POST["guid[]"];



//echo "test ".$guid;

//$aDoor = $_POST['formDoor'];
$aDoor = $_POST['formDoor'];
$aDoor1 = $_POST['formDoor1'];
$aux= $_POST['aux'];
$nombre_jugador = $_POST['nombre_jugador'];




$N = count($aDoor);
 
  
//  if (( $aDoor<>0) && ($aDoor1<>0) ){
	    for($i=0; $i <= $N; $i++)
        {
			//$querySQL='';
			 
			if  (strlen($aDoor[$i])<>0) 
			{
				
			$querySQL="Select j.id_jugador,r.id_reservacion from jugadores j inner join reservacion r on j.id_reservacion=r.id_reservacion where j.nombre_jugador='$nombre_jugador' and r.guid='$aDoor[$i]'";
          //  echo $querySQL; echo $nombre_jugador; echo $hora_reservacion;
            $resultado=mysql_db_query($db,$querySQL,$con); 
	        $contador=0;
            while($jugador=mysql_fetch_array($resultado)) 
			      { 
					  $id_reservacion = $jugador["id_reservacion"];
	              } //end while 
    
		 
		 $query_usr = "UPDATE prestamo SET estatus_equipo='DEVUELTO', hora_sistema_dev=now() WHERE	id_reservacion='$id_reservacion' and equipo='RAQUETA'";
		  mysql_connect("db.mayakoba.com","reservation","pNTH2MBe") or die("No se pudo conectar a la base de datos");
                                                                              
          //SELECCIONAMOS LA BASE DE DATOS 
          mysql_select_db("reservation");
                                                                             
          //EJECUTAMOS LA CONSULTA
          mysql_query($query_usr) or die("Query: $query_usr <br />Error: ".mysql_error());
          } //end primer if para cuando seleccione raqueta y pelotas
		  
		  
		   
		 
	  } //end for
	  $N1 = count($aDoor1);
	 
	  for($i=0; $i <= $N1; $i++)
        {
	   if (strlen($aDoor1[$i])<>0) 
		  {
			 echo $aDoor1[$i]."<br>";
			$querySQL="Select j.id_jugador,r.id_reservacion from jugadores j inner join reservacion r on j.id_reservacion=r.id_reservacion where j.nombre_jugador='$nombre_jugador' and r.guid='$aDoor1[$i]'";
            $resultado=mysql_db_query($db,$querySQL,$con); 
	        $contador=0;
            while($jugador=mysql_fetch_array($resultado)) 
			      { 
	                  $id_jugador=  $jugador["id_jugador"]; 
					  $id_reservacion = $jugador["id_reservacion"];
	              }
    
		  $query_usr = "UPDATE prestamo SET estatus_equipo='DEVUELTO', hora_sistema_dev=now() WHERE	id_reservacion='$id_reservacion' and equipo='PELOTA'";
		  mysql_connect("db.mayakoba.com","reservation","pNTH2MBe") or die("No se pudo conectar a la base de datos");
                                                                              
          //SELECCIONAMOS LA BASE DE DATOS 
          mysql_select_db("reservation");
                                                                             
          //EJECUTAMOS LA CONSULTA
          mysql_query($query_usr) or die("Query: $query_usr <br />Error: ".mysql_error());
          }
		} //end if
 	 	 echo "<script type='text/javascript'>
				alert('Registrando Devolución...');
				javascript:window.history.go(-1);
			  </script>";
		
	//}
	?>