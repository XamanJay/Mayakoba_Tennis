<!doctype html>
<html class="no-js">

	<head>
		<meta charset="utf-8"/>
		<title>CONDOMINIO MAYAKOBA</title>
		 
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" media="all" href="css/style.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<!-- Adding "maximum-scale=1" fixes the Mobile Safari auto-zoom bug: http://filamentgroup.com/examples/iosScaleBug/ -->		
				
		<!-- JS -->
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/tabs.js"></script>
		<script src="js/css3-mediaqueries.js"></script>
		<script src="js/jquery.columnizer.min.js"></script>
		
		<!-- Isotope -->
		<script src="js/jquery.isotope.min.js"></script>
		
		<!-- Lof slider -->
		<script src="js/jquery.easing.js"></script>
		<script src="js/lof-slider.js"></script>
		<link rel="stylesheet" href="css/lof-slider.css" media="all"  /> 
		<!-- ENDS slider -->
		
		<!-- Tweet -->
		<link rel="stylesheet" href="css/jquery.tweet.css" media="all"  /> 
		<script src="js/tweet/jquery.tweet.js" ></script> 
		<!-- ENDS Tweet -->
		
		<!-- superfish -->
		<link rel="stylesheet" media="screen" href="css/superfish.css" /> 
		<script  src="js/superfish-1.4.8/js/hoverIntent.js"></script>
		<script  src="js/superfish-1.4.8/js/superfish.js"></script>
		<script  src="js/superfish-1.4.8/js/supersubs.js"></script>
		<!-- ENDS superfish -->
		
		<!-- prettyPhoto -->
		<script  src="js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		<link rel="stylesheet" href="js/prettyPhoto/css/prettyPhoto.css"  media="screen" />
		<!-- ENDS prettyPhoto -->
		
		<!-- poshytip -->
		<link rel="stylesheet" href="js/poshytip-1.1/src/tip-twitter/tip-twitter.css"  />
		<link rel="stylesheet" href="js/poshytip-1.1/src/tip-yellowsimple/tip-yellowsimple.css"  />
		<script  src="js/poshytip-1.1/src/jquery.poshytip.min.js"></script>
		<!-- ENDS poshytip -->
		
		<!-- JCarousel -->
		<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
		<link rel="stylesheet" media="screen" href="css/carousel.css" /> 
		<!-- ENDS JCarousel -->
		
		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>

		<!-- modernizr -->
		<script src="js/modernizr.js"></script>
		
		<!-- SKIN -->
		<link rel="stylesheet" media="all" href="css/skin.css"/>
		
		<!-- Less framework -->
		<link rel="stylesheet" media="all" href="css/lessframework.css"/>
		
		<!-- flexslider -->
		<link rel="stylesheet" href="css/flexslider.css" >
		<script src="js/jquery.flexslider.js"></script>
		
        <style>
			.login {
					 width: -30px;
					 margin: 0 auto;
				  }
			/*
			  +------------------------------------------------------------------+
			  | Green-Beast.com                                                  |
			  | CSS: List Calendar                                               |
			  | Cascading Style Sheet                                            |
			  | Copyright March 2006                                             |
			  | Use with attribution by visible link please!                     |
			  | Attribute to: <a href="http://green-beast.com/">Mike Cherim</a>  |
			  +------------------------------------------------------------------+
			*/ 
			
			/* 
			  NOTE: To get this to work properly, margin and padding must be set
			  to 0 (zero). This can be done site-wide or simply for the container
			  used to hold this calandar and its elements where needed.
			 
			  Site wide:
			  * {
				margin : 0;
				padding : 0;
			  }
			
			  Play around with it and you'll get it right.
			*/
			
			
			/* div for the calendar markup - text must be centered */
			div#calendar {
			  margin : 0 auto;
			  padding : 10px;
			  text-align : center;
			  width : 21em;
			  border : 1px solid #ccc;
			}
			
			/* calendar heading color */
			h2.calendar {
			  color : #669900;
			  font-weight : normal;
			}
			
			/* list info - monospace font must be used */
			ul#days, ul.weeks {
			  font-family : 'courier new', monospace;
			  list-style-type : none;
			  margin : 20px 0 20px 0;
			}
			
			/* day-box span styles - adjust with padding */ 
			ul#days li span {
			  background-color : #669900;
			  border : 1px solid #000;
			  cursor : help;
			  font-weight : bold;
			  color : #fff;
			  padding : 5px;
			}
			
			/* active links boxes default state - adjust with padding */
			ul.weeks li a.al, ul.weeks li a.na  { 
			  color : #666;
			  text-decoration : none;
			  background-color : #ffffcc;
			  border : 1px solid #999;
			  padding : 5px;
			}
			
			/* all states of not-used links */
			ul.weeks li a.na, ul.weeks li a.na:hover, ul.weeks li a.na:focus, ul.weeks li a.na:active   { 
			  background : transparent;
			  color : #666;
			  cursor : default;
			}
			
			/* hover and focus state of active links */
			ul.weeks li a.al:hover, ul.weeks li a.al:focus, ul.weeks li a.al:active {
			  color : #000;
			  background-color : #eecc11;
			  border : 1px solid #000;
			  text-decoration : none;
			  cursor : pointer;
			}
			
			/* not used link boxes - color and background should match - adjust with padding */
			ul.weeks li a.nu { 
			  color : #eee;
			  padding : 5px;
			  border : 1px solid #ccc;
			  background-color : #eee;
			  cursor : default;
			}
			
			/* to hide link separators */
			span.sep {
			  display : none;
			}
			
			/* this needs to be in conditional comment for IE only */
			div#calendar {
			  font-size : 0.9em;
			  letter-spacing : 0.001em;
			}
			
			/* End Styles */
        </style>
        
        <!-- CALENDARIO -->
        <?
			$anoInicial = '2012';
			$anoFinal = '2014';
			$funcionTratarFecha = 'document.location = "?dia="+dia+"&mes="+mes+"&ano="+ano;';
		?>
		<script>
			function tratarFecha(dia,mes,ano){
			  <?=$funcionTratarFecha?>
			}
		</script>
	</head>
	
	
	<body class="home">
	
	
		<!-- HEADER -->
		<header>
			<div class="wrapper cf">
				
				<div id="logo">
					<a href="index.html"><img  src="img/logotenis.png" alt="Simpler" width="280px" height="53px"></a>
				</div>
				
				
			</div>
		</header>
		<!-- ENDS HEADER -->
		
		<!-- MAIN -->
		<div id="main">
			<div class="wrapper cf">
				<div class="login">
                	
                    
                    <div id="calendar">
                     <h2 class="calendar">
                     	<?
							$fecha = getdate(time());
							if(isset($_GET["dia"]))$dia = $_GET["dia"];
							else $dia = $fecha['mday'];
							if(isset($_GET["mes"]))$mes = $_GET["mes"];
							else $mes = $fecha['mon'];
							if(isset($_GET["ano"]))$ano = $_GET["ano"];
							else $ano = $fecha['year'];
							$fecha = mktime(0,0,0,$mes,$dia,$ano);
							$fechaInicioMes = mktime(0,0,0,$mes,1,$ano);
							$fechaInicioMes = date("w",$fechaInicioMes);
						?>
								<select size="1" name="mes" class="m1" onChange="document.location = '?dia=<?=$dia?>&mes=' + document.forms[0].mes.value + '&ano=<?=$ano?>';">
						<?
							$meses = Array ('enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
							for($i = 1; $i <= 12; $i++){
							  echo '      <option ';
							  if($mes == $i)echo 'selected ';
							  echo 'value="'.$i.'">'.$meses[$i-1]."\n";
							}
						?>
								</select>&nbsp;&nbsp;&nbsp;<select size="1" name="ano" class="m1" onChange="document.location = '?dia=<?=$dia?>&mes=<?=$mes?>&ano=' + document.forms[0].ano.value;">
						<?
							for ($i = $anoInicial; $i <= $anoFinal; $i++){
							  echo '      <option ';
							  if($ano == $i)echo 'selected ';
							  echo 'value="'.$i.'">'.$i."\n";
							}
						?>
								</select><br>
								              
                     </h2>
                     <?
					 	$diasSem = Array ('<ul id="days"><li><span title="Monday">MO</span> <span class="sep">|</span>','<span title="Tuesday">TU</span> <span class="sep">|</span>','<span title="Tuesday">TU</span> <span class="sep">|</span>','<span title="Thursday">TH</span> <span class="sep">|</span>','<span title="Friday">FR</span> <span class="sep">|</span>','<span title="Friday">FR</span> <span class="sep">|</span>','<span title="Saturday">SA</span> </li></ul>');
						$ultimoDia = date('t',$fecha);
						$numMes = 0;
						for ($fila = 0; $fila < 7; $fila++)
						{
							echo "      <tr>\n";
							for ($coln = 0; $coln < 7; $coln++)
							{
								$posicion = Array (1,2,3,4,5,6,0);
								 echo '      ';
								 if($fila == 0)
								 {
									 echo '<a class="na" href="#" title="">06</a> <span class="sep">|</span> ';
								 }
								 if($dia-1 == $numMes)
								 {
									 echo ' <a class="al" href="#" title="Active Date Link">02</a> <span class="sep">|</span>';
								 }
								
								 echo '        ';
								 
								 if($fila == 0)
								 {
									 echo '<font color="#D4D0C8">'.$diasSem[$coln];
								 }
								 elseif(($numMes && $numMes < $ultimoDia) || (!$numMes && $posicion[$coln] == $fechaInicioMes))
								 {
									  echo '<a href="#" onclick="tratarFecha('.(++$numMes).','.$mes.','.$ano.')">';
									  if($dia == $numMes)
									  {
										echo '<font color="#FFFFFF">';  
									  }
									   echo ($numMes).'</a>';
								 }
								  
								  echo "</td>\n";
							}
							echo "      </tr>\n";
						}
					 ?>
                      
                    <!-- On links Below: NU = Not Used; NA = Not Active; AL = Active Link -->
                       <ul class="weeks">
                        <li>
                         <a class="nu" href="#" title="">--</a> <span class="sep">|</span>
                         <a class="nu" href="#" title="">--</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">01</a> <span class="sep">|</span>
                         <a class="al" href="#" title="Active Date Link">02</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">03</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">04</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">05</a>
                        </li>
                       </ul>
                       <ul class="weeks">
                        <li>
                         <a class="na" href="#" title="">06</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">07</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">08</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">09</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">10</a> <span class="sep">|</span>
                         <a class="al" href="#" title="Active Date Link">11</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">12</a>
                        </li>
                       </ul>
                       <ul class="weeks">
                        <li>
                         <a class="al" href="#" title="Active Date Link">13</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">14</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">15</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">16</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">17</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">18</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">19</a>
                        </li>
                       </ul>
                       <ul class="weeks">
                        <li>
                         <a class="na" href="#" title="">20</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">21</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">22</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">23</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">24</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">25</a> <span class="sep">|</span>
                         <a class="al" href="#" title="Active Date Link">26</a>
                        </li>
                       </ul>
                       <ul class="weeks">
                        <li>
                         <a class="na" href="#" title="">27</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">28</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">29</a> <span class="sep">|</span>
                         <a class="al" href="#" title="Active Date Link">30</a> <span class="sep">|</span>
                         <a class="na" href="#" title="">31</a> <span class="sep">|</span>
                         <a class="nu" href="#" title="">--</a> <span class="sep">|</span>
                         <a class="nu" href="#" title="">--</a>
                        </li>
                       </ul>
                    </div><!--calendar-->
                    
                </div>
				
			<!-- featured -->
			
			
			
			
			</div><!-- ENDS WRAPPER -->
		</div>
		<!-- ENDS MAIN -->
		
		
		<!-- FOOTER -->
		<footer>
			
		</footer>
		<!-- ENDS FOOTER -->
		
	</body>
	
	
	
</html>