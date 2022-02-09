<!doctype html>
<html class="no-js">

	<head>
		<meta charset="utf-8"/>
		<title>Condominio Mayakoba</title>
		 
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
		
        <!-- JCALENDAR -->
         <link href="css/jCalendar.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="js/jCalendar.js"></script>
        
        
        <style>
			.login {
					 width: 200px;
					 margin: 0 auto;
				  }
</style>
	</head>
	
	





<form name="alta_usuario"  action="insertausuario.php" method="post" autocomplete="on">
                <h2 > NUEVO USUARIO </h2>
               <p>
                <span style="position: relative; top: 0px; left: 0px;">
                    <label for="usernamesignup" class="uname" >Nombre</label></span>
            <body class="home" >
	
	
		<!-- HEADER -->
		<header>
			<div class="wrapper cf">
				
				<div id="logo">
					<a href="index.html"><img  src="img/logo.png" alt="Simpler"></a>
				</div>
				
				
			</div>
		</header>
		<!-- ENDS HEADER -->
		
		<!-- MAIN -->
		<div id="main">
			<div class="wrapper cf">
				
				<p><h1><font color="#FFFFFF">NUEVO USUARIO</h1></p>
                <form name="alta_usuario"  action="insertausuario.php" method="post" autocomplete="on">
                
               <p>
                <span style="position: relative; top: 0px; left: 0px;">
                    <label for="usernamesignup" class="uname" >Nombre</label></span>
                  <span style="position: relative; top: 0px; left: 163px;">  <input id="usernamesignup" name="nombre" required="required" type="text" placeholder="" /> </span>
                </p> 
                <p>
                <span style="position: relative; top: 0px; left: 0px;">
                    <label for="usernamesignup" class="uname">Apellido</label></span>
                    <span style="position: relative; top: 0px; left: 160px;">
                    <input id="usernamesignup" name="apellido_paterno" required="required" type="text" placeholder="" /> </span>
                </p>
                <p>
                <span style="position: relative; top: 0px; left: 0px;">
                    <label for="emailsignup" class="youmail"  > E-mail</label></span>
                    <span style="position: relative; top: 0px; left: 172px;">
                    <input id="emailsignup" name="correo" required="required" type="email" placeholder=""/></span>
                </p>
                <p>
                <span style="position: relative; top: 0px; left: 0px;">
                    <label for="passwordsignup" class="youpasswd">Password </label></span>
                    <span style="position: relative; top: 0px; left: 155px;">
                    <input id="passwordsignup" name="contrasena" required="required" type="password" placeholder=""/></span>
                </p>
                <p>
                <span style="position: relative; top: 0px; left: 0px;">
                    <label for="passwordsignup_confirm" class="youpasswd" >Por favor confirma el password </label></span>
                    <span style="position: relative; top: 0px; left: 18px;">
                    <input id="passwordsignup_confirm" name="contrasena1" required="required" type="password" placeholder=""/></span>
                </p> 
                Nota: La contraseña puede contener mayusculas, minusculas y números. 
                <p class="signin button">
                <span style="position: relative; top: 0px; left: -20px;">
                    <input type="submit" value="Crear"/> </span>
                </p></font>
            </form>