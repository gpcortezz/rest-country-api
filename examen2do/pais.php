<head>
    <link rel="stylesheet" href="CSS/style.css">
    <title>Examen 2do parcial</title>
</head>

<?php
include_once("index.php");
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 1);
$arch='https://restcountries.com/v3.1/all';
$datos=json_decode(file_get_contents($arch));
sort($datos);

//Funcion para sacar los nombres y meterlos en un option
function pais($json){
    foreach($json as $element){
            $nombre=$element->name->common;
            echo '<option value="'.$nombre.'">'.$nombre.'</option>';
    }
}
?>

<!-- Caja deplegable con los nombres de los paises para mandarlos en un post -->
<label>Lista de paises:</label>
<form class="eleccion"action="pais.php" method="post">
    <label>Paises: </label>
    <select name="paises" required>
        <option selected value disabled>Seleccionar pais</option>
        <?php
        pais($datos);
        ?>
    </select>
    <input type="submit" name="submit" value="◙">
</form>

<?php
//Aqui concatenamos el %20 a la variable pais
$paises=$_POST['paises'];
$espacio="%20";

if (strpos($paises, ' ') !== false) {
    $nuevoPais=str_replace(' ',"$espacio",$paises);
    $arch2="https://restcountries.com/v3.1/name/".$nuevoPais;
}
else {
    $arch2="https://restcountries.com/v3.1/name/".$paises;
}

$datos2=json_decode(file_get_contents($arch2));
$numElements = count((array)$datos2);

echo '<div class="invisible">';
echo $numElements;
echo '</div>';

echo '<div class="content">';
foreach($datos2 as $element){
    echo '<div class="items">';
    echo '<p class="texto">';

    $nombre=$element->name->common;

    echo '<b>'."Inglés: ".'</b>'.$element->name->common."<br>";
    echo '<b>'."Español: ".'</b>'.$element->translations->spa->official."<br>";
    echo '<b>'."Hora actual: ".'</b>'.'<script src="index.js"></script>'."<br>";
    if(is_null($element->capital[0])){
        echo "No cuenta con capital";
        echo "<br>";
    }
    else{
    /*En etiqueta para mandarlo a JS*/echo "<b>".'<label class="capital">Capital: '.'</b>'.$element->capital[0].'</label>'."<br>"; //[0] es para arreglo
    }
    echo '<b>'."Latitud: ".'<label class="latitud">'.'</b>'.$element->latlng[0].'</label>'; 
    echo '<b>'." Longitud: ".'<label class="longitud">'.'</b>'.$element->latlng[1].'</label>'."<br>";

    echo '<b>'."Población: ".'</b>'.$element->population." habitantes"."<br>";
    
    //Siglas de la fifa
    if(isset($element->fifa)){
        echo '<b>'."Siglas en la FIFA: ".'</b>'.$element->fifa;
        echo "<br>";
        echo "<br>";
    }
    else{
        echo "No esta afiliado a la FIFA";
        echo "<br>";
        echo "<br>";
    }

    $mapa=$element->maps->googleMaps;
    echo '<div class="ubicacion">';
    echo '<a href="'.$mapa.'" target="_blank">GoogleMaps</a>';
    echo "<span>";
    echo '<button class="'.$nombre.'">Mostrar mapa</button>';
    echo '<label for="'.$nombre.'"></label>';
    echo "</span>";
    echo "<div>";
    echo "<br>";
    echo "</p>";

    $flag = $element->flags->png;
    echo "<div class='cajaimg'>";
    echo '<img src= "'.$flag.'" class="paises">';
    echo "</div>";
    echo "</div>";
}
echo "</div>";
echo "<br>";
?>

<script src="index.js"></script>