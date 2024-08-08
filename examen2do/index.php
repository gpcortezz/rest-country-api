<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 1);
?>

<html>
    <head>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <title>Examen 2do parcial</title>
    </head>

    <body>
        <nav>
            <div class="conjunto">
                <div class="encabezado">
                    <h1>REST COUNTRIES API</h1> 
                    <img class="mundo" src="IMG/mundo.gif" alt="" class="mundo">
                </div>

                <div class="formulario">
                    <form action="" method="post">
                        <button class ="botones" name="opcion" value="1">Busqueda por pais</button>
                        <button class ="botones" name="opcion" value="2">Busqueda por continente</button>
                        <button class ="botones" name="opcion" value="3">Mostrar todos los paises</button>
                    </form>
                </div>
                <a href="https://restcountries.com/" target="_blank"><img src="IMG/api.png" alt="API Rest Countries" height="100px" width="300px"></a>
                <section class="redes">
                    <a href="https://www.youtube.com/channel/UCN65JfBDrHcCrnGOJGQDJaQ" target="_blank"><img src="IMG/yutub.png" class="red"></a>
                    <a href="https://www.facebook.com/profile.php?id=100008385884318" target="_blank"><img src="IMG/feis.png" class="red" ></a>
                    <a href="https://www.instagram.com/_elkemonito/" target="_blank"><img src="IMG/insta.png" class="red-insta" ></a>
                </section>
            </div>
            <!-- <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3D1248233029307550%26id%3D100008385884318%26substory_index%3D1248233029307550&show_text=true&width=500" width="200" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe> -->
        </nav>
       
        <?php
        $opc=$_POST['opcion'];
        if($opc==1){
            header('location:pais.php');
        }
        elseif($opc=="2"){
            header('location:continente.php');
        }
        elseif($opc=="3"){
            header('location:todos.php');
        }
        ?>
    </body>
</html>