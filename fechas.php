<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<?php

echo daysDifference('2012-11-22','2012-11-22');
echo "<br>";
$fecha_0 = "2012-11-23 20:00:00";
$fecha_1 = "2012-11-24 21:00:00";
echo diferenciaEntreFechas($fecha_1, $fecha_0, "HORAS", FALSE);

echo "<br>";
$dia_now=date(d);
$mes_now = date(m);
$agno_now = date(Y);
$hora_now = date(G);
$minutos_now = date(i);


echo $ahora =$agno.'-'.$mes.'-'.$dia.' '.$hora.':'.$minutos;
$fecha = date_create($ahora);
//echo date_format($fecha, 'Y-m-d H:i:s').' ok';

function daysDifference($endDate, $beginDate){
$date_parts1=explode("-", $beginDate);
$date_parts2=explode("-", $endDate);
$start_date=gregoriantojd($date_parts1[1], $date_parts1[2], $date_parts1[0]);
$end_date=gregoriantojd($date_parts2[1], $date_parts2[2], $date_parts2[0]);
return $end_date - $start_date;
}

/**
 * Devuelve la diferencia entre 2 fechas según los parámetros ingresados
 * @author Gerber Pacheco
 * @param string $fecha_principal Fecha Principal o Mayor
 * @param string $fecha_secundaria Fecha Secundaria o Menor
 * @param string $obtener Tipo de resultado a obtener, puede ser SEGUNDOS, MINUTOS, HORAS, DIAS, SEMANAS
 * @param boolean $redondear TRUE retorna el valor entero, FALSE retorna con decimales
 * @return int Diferencia entre fechas
 */
function diferenciaEntreFechas($fecha_principal, $fecha_secundaria, $obtener = 'SEGUNDOS', $redondear = false){
   $f0 = strtotime($fecha_principal);
   $f1 = strtotime($fecha_secundaria);
   if ($f0 < $f1) { $tmp = $f1; $f1 = $f0; $f0 = $tmp; }
   $resultado = ($f0 - $f1);
   switch ($obtener) {
       default: break;
       case "MINUTOS"   :   $resultado = $resultado / 60;   break;
       case "HORAS"     :   $resultado = $resultado / 60 / 60;   break;
       case "DIAS"      :   $resultado = $resultado / 60 / 60 / 24;   break;
       case "SEMANAS"   :   $resultado = $resultado / 60 / 60 / 24 / 7;   break;
   }
   if($redondear) $resultado = round($resultado);
   return $resultado;
}
?>
</body>
</html>