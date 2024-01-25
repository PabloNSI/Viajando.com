<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;
    $correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : null;
    $contrasena = isset($_REQUEST['contrasena']) ? $_REQUEST['contrasena'] : null;
    $hostDB = '127.0.0.1';
    $nombreDB = 'danos_tu_opinion';
    $usuarioDB = 'root';
    $contrasenyaDB = 'LaKinli2005';
    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
    $miInsert = $miPDO->prepare('INSERT INTO usuario (nombre, correo, contrasena) VALUES (:nombre, :correo, :contrasena)');
    $miInsert->execute(
        array('nombre' => $nombre,'correo' => $correo, 'contrasena' => $contrasena)
    );
    header('Location:blog.php ');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>LOG IN</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body><header class="header">
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
    <form action="" method="post" class="formulario">
        <p>
            <label for="nombre">Nombre de usuario: <br> </label>
            <input id="nombre" type="text" name="nombre" required>
        </p>
        <p>
            <label for="correo"> Correo electrónico:  <br></label>
            <input id="correo" type="text" name="correo"  pattern=".+@.+" required>
        </p>
        <p>
        <label for="contrasena">Contraseña: <br></label>
        <input type="password" id="contrasena" name="contrasena" pattern="^(?=.*\d{4})(?=.*[a-zA-Z]{4})(?=.*[A-Z])(?=.*[!@#$%^&*])[\da-zA-Z!@#$%^&*]{10,}$" 
            title="Debe contener al menos 4 números, 4 letras, una letra mayúscula y un carácter especial (!@#$%^&*) y tener al menos 10 caracteres" required>
            <br><br>Debe contener al menos 4 números, 4 letras, una letra mayúscula y un carácter especial (!@#$%^&*) y tener al menos 13 caracteres.
        </p>
        <p>
            <input class="button_php" type="submit" value="Guardar">
        </p>
    </form>
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
<?php

function validarDatos($dato) {
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $nombre = validarDatos($_POST["nombre"]);
    $email = validarDatos($_POST["email"]);
    $contrasena = validarDatos($_POST["contrasena"]);
    $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES ('$nombre', '$email', '$contrasena')";
    if ($conn->query($sql) === TRUE) {
        echo "<script> alert('¡Has iniciado sesión correctamente!');</script>";
        echo "<script> window.location.href = '../carpeta_raiz/index.html';</script>";
    } else {
        echo "<script> alert('¡Ya tienes cuenta');</script>";
        echo "<script> window.location.href = '../carpeta_raiz/index.html';</script>";
    }
}
?>

