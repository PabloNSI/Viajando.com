<?php
$hostDB = '127.0.0.1';
$nombreDB = 'danos_tu_opinion';
$usuarioDB = 'root';
$contrasenyaDB = 'LaKinli2005';
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
$miConsulta = $miPDO->prepare('SELECT * FROM comentario;');
$miConsulta->execute();
$id_comentario = isset($_REQUEST['id_comentario']) ? $_REQUEST['id_comentario'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BLOG</title>
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
    <br>
    <table>
        <tr>
            <td>CORREO</td>
            <td>CIUDAD</td>
            <td>COMENTARIO</td>
            <td>CALIFICACIÓN</td>
            <td>FECHA Y HORA</td>
            <td>MODIFICAR</td>
            <td>BORRAR</td>
        </tr>
        <?php foreach ($miConsulta as $clave => $valor): ?> 
            <tr>
               <td><?= $valor['fkcorreo']; ?></td>
               <td><?= $valor['fkdestino']; ?></td>
               <td><?= $valor['texto']; ?></td>
               <td><?= $valor['calificacion']; ?></td>
               <td><?= $valor['fecha']; ?></td>
               <td><?php if ($valor['id_comentario'] > 5): ?>
                        <a class="button_php" href="modificar.php?id_comentario=<?= $valor['id_comentario'] ?>">Modificar</a>
                    <?php endif; ?></td>
               <td><?php if ($valor['id_comentario'] > 5): ?>
                        <a class="button_php" href="borrar.php?id_comentario=<?= $valor['id_comentario'] ?>">Borrar</a>
                    <?php endif; ?></td>
            </tr> 
        <?php endforeach;?>
    </table><br>
    <p class="p_php"><a class="button_php" href="nuevo.php">Crear</a></p>
    <br>
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

