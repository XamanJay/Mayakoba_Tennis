<!-- ====================== CONSULTA DE CALENDARIO ============= -->
<?php
error_reporting(0);
?>
        <script>
        $('a').click(function()
		{ 
		   var req; 
		   //grab the url of the current link
   			 var url = $(this).attr('href');

			alert(url);
		   if (window.XMLHttpRequest) 
		   { 
			  req = new XMLHttpRequest(); 
		   } 
		   else 
			{
			  if (window.ActiveXObject) 
			  { 
				 req = new ActiveXObject("Microsoft.XMLHTTP"); 
			  } 
			  document.getElementById(target).innerHTML = "Cargando<br>TB podemos poner una IMG de cargando..."; 
			  req.onreadystatechange = function() 
			  { 
				 if (req.readyState == 4) 
				 { 
					if (req.status == 200) 
					{ 
					   document.getElementById(target).innerHTML = req.responseText; 
					} 
					else 
					{ 
					   document.getElementById(target).innerHTML = "Error"; 
					} 
				 } 
			  } 
			  req.open("GET", url, true); 
			  req.send(""); 
			}
		 });
</script> 
        
        <!-- ====================== FINALIZA CONSUTA DE CALENDARIO ===== -->
<? 

$enlace = mysql_connect("db.mayakoba.com","reservation","pNTH2MBe");
mysql_select_db("reservation", $enlace);

$output = '';
$month = $_GET['month'];
$year = $_GET['year'];
	
if($month == '' && $year == '') { 
	$time = time();
	$month = date('m',$time);
    $year = date('Y',$time);
}

$date = getdate(mktime(0,0,0,$month,1,$year));
$today = getdate();
$hours = $today['hours'];
$mins = $today['minutes'];
$secs = $today['seconds'];

if(strlen($hours)<2) $hours="0".$hours;
if(strlen($mins)<2) $mins="0".$mins;
if(strlen($secs)<2) $secs="0".$secs;

$days=date("t",mktime(0,0,0,$month,1,$year));
$start = $date['wday']+1;
$name = $date['month'];
$year2 = $date['year'];
$offset = $days + $start - 1;
 
if($month==12) { 
	$next=1; 
	$nexty=$year + 1; 
} else { 
	$next=$month + 1; 
	$nexty=$year; 
}

if($month==1) { 
	$prev=12; 
	$prevy=$year - 1; 
} else { 
	$prev=$month - 1; 
	$prevy=$year; 
}

if($offset <= 28) $weeks=28; 
elseif($offset > 35) $weeks = 42; 
else $weeks = 35; 

$output .= "
<table class='cal' cellspacing='1'>
<tr>
	<td colspan='7'>
		<table class='calhead'>
		<tr>
			<td>
				<a href='javascript:navigate($prev,$prevy)'><img src='calLeft.gif'></a> <a href='javascript:navigate(\"\",\"\")'><img src='calCenter.gif'></a> <a href='javascript:navigate($next,$nexty)'><img src='calRight.gif'></a>
			</td>
			<td align='right'>
				<div>$name $year2</div>
			</td>
		</tr>
		</table>
	</td>
</tr>
<tr class='dayhead'>
	<td>Sun</td>
	<td>Mon</td>
	<td>Tue</td>
	<td>Wed</td>
	<td>Thu</td>
	<td>Fri</td>
	<td>Sat</td>
</tr>";

$col=1;
$cur=1;
$next=0;

for($i=1;$i<=$weeks;$i++) { 
	if($next==3) $next=0;
	if($col==1) $output.="<tr class='dayrow'>"; 
  	
	$output.="<td valign='top' >";

	if($i <= ($days+($start-1)) && $i >= $start) {
		$output.="<div class='day'><b";

		if(($cur==$today[mday]) && ($name==$today[month])) $output.=" style='color:#C00';background:#F00;";

		//Validamos si existen registros en la base de datos de ese día para poner de color todo
		
		//validamos que tengan 2 digitos
		if(strlen($cur)==1)
		{
			$cur= '0'.$cur;
		}
		//armamos la fecha 
		//$fechabuscar =$year.'-'.$month.'-'.$cur.' 00:00:00';
		$fechabuscar=$year.'-'.$month.'-'.$cur;
		
		$resultado = mysql_query("SELECT * FROM reservacion where fecha_reservacion = '$fechabuscar'", $enlace);
		$número_filas = mysql_num_rows($resultado);
		
		if(strlen($month)<2){
			 $month1="0".$month;
		}
		else
		{
			 $month1=$month;
		}
		$fechabuscar=$cur.'/'.$month1.'/'.$year;
		if($número_filas==0)
		{
			//Agregamos a todos los días tengan el link para crear una nueva consulta.
			$fechabuscar=$fechabuscar.' 06:00';
			$url_link = 'Cargar(reservacion_new.php?jc_date='.$fechabuscar.',MiContenido)';
			
			$output.="><div class='desocupado'> <a href='reservacion_new.php?jc_date=$fechabuscar' style='color: #FFFFFF'>  <font color='#FFFFFF'>$cur</font> </a> </div> </b></div></td>";
			
			//$output.="><div class='desocupado'> <a href='reservacion_new.php?jc_date=$fechabuscar'> <font color='#FFFFFF'>$cur</font> </a> </div> </b></div></td>";
		}
		else
		{
			$url_link = 'Cargar(detallecalendario.php?jc_date='.$fechabuscar.',MiContenido)';
			$output.="><div class='ocupado'> <a href='detallecalendario.php?jc_date=$fechabuscar'> <font color='#FFFFFF'>$cur</font> </a> </div> </b></div></td>";
		}
		$cur++; 
		$col++; 
		
	} else { 
		$output.="&nbsp;</td>"; 
		$col++; 
	}  
	    
    if($col==8) { 
	    $output.="</tr>"; 
	    $col=1; 
    }
}

$output.="</table>";
  
echo $output;

?>
