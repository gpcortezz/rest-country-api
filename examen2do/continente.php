<head>
    <link rel="stylesheet" href="CSS/style.css"> 
    <title>Examen 2do parcial</title>
</head>

<?php
include_once("index.php");
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 1);
?>

<label>Lista de continentes:</label>
<form class="eleccion" action="continente.php" method="post">
    <label>Continentes: </label>
    <select name="continente" required>
        <option selected value disabled>Seleccionar continente</option>
        <option value="africa">Africa</option>
        <option value="americas">América</option>
        <option value="asia">Asia</option>
        <option value="europe">Europa</option>
        <option value="oceania">Oceania</option>
    </select>
    <input type="submit" name="submit" value="◙">
</form>

<?php
$continente=$_POST['continente'];

$arch="https://restcountries.com/v3.1/region/".$continente;
$datos=json_decode(file_get_contents($arch));

$numElements = count((array)$datos);
echo $numElements;

echo "<div class='content'>";
foreach($datos as $element){
    echo "<div class='items'>";
    echo '<p class="texto">';

        $nombre=$element->name->common;

        echo '<b>'."Inglés: ".'</b>'.$nombre."<br>";
        echo '<b>'."Español: ".'</b>'.$element->translations->spa->official."<br>";
        echo '<b>'."Hora actual: ".'</b>'.'<script src="index.js"></script>'."<br>";
        if(is_null($element->capital[0])){
            echo "No cuenta con capital";
            echo "<br>";
        }
        else{
        /*En etiqueta para mandarlo a JS*/echo '<b>'.'<label class="capital">Capital: '.'</b>'.$element->capital[0].'</label>'."<br>"; //[0] es para arreglo
        }
        echo '<b>'."Latitud: ".'<label class="latitud"> '.'</b>'.$element->latlng[0].'</label>'; 
        echo '<b>'." Longitud: ".'<label class="longitud"> '.'</b>'.$element->latlng[1].'</label>'."<br>";

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
        echo '</div>';
        echo "<br>";
        echo '</p>';

        //meter cuadro con ubicacion de google maps echo '<iframe src="'.$mapa.'" width="600" height="450"></iframe>';

        $flag = $element->flags->png;
        echo '<div class="cajaimg">';
        echo '<img src="'.$flag.'" class="paises">';
        echo '</div>';
        echo "</div>";
    }
echo "</div>";
echo "<br>";
?>