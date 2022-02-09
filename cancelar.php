<?php 
//inicio
session_start();
require_once("include/conexion.php"); 
$sesion= $_SESSION['usuario'];
$fecha_reservacion='2012-11-24'
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Cancelar Reservación</title>

		<style type="text/css">
			 
fieldset
{
    border: none;
    padding: 0;
}

form {
    padding: 1em;
}

table {
		border-collapse:collapse;
		background:#EFF4FB url(../images/teaser.gif) repeat-x;
		border-left:1px solid #686868;
		border-right:1px solid #686868;
		font:0.8em/145% 'Trebuchet MS',helvetica,arial,verdana;
		color: #333;
}

td, th {
		padding:5px;
}

caption {
		padding: 0 0 .5em 0;
		text-align: left;
		font-size: 1.4em;
		font-weight: bold;
		text-transform: uppercase;
		color: #333;
		background: transparent;
}

/* =links
----------------------------------------------- */

table a {
		color:#950000;
		text-decoration:none;
}

table a:link {}

table a:visited {
		font-weight:normal;
		color:#666;
		text-decoration: line-through;
}

table a:hover {
		border-bottom: 1px dashed #bbb;
}

/* =head =foot
----------------------------------------------- */

thead th, tfoot th, tfoot td {
		background:#333 url(../images/llsh.gif) repeat-x;
		color:#fff
}

tfoot td {
		text-align:right
}

/* =body
----------------------------------------------- */

tbody th, tbody td {
		border-bottom: dotted 1px #333;
}

tbody th {
		white-space: nowrap;
}

tbody th a {
		color:#333;
}

.odd {}

tbody tr:hover {
		background:#fafafa
}


p.addRow {
    text-align: right;
    margin: 0 1em 0 0;
}

p.addRow a {
    cursor: pointer;
}

form fieldset.errors {
    color: red;
}

form fieldset.errors p {
    margin: 0.2em;
}

form div.submit {
    padding: 1em;
    text-align: right;
}

form div.submit input {
    cursor: pointer;
}

form.newRow h3 {
    margin: 0;
}

form.newRow th.edit,
form.newRow td.edit,
form.newRow th.delete,
form.newRow td.delete {
    display: none;
}

.pagination {
    color: #888888;
    float: left;
    margin: 30px auto 0;
    padding: 5px;
    font-size: 12px;
}

.pagination a {
    color: #6666ff;
    padding: 5px;
    box-shadow:black 1px 1px 2px;
    border:1px solid gray;
    text-decoration: none;
}
.pagination a:hover {
    color: #6666ff;
    padding: 5px;
    box-shadow:black 1px 1px 2px;
    border:1px solid gray;
    text-decoration: none;
    background-color: yellow;
}

.pagination .prev
{
    float: left;
    padding: 5px;
    box-shadow:black 1px 1px 2px;
    border:1px solid gray;
    margin-right: 5px;
}

.pagination .next
{
    float: right;
    padding: 5px;
    box-shadow:black 1px 1px 2px;
    border:1px solid gray;
    margin-left: 5px;
}
.pagination .current{
    padding: 5px;
    color:red;
    box-shadow:black 1px 1px 2px;
    border:1px solid gray;

}
.pagination .pages
{
    float:left;
    text-align: center;
    margin-top: 6px;
}

div.error {
    margin: 20px;
    padding: 20px;
    background-color: #222;
    color: #d44;
    font-weight: bold;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
}

body
	{
background: rgb(240,249,255); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(240,249,255,1) 0%, rgba(203,235,255,1) 47%, rgba(161,219,255,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(240,249,255,1)), color-stop(47%,rgba(203,235,255,1)), color-stop(100%,rgba(161,219,255,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(240,249,255,1) 0%,rgba(203,235,255,1) 47%,rgba(161,219,255,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(240,249,255,1) 0%,rgba(203,235,255,1) 47%,rgba(161,219,255,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(240,249,255,1) 0%,rgba(203,235,255,1) 47%,rgba(161,219,255,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(240,249,255,1) 0%,rgba(203,235,255,1) 47%,rgba(161,219,255,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f0f9ff', endColorstr='#a1dbff',GradientType=0 ); /* IE6-9 */

 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;	
	}		

/*body
	{
	background: url('http://adm.mayakoba.com/main/css/back.jpeg') no-repeat center center fixed; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;	
	}
	*/
</style>
</head>

<body>

<div id="container">
			<h2>
				<center>Cancelar Reservación</center>
			</h2>
                     <?php 
					 $querySQL1="SELECT hora_reservacion,guid from reservacion where fecha_reservacion='2012-11-24'";
						$resultado1=mysql_db_query($db1,$querySQL1,$con1); echo $resultado1;
			    $querySQL="SELECT r.id_reservacion,r.hora_reservacion,r.guid,j.nombre_jugador,j.hotel,j.habitacion,c.nombre_contacto,c.telefono1 
FROM reservacion r INNER JOIN ( contacto c  inner join jugadores j on j.id_contacto=c.id_contacto) on j.id_reservacion=r.id_reservacion WHERE r.fecha_reservacion='2012-11-24'"; 
				
    $resultado=mysql_db_query($db,$querySQL,$con);  echo $resultado;
	
				
	 ?>
          	 <form name="alta_usuario"  action="cancelareservacion.php" method="post" autocomplete="on">
             <p>
                <span style="position: relative; top: 0px; left: 0px;">
                    <label for="usernamesignup" class="uname" >Fecha de reservacion</label></span>
                  <span style="position: relative; top: 0px; left: 63px;"> 
                  <?php echo $fecha_reservacion ?> </span>
                </p>
                </p> 
                
			 <span style="position: relative; top: 0px; left: 0px;">
                    <label for="usernamesignup" class="uname" >Hora de reservacion</label></span>
					 
              <span style="position: relative; top: 130px; left: 123px;"> 	            
 		<label for="nombre">
        <table>
 <?php   
 $contador1=0;
 while($reservacion1=mysql_fetch_array($resultado1)){ ?>
	 <tr>
     <?php
	 echo $reservacion1["hora_reservacion"];
	 echo '<tr><td colspan="2">'.$reservacion1['guid'].'<input id="guid[]" name="guid[]" type="checkbox" value="'.$reservacion1['guid'].'">';
 }?></tr>
 </table>        </label></span>
            
            
            
            
            
  <span style="position: relative; top: -30px; left: 123px;"> 
 <table>
 <?php   
 $contador=0;
 while($reservacion=mysql_fetch_array($resultado)){
          
		    ?>
             
             <tr>
         <?php echo '<tr><td colspan="2">'.$reservacion['hora_reservacion'].'<input id="hora_reservacion[]" name="hora_reservacion[]" type="checkbox" value="'.$reservacion['hora_reservacion'].'">'; 
		       $hora_compara= $reservacion["hora_reservacion"];
		 		 echo $reservacion["nombre_jugador"];
				 echo $reservacion["hotel"];
				 echo $reservacion["habitacion"];
				 echo $reservacion["nombre_contacto"];
				 echo $reservacion["telefono1"];?>  </tr>
         <?php      
    }    
?>
			 
		</table>
        </span>
        </form>	 
			 
			 
		
</body>
</html>