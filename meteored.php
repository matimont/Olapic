<!-- EN ESTE EJEMPLO VAMOS A MOSTRAR LAS PREVISIONES GENERALES DIARIAS PARA 7 DIAS QUE NOS DA EL 1º FICHERO XML 
Aquí vamos a recuperar la ruta del fichero XML para la localidad deseada a través de un formulario en pantalla. pero puede 
indicarlo directamente en el codigo en una variable $file = "http://api.tiempo.com/index.php?api_lang=es&localidad=313&affiliate_id=..."  -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
	<html>
	<head> 	<link href="./estilos.css" rel="stylesheet" type="text/css" /> </head>
	<body>
	
<?php
	
//DECLARACION DE ARRAYS
$var1 = array(0=>"Temp min."); //ARRAY TEMPMIN, ALMACENAMOS LA TEMPERATURA MINIMA
$var2 = array(0=>"Temp max."); //ARRAY TEMPMAX, ALMACENAMOS LA TEMPERATURA MAXIMA
$var4 = array(0=>"Simbolo."); //ARRAY SIMBOLO, ALMACENAMOS EL ID DEL ICONO DEL TIEMPO
$var4_des = array(0=>"Desc. Simbolo"); //ARRAY DES_SIMBOLO, ALMACENAMOS LA DESCRIPCION DEL TIEMPO
$var5 = array(0=>"Dia."); //ARRAY DIA, ALMACENAMOS EL DIA DE LA SEMANA
$array = array();
	

	
	$file = 'http://api.meteored.com.ar/index.php?api_lang=ar&localidad=13621&affiliate_id=avhhrbzj8156';
	// Recuperamos los datos del fichero para tratarlos
	if($xml = simplexml_load_file($file)){
	$i=0;
	$nday=2; // Aqui tenemos las predicciones para 7 dias
	$url= $xml->location->interesting->url;
	$array=explode('-', $url);
	
	foreach ($xml->location->var as $var) {
		switch ($i) {
			case 0: 
				$j=0;
				for($j=0; $j<$nday; $j++){$var1 = $var1 + array($j+1=>htmlentities($xml->location->var[$i]->data->forecast[$j]->attributes()->value,ENT_COMPAT,'UTF-8'));}
			break;
			case 1:
				$j=0;
				for($j=0; $j<$nday; $j++){$var2 = $var2 + array($j+1=>htmlentities($xml->location->var[$i]->data->forecast[$j]->attributes()->value,ENT_COMPAT,'UTF-8'));}
			break;
		
			case 3: 
				$j=0;
				for($j=0; $j<$nday; $j++){$var4 = $var4 + array($j+1=>htmlentities($xml->location->var[$i]->data->forecast[$j]->attributes()->id,ENT_COMPAT,'UTF-8'));
										  $var4_des = $var4_des + array($j+1=>htmlentities($xml->location->var[$i]->data->forecast[$j]->attributes()->value,ENT_COMPAT,'UTF-8'));}
			break;
			case 4: 
				$j=0;
				for($j=0; $j<$nday; $j++){$var5 = $var5 + array($j+1=>htmlentities($xml->location->var[$i]->data->forecast[$j]->attributes()->value,ENT_COMPAT,'UTF-8'));}
			break;
		}//switch
		$i++;
	}//foreach



$lugar = $xml->location->attributes();
$city = explode('[', $lugar);

//Vamos a contruir una tabla para mostrar los resultados
$i=1;
echo '<br><br>';
echo '<table height="240px" width="635px" class="table_background">';
echo '<tr>';
echo '<th colspan="7">';
echo 'Predicciones para  '.trim($city[0]);
echo '</th>';
echo '</tr>';

echo '<tr>';
for($i=1; $i<$nday+1; $i++){
			
	echo '<td>';	
	echo'<table  height="195px" width="80px" class="fondito">'; 		
	echo'<tr>';
			echo '<th>';
			echo " ".$var5[$i];
			echo '</th>';
	echo '</tr>';
	
	if (isset($var4[$i])){
		echo '<tr>';
			echo '<td align="center">';
			echo '<img src="./imagenes/tiempo/'.$var4[$i].'.gif" alt="'.$var4_des[$i].'" title="'.$var4_des[$i].'"/><BR>';
			echo '</td>';
		echo '</tr>';
	} 
	
	echo '<tr>';
			echo '<th>';
			echo " Min ".$var1[$i];
			echo '</th>';
	echo '</tr>';

	echo '<tr>';
			echo '<th>';
			echo " Max ".$var2[$i];
			echo '</th>';
	echo '</tr>';
	
	if (isset($var3[$i])){
		echo '<tr>';
			echo '<td align="center">';
			$wind=$var3[$i]%8;
			if ($wind==0) $wind=8;			
			if ($var3[$i]==33)
				echo  '<img src="./imagenes/vientos/'.$var3[$i].'.gif" alt="'.$var3_des[$i].'" title="'.$var3_des[$i].'"/><BR>';
			else
				echo  '<img src="./imagenes/vientos/'.$wind.'.png" alt="'.$var3_des[$i].'" title="'.$var3_des[$i].'"/><BR>';	
			echo '</td>';
		echo '</tr>';
	echo '</table>';
	echo '</td>';	
	}
}

echo '</tr>';
echo '<tr>';
echo '<th colspan="7">';
echo '<a href="https://www.tiempo.com">www.tiempo.com</a>';
echo '</th></tr>';
echo '</table>';
}

?>
</body>
</html>
