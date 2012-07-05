<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="ISO-8859-1">
	<title>EURO 2012</title>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body {
			padding-top: 60px;
		}
	</style>
	<link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
</head>
<body>
<?php include_once("analyticstracking.php") ?>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="#" style="vertical-align:top"><img src="../images/eurologo.png" height="20" style="vertical-align:top"> EURO<strong style="vertical-align:top">Limbo</strong> 2012</a>
				<ul class="nav">
					<li><a href="../">Home</a></li>
					<li class="dropdown" id="menu1">
                    	<a class="dropdown-toggle" data-toggle="dropdown"  href="#">
                    		 Partidos
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu active">
							<li><a href="../pages/faseGrupos.php">Fase de grupos</a></li>
							<li><a href="../pages/cuartos.php">Cuartos de final</a></li>
							<li><a href="../pages/semifinal.php">Semifinal</a></li>
							<li ><a href="../pages/final.php">Final</a></li>
						</ul>
					</li>
                    <li class="active"><a href="#">Clasificación</a></li>
				</ul>
			</div>
		</div>
	</div>


<? 
include "../pages/conexion_bd.php";
include_once "../pages/iconos_usuarios.php";
?>
			<div class="span10">
				<div class="container">
					<h1>Clasificación de apostantes</h1>
                    
<h3>Final</h3>

<?
	//Clasificación fase de grupos
	$result=mysql_query("Select *, @rownum:=@rownum+1 AS pos from (
	select APOSTANTE as apostante, sum(GANANCIA) as gananc, sum(if(APUESTA=RESULTADO,1,0)) as puntuacion,count(*) as numapuestas
	from partidos 
	where APOSTANTE is not null and APOSTANTE <>''
	and RESULTADO is not null AND RESULTADO <>''
	and APUESTA is not null AND APUESTA <> ''
	and FASE = 'FINAL'
	group by APOSTANTE
	order by puntuacion desc, gananc desc) puntuacio, (SELECT @rownum:=0) r;");			
?>

<table class="table table-bordered">
<thead>
    <tr>
        <th style="text-align:center">Pos.</th>
   		<th style="text-align:center">Apostante</th>
        <th style="text-align:center">N&deg; de Apuestas</th>
        <th style="text-align:center">Puntuación</th>
  		<th style="text-align:center">Euros</th>
    </tr>
</thead>
<tbody>
<? 
$tot_gan=0;
  while ($row=mysql_fetch_array($result))
	{
	$tot_gan=$tot_gan+$row["gananc"];
	$date = date_create($row["fecha"]);
	echo '<tr>';
	echo '<td style="text-align:center">'.$row["pos"];
	switch($row["pos"]){
		case 1:
			echo ' <span class="label label-success">Final</span>';
			break;
	}
	echo '</td>';
	echo '<td style="text-align:center"> <img src="../images/'.get_ico_usuario($row["apostante"]).'" height="20"/> '.$row["apostante"].'</td>';
	echo '<td style="text-align:center">'.$row["numapuestas"].'</td>';
	echo '<td style="text-align:center">'.$row["puntuacion"].'</td>';
	echo '<td style="text-align:center">'.$row["gananc"].'&euro;</td>';
	echo '</tr>	';
	}
	mysql_free_result($result);
	 echo '<tr>';
	echo '<td colspan="4" style="text-align:center"><strong>Ganancia Total</strong></td>';
	echo '<td style="text-align:center"><strong>'.$tot_gan.'&euro;</strong></td>';
	echo '</tr>     ';
?>
  </tbody>
</table>                      
                    
<h3>Semifinal</h3>

<?
	//Clasificación fase de grupos
	$result=mysql_query("Select *, @rownum:=@rownum+1 AS pos from (
	select APOSTANTE as apostante, sum(GANANCIA) as gananc, sum(if(APUESTA=RESULTADO,1,0)) as puntuacion,count(*) as numapuestas
	from partidos 
	where APOSTANTE is not null and APOSTANTE <>''
	and RESULTADO is not null AND RESULTADO <>''
	and APUESTA is not null AND APUESTA <> ''
	and FASE = 'SEMI'
	group by APOSTANTE
	order by puntuacion desc, gananc desc) puntuacio, (SELECT @rownum:=0) r;");			
?>

<table class="table table-bordered">
<thead>
    <tr>
        <th style="text-align:center">Pos.</th>
   		<th style="text-align:center">Apostante</th>
        <th style="text-align:center">N&deg; de Apuestas</th>
        <th style="text-align:center">Puntuación</th>
  		<th style="text-align:center">Euros</th>
    </tr>
</thead>
<tbody>
<? 
$tot_gan=0;
  while ($row=mysql_fetch_array($result))
	{
	$tot_gan=$tot_gan+$row["gananc"];
	$date = date_create($row["fecha"]);
	echo '<tr>';
	echo '<td style="text-align:center">'.$row["pos"];
	switch($row["pos"]){
		case 1:
			echo ' <span class="label label-success">Final</span>';
			break;
		default:
			echo ' <span class="label label-warning">Semifinal</span>';
			break;
	}
	echo '</td>';
	echo '<td style="text-align:center"> <img src="../images/'.get_ico_usuario($row["apostante"]).'" height="20"/> '.$row["apostante"].'</td>';
	echo '<td style="text-align:center">'.$row["numapuestas"].'</td>';
	echo '<td style="text-align:center">'.$row["puntuacion"].'</td>';
	echo '<td style="text-align:center">'.$row["gananc"].'&euro;</td>';
	echo '</tr>	';
	}
	mysql_free_result($result);
	 echo '<tr>';
	echo '<td colspan="4" style="text-align:center"><strong>Ganancia Total</strong></td>';
	echo '<td style="text-align:center"><strong>'.$tot_gan.'&euro;</strong></td>';
	echo '</tr>     ';
