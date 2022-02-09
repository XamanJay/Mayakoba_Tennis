<?php 
//inicio
session_start();
require_once("include/conexion.php"); 

$correo=$_SESSION['usuario'];




$guid= $_POST["guid[]"];



//echo "test ".$guid;

//$aDoor = $_POST['formDoor'];
$aDoor = $_POST['formDoor'];
$aDoor1 = $_POST['formDoor1'];

$nombre_jugador = $_POST['nombre_jugador'];


if (( $aDoor<>0) && ($aDoor1<>0) ){
	    $N = count($aDoor);
	    for($i=0; $i < $N; $i++)
        {
			$querySQL='';
			//if ($aDoor[$i]==$aDoor1[$i]){
			$querySQL="Select j.id_jugador,r.id_reservacion from jugadores j inner join reservacion r on j.id_reservacion=r.id_reservacion where j.nombre_jugador='$nombre_jugador' and r.guid='$aDoor[$i]'";
    echo $querySQL; echo $nombre_jugador; echo $hora_reservacion;
    $resultado=mysql_db_query($db,$querySQL,$con); 
	$contador=0;
     while($jugador=mysql_fetch_array($resultado)) { 
	                  $id_jugador=  $jugador["id_jugador"]; 
					  $id_reservacion = $jugador["id_reservacion"];
	 }
    

		 $query_usr="INSERT INTO prestamo (id_jugador,raqueta,pelotas,id_reservacion) VALUES ('$id_jugador','PRESTADO','PRESTADO','$id_reservacion')";
		  mysql_connect("db.mayakoba.com","reservation","pNTH2MBe") or die("No se pudo conectar a la base de datos");
                                                                              
                    //SELECCIONAMOS LA BASE DE DATOS 
                    mysql_select_db("reservation");
                                                                              
                    //EJECUTAMOS LA CONSULTA
                    mysql_query($query_usr) or die("Query: $query_usr <br />Error: ".mysql_error());
     
			}
					    
 	 	 echo "<script type='text/javascript'>
				alert('Wait...');
				javascript:window.back();
			  </script>";
		
	   }?>

<?php  
  if (($aDoor<>0)&&($aDoor1==0)){
      $N = count($aDoor);
	    for($i=0; $i < $N; $i++)
        {
			$querySQL='';
			//if ($aDoor[$i]==$aDoor1[$i]){
			$querySQL="Select j.id_jugador,r.id_reservacion from jugadores j inner join reservacion r on j.id_reservacion=r.id_reservacion where j.nombre_jugador='$nombre_jugador' and r.guid='$aDoor[$i]'";
   
    $resultado=mysql_db_query($db,$querySQL,$con); 
	$contador=0;
     while($jugador=mysql_fetch_array($resultado)) { 
	                  $id_jugador=  $jugador["id_jugador"]; 
					  $id_reservacion = $jugador["id_reservacion"];
	 }
    

		 $query_usr="INSERT INTO prestamo (id_jugador,raqueta,id_reservacion) VALUES ('$id_jugador','PRESTADO','$id_reservacion')";
		  mysql_connect("db.mayakoba.com","reservation","pNTH2MBe") or die("No se pudo conectar a la base de datos");
                                                                              
                    //SELECCIONAMOS LA BASE DE DATOS 
                    mysql_select_db("reservation");
                                                                              
                    //EJECUTAMOS LA CONSULTA
                    mysql_query($query_usr) or die("Query: $query_usr <br />Error: ".mysql_error());
     
			}
					    
 	 	 echo "<script type='text/javascript'>
				alert('Wait...');
				javascript:window.back();
			  </script>";
		
	   }

  if (($aDoor==0)&&($aDoor1<>0)){
  $N1 = count($aDoor1);
  for($i=0; $i < $N1; $i++)
        {
		 $querySQL='';
			//if ($aDoor[$i]==$aDoor1[$i]){
			$querySQL="Select j.id_jugador,r.id_reservacion from jugadores j inner join reservacion r on j.id_reservacion=r.id_reservacion where j.nombre_jugador='$nombre_jugador' and r.guid='$aDoor1[$i]'";
   
    $resultado=mysql_db_query($db,$querySQL,$con); 
	$contador=0;
     while($jugador=mysql_fetch_array($resultado)) { 
	                  $id_jugador=  $jugador["id_jugador"]; 
					  $id_reservacion = $jugador["id_reservacion"];
	 }
    

		 $query_usr="INSERT INTO prestamo (id_jugador,pelotas,id_reservacion) VALUES ('$id_jugador','PRESTADO','$id_reservacion')";
		  mysql_connect("db.mayakoba.com","reservation","pNTH2MBe") or die("No se pudo conectar a la base de datos");
                                                                              
                    //SELECCIONAMOS LA BASE DE DATOS 
                    mysql_select_db("reservation");
                                                                              
                    //EJECUTAMOS LA CONSULTA
                    mysql_query($query_usr) or die("Query: $query_usr <br />Error: ".mysql_error());
     
			}
 		 
		 echo "<script type='text/javascript'>
				alert('Wait...');
				javascript:window.back();
			  </script>";
  }?>