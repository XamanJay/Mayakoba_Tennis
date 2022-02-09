<?php 
//inicio
session_start();
require_once("include/conexion.php"); 

$correo=$_SESSION['usuario'];




$guid= $_POST["guid[]"];



//echo "test ".$guid;

//$aDoor = $_POST['formDoor'];
$aDoor = $_POST['formDoor'];

$N = count($aDoor);

	for ($i=0; $i <= $N; $i++){
           $querySQL1="SELECT * from reservacion where guid='$aDoor[$i]' and status='cancelada'";
						$resultado1=mysql_db_query($db,$querySQL1,$con); 
						$contador=0;
 						while($reservacion1=mysql_fetch_array($resultado1)){
							$contador=$contador+1;
						}
	               // }
   // $N = count($aDoor);
   
   // for($i=0; $i < $N; $i++)
   // {

			if ($contador<>0)  
			    echo "<script type='text/javascript'>
				alert('Ya ha sido cancelada previamente');
				javascript:window.back();
			  </script>";
			else {
		 $query_usr="UPDATE reservacion SET status='cancelada' WHERE guid='$aDoor[$i]'";
		  mysql_connect("db.mayakoba.com","reservation","pNTH2MBe") or die("No se pudo conectar a la base de datos");
                                                                              
                                                                              //SELECCIONAMOS LA BASE DE DATOS 
                                                                              mysql_select_db("reservation");
                                                                              
                                                                              //EJECUTAMOS LA CONSULTA
                                                                              mysql_query($query_usr) or die("Query: $query_usr <br />Error: ".mysql_error());

		//echo $query_usr."<br>";
		
		
		
		//$qry = "UPDATE reservacion SET status='Prueba' WHERE guid='$aDoor[$i]'";
		//$intContador=0;
		//$querySQL='';   		 
		//$querySQL="SELECT cancha from reservacion where guid='$aDoor[$i]'";
		//$resultadoSQL=mysql_db_query($db,$querySQL,$con);
			//  	while ($rows1 = mysql_fetch_array($resultadoSQL))
				//		{
					//	$intContador = $intContador +1;
						
				      //  echo $rows1["cancha"];}
			}
    }
 		 
		 echo "<script type='text/javascript'>
				alert('Wait...');
				javascript:window.back();
			  </script>";
	?>

  
               