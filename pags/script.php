
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "LaKinli2005";
$dbname = "formulario_contacto";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
function validarDatos($dato) {
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
    
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = validarDatos($_POST["nombre"]);
    $email = validarDatos($_POST["email"]);
    $mensaje = validarDatos($_POST["mensaje"]);
    $sql = "INSERT INTO usuarios (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";
    if ($conn->query($sql) === TRUE) {
        echo "<script> alert('¡Has iniciado sesión correctamente!');</script>";
        echo "<script> window.location.href = '../carpeta_raiz/index.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
