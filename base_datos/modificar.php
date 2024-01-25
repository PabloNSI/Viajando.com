<?php
$hostDB = '127.0.0.1';
$nombreDB = 'danos_tu_opinion';
$usuarioDB = 'root';
$contrasenyaDB = 'LaKinli2005';
$id_comentario = isset($_REQUEST['id_comentario']) ? $_REQUEST['id_comentario'] : null;
$fkcorreo = isset($_REQUEST['fkcorreo']) ? $_REQUEST['fkcorreo'] : null;
$fkdestino = isset($_REQUEST['fkdestino']) ? $_REQUEST['fkdestino'] : null;
$texto = isset($_REQUEST['texto']) ? $_REQUEST['texto'] : null;
$calificacion = isset($_REQUEST['calificacion']) ? $_REQUEST['calificacion'] : null;
$fecha = isset($_REQUEST['fecha']) ? $_REQUEST['fecha'] : null;


$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $miUpdate = $miPDO->prepare('UPDATE comentario SET fkcorreo = :fkcorreo, fkdestino = :fkdestino, texto = :texto, calificacion = :calificacion  WHERE id_comentario = :id_comentario');
    $miUpdate->execute(
        [ 'id_comentario' => $id_comentario, 'fkcorreo' => $fkcorreo, 'fkdestino' => $fkdestino, 'texto' => $texto, 'calificacion' => $calificacion, ]
    );
    header('Location: blog.php');
} else {
    $miConsulta = $miPDO->prepare('SELECT * FROM comentario WHERE id_comentario = ?;');
    $miConsulta->execute([$id_comentario]);
}
$query = $miConsulta->fetch();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MODIFICAR COMENTARIO</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<header class="header">
        <nav class="nav">
            <a href="../carpeta_raiz/index.html" class="logo"><img src="../images/logo.jpg"></a>
            <button class="nav-toggle"><img src="../images/icon_3barras.png"></button>
            <ul class="nav-menu">
                <li class="nav-menu-item"><a href="../pags/españa.html">ESPAÑA</a></li>
                <li class="nav-menu-item"><a href="../pags/europa.html">EUROPA</a></li>
                <li class="nav-menu-item"><a href="../pags/america.html">AMÉRICA</a></li>
                <li class="nav-menu-item"><a href="../pags/danos_opinion.html">DANOS TU OPINIÓN</a></li> 
            </ul>
            <a id="carrito_icon"href="../pags/carrito.html" class="nav-menu-item"><img src="../images/icon_carrito.png" class="imagen_header" ></a>
        </nav>
</header>
<main class="main-carrito">
    <div class="p_php">
    <form method="post" class="formulario">
        <p>
            <label for="fkcorreo">Correo electrónico: <br></label>
            <input id="fkcorreo" type="text" name="fkcorreo" value="<?= $query ['fkcorreo'] ?>">
        </p>
        <p>
            <label for="fkdestino">Ciudad visitada o por visitar: <br></label>
            <input id="fkdestino" type="text" name="fkdestino" value="<?= $query ['fkdestino'] ?>">
        </p>
        <p>
            <label for="texto">Contenido(200ch): <br></label>
                <input id="texto" type="text" line name="texto" value="<?= $query ['texto'] ?>">
        </p>
        <p>
            <label for="calificacion">Nota (-/10): <br></label>
                <input id="calificacion" type="text" name="calificacion" value="<?= $query ['calificacion'] ?>">
        </p>
        <p>
            <input type="hidden" name="id_comentario" value="<?= $id_comentario ?>">
            <input type="submit" value="Modificar" class="button">
        </p>
    </form>
    <br>
    </div>
    </main>    
    <footer>
    <div class="foot">
        <div class="footer1">
            <div>
            <h2>SOBRE NOSOTROS</h2>
            <p class="descripcion"> Viajes únicos, destinos fascinantes.
                    Descubre el mundo con nuestra agencia.
                Atención personalizada para hacer realidad tus sueños de aventura.</p>
            </div>
            <div class="contacto">
            <h2>CONTACTO</h2>
            <p>UBICACIÓN: <br> <a href="https://maps.app.goo.gl/L2sUqaUtkTKLVMvp8">
                C. Consuegra, 3, 28036 Madrid</a></p>
            <p >EMAIL: <a href="https://mail.google.com/">info@viajando.com</a></p>
            </div>
        </div>
        <div class="footer2">
            <div>
                <h2>ENLACES RÁPIDOS</h2>
                <a href="../carpeta_raiz/index.html">Inicio</a><br>
                <a href="../pags/carrito.html">Comprar</a><br>
                <a href="../pags/danos_opinion.html">Danos tu opinión</a>
            </div>
            <div class="footer_redes">
                <h2>REDES</h2>
                <div><a href="https://www.instagram.com/"><img src="../images/icon_instagram.png" alt=""></a>
                <a href="https://www.facebook.com/"><img src="../images/icon_facebook.png" alt=""></a></div>
                <div><a href="https://www.youtube.com/"><img src="../images/icon_youtube.png" alt=""></a>
                <a href="https://twitter.com/"><img src="../images/icon_x.png" alt=""></a></div>
            </div>
        </div>  
    </div>
</footer>
</body>
</html>