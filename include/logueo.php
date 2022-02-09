<?php 
session_start();
error_reporting(0);

require_once("conexion.php");
	

$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
//echo $isiPad;
//Validamos que haya ingresado los campos 

$bandera=true;
$password = md5(mysql_escape($_POST["password"]));

//Validamos que haya ingresado los campos 
if ($_POST["usuario"]=="")
{
$bandera=false;
echo "<script type='text/javascript'>
			alert('Please enter the user');
			javascript:history.back();
		  </script>";
		
}


if ($_POST["password"]=="")
{
$bandera=false;
echo "<script type='text/javascript'>
			alert('Please enter the password');
			javascript:history.back();
		  </script>";
}

//recuperamos el hotel que seleccionó
$hotel = $_POST["empresa"];

if($hotel=='Rosewood')
{
	$dominioempresa='rosewoodhotels.com';	
}
elseif($hotel=='Fairmont')
{
	$dominioempresa='fairmont.com';	
}
elseif($hotel=='Andaz')
{
	$dominioempresa='andaz.com';	
}
elseif(strtoupper($hotel)==strtoupper('Banyan Tree'))
{
	$dominioempresa='banyantree.com';	
}
elseif($hotel=='Proshop')
{
	//$dominioempresa='condominiomayakoba.com';	
	$dominioempresa='mayakoba-ac.com';
	
}

//Validamos si ha seleccionado el resort y si coincide el reort con el dominio lo dejamos pasar de lo contrario lo regresamos al index
$correo_session=$_POST["usuario"];
$arrEmail = explode("@",$correo_session);
$arrCorreos;
$intContador =0;

if(trim($arrEmail[1])==trim($dominioempresa))
{
	
}

else 
{
	echo "<script type='text/javascript'>
			alert('Favor de seleccionar el resort.');
			window.location='http://reservation.mayakoba.com';
		  </script>";
	exit();
	
}	
	
?>

<style type="text/css">
  /*this is what we want the div to look like
    when it is not showing*/
  div.loading-invisible{
    /*make invisible*/
    display:none;
  }

  /*this is what we want the div to look like
    when it IS showing*/
  div.loading-visible{
    /*make visible*/
    display:block;

    /*position it 200px down the screen*/
    position:absolute;
    top:200px;
    left:0;
    width:100%;
    text-align:center;

    /*in supporting browsers, make it
      a little transparent*/
    background:#fff;
    filter: alpha(opacity=75); /* internet explorer */
    -khtml-opacity: 0.75;      /* khtml, old safari */
    -moz-opacity: 0.75;       /* mozilla, netscape */
    opacity: 0.75;           /* fx, safari, opera */
    border-top:1px solid #ddd;
    border-bottom:1px solid #ddd;
	position: fixed;
  
  }
</style>


<script type="text/javascript">
  document.getElementById("loading").className = "loading-visible";
  var hideDiv = function(){document.getElementById("loading").className = "loading-invisible";};
  var oldLoad = window.onload;
  var newLoad = oldLoad ? function(){hideDiv.call(this);oldLoad.call(this);} : hideDiv;
  window.onload = newLoad;
</script>
<?php



if($bandera=true)
{
	//Validamos si existe el usuario en la base de datos
	$sql="select * from usuario where usuario ='".mysql_escape($_POST["usuario"])."'"; 
	$res=mysql_db_query($db,$sql,$con);
	if(mysql_num_rows($res) == 0)
	{
		echo "<div id='loading' class='loading-visible'>";
		echo "<img src='/include/loader.gif'/> <br> Back to login...";
		echo "</div>";
		echo "<script type='text/javascript'>
				alert('El usuario no extsite en la base de datos.');
				window.location='http://reservation.mayakoba.com';
			  </script>";
	}
	else
	{
		// validamos si el usuario y contraseña coinciden en la base de datos
		$sql="select * from usuario where usuario='".mysql_escape($_POST["usuario"])."' and password='$password'";
		
		$result=mysql_db_query($db,$sql,$con);
		if(mysql_num_rows($result)==0)
		{
			echo "<div id='loading' class='loading-visible'>";
			echo "<img src='/include/loader.gif'/> <br> Fail login...";
			echo "</div>";
			echo "<script type='text/javascript'>
				alert('Please verify user and password');
				window.location='http://reservation.mayakoba.com/';
			  </script>";
		}
		else
		{
		//Damos accesso a nuestros contenidos restringuidos
			//$_SESSION["usuario"]= $_POST["nombre"];
			//recuperamos la IP del usuario
			$ip=$_SERVER['REMOTE_ADDR'];
			//recuperamos el nombre del PC
			$nomPC =  gethostbyaddr($_SERVER['REMOTE_ADDR']);
			$loginwhen=date("Y/m/d H:i:s",time());
			$query="insert into log_entrada(email,ip,getway,fecha_sistema) values('".$_POST["usuario"]."','$ip','$nomPC',now())";
			$resultado=mysql_db_query($db,$query,$con);
			
			//Damos accesso a nuestros contenidso restringuidos
			$_SESSION["usuario"]= mysql_escape($_POST["usuario"]);
			//guardamos la hora en que se ah logueado para poder medir tiempos de sesiones
			$ahora = date("Y-n-j H:i:s");
			$_SESSION['fs']=$ahora;
			$sesion_unica= uniqid();
			$_SESSION['sesion_unica']=md5($sesion_unica);
			$diar=date(d);
			$mesr=date(m);
			$anio=date(Y);
			$dia_actual=$diar."/".$mesr."/".$anio;
			//Agregamos como sesión el dominio y el hotel
			$_SESSION["dominiom"]=$dominioempresa;
			$_SESSION["hotel"]= $hotel;
			
			//Damos accesso a nuestros contenidos restringuidos
			//$_SESSION["usuario"]= $_POST["nombre"];
			echo "<div id='loading' class='loading-visible'>";
			echo "<img src='/include/loader.gif'/> <br> Please wait redirecting...";
			echo "</div>";
			
			echo "<script type='text/javascript'>
			setTimeout ('redireccionar()', 2000); //tiempo expresado en milisegundos
			function redireccionar(){
			window.location='http://reservation.mayakoba.com/detallecalendario.php?jc_date=$dia_actual';
			} 
			</script>";

			
			
		}
	}
}

function mysql_escape($cadena) {
    if(get_magic_quotes_gpc() != 0) {
        $cadena = stripslashes($cadena);
    }
    return mysql_real_escape_string($cadena);
} 

?>