?>
  </tbody>
</table>                    
                    
                    
<!-- Cuartos de final-->
<h3>Cuartos de final</h3>

<?
	//Clasificación fase de grupos
	$result=mysql_query("Select *, @rownum:=@rownum+1 AS pos from (
	select APOSTANTE as apostante, sum(GANANCIA) as gananc, sum(if(APUESTA=RESULTADO,1,0)) as puntuacion,count(*) as numapuestas
	from partidos 
	where APOSTANTE is not null and APOSTANTE <>''
	and RESULTADO is not null AND RESULTADO <>''
	and APUESTA is not null AND APUESTA <> ''
	and FASE = 'CUARTOS'
	group by APOSTANTE
	order by puntuacion desc, gananc desc) puntuacio, (SELECT @rownum:=0) r;");			
?>

<table class="table table-bordered">
<thead>
    <tr>
        <th style="text-align:center">Pos.</th>
   		<th style="text-align:center">Apostante</th>
        <th style="text-align:center">N&deg; de Apuestas</th>
        <th style="text-align:center">Puntuación</th>
  		<th style="text-align:center">Euros</th>
    </tr>
</thead>
<tbody>
<? 
$tot_gan=0;
  while ($row=mysql_fetch_array($result))
	{
	$tot_gan=$tot_gan+$row["gananc"];
	$date = date_create($row["fecha"]);
	echo '<tr>';
	echo '<td style="text-align:center">'.$row["pos"];
	switch($row["pos"]){
		case 1:
		case 2:
			echo ' <span class="label label-warning">Semifinal</span>';
			break;
		default:
			echo ' <span class="label label-important">Cuartos</span>';
			break;
	}
	echo '</td>';
	echo '<td style="text-align:center"> <img src="../images/'.get_ico_usuario($row["apostante"]).'" height="20"/> '.$row["apostante"].'</td>';
	echo '<td style="text-align:center">'.$row["numapuestas"].'</td>';
	echo '<td style="text-align:center">'.$row["puntuacion"].'</td>';
	echo '<td style="text-align:center">'.$row["gananc"].'&euro;</td>';
	echo '</tr>	';
	}
	mysql_free_result($result);
	 echo '<tr>';
	echo '<td colspan="4" style="text-align:center"><strong>Ganancia Total</strong></td>';
	echo '<td style="text-align:center"><strong>'.$tot_gan.'&euro;</strong></td>';
	echo '</tr>     ';
?>
  </tbody>
</table>
          


<!-- FASE DE GRUPOS-->
<h3>Fase de grupos</h3>

<?
	//Clasificación fase de grupos
	$result=mysql_query("Select *, @rownum:=@rownum+1 AS pos from (
	select APOSTANTE as apostante, sum(GANANCIA) as gananc, sum(if(APUESTA=RESULTADO,1,0)) as puntuacion,count(*) as numapuestas
	from partidos 
	where APOSTANTE is not null and APOSTANTE <>''
	and RESULTADO is not null AND RESULTADO <>''
	and APUESTA is not null AND APUESTA <> ''
	and FASE like 'GRUPO%'
	group by APOSTANTE
	order by puntuacion desc, gananc desc) puntuacio, (SELECT @rownum:=0) r;");			
?>

<table class="table table-bordered">
<thead>
    <tr>
        <th style="text-align:center">Pos.</th>
   		<th style="text-align:center">Apostante</th>
        <th style="text-align:center">N&deg; de Apuestas</th>
        <th style="text-align:center">Puntuación</th>
  		<th style="text-align:center">Euros</th>
    </tr>
</thead>
<tbody>
<? 
$tot_gan=0;
  while ($row=mysql_fetch_array($result))
	{
	$tot_gan=$tot_gan+$row["gananc"];
	$date = date_create($row["fecha"]);
	echo '<tr>';
	echo '<td style="text-align:center">'.$row["pos"];
	switch($row["pos"]){
		case 1:
		case 2:
		case 3:
		case 4:
			echo ' <span class="label label-important">Cuartos</span>';
			break;
		default:
			echo ' <span class="label">Grupos</span>';
	}
	echo '</td>';
	echo '<td style="text-align:center"> <img src="../images/'.get_ico_usuario($row["apostante"]).'" height="20"/> '.$row["apostante"].'</td>';
	echo '<td style="text-align:center">'.$row["numapuestas"].'</td>';
	echo '<td style="text-align:center">'.$row["puntuacion"].'</td>';
	echo '<td style="text-align:center">'.$row["gananc"].'&euro;</td>';
	echo '</tr>	';
	}
	mysql_free_result($result);
	 echo '<tr>';
	echo '<td colspan="4" style="text-align:center"><strong>Ganancia Total</strong></td>';
	echo '<td style="text-align:center"><strong>'.$tot_gan.'&euro;</strong></td>';
	echo '</tr>     ';
?>
  </tbody>
</table>
                  
                 
                  
</div>
				<!--container -->
			</div>
		</div>
	</div>

	<script
		src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
