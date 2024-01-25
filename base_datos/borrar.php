<?php
$hostDB = '127.0.0.1';
$nombreDB = 'danos_tu_opinion';
$usuarioDB = 'root';
$contrasenyaDB = 'LaKinli2005';
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
$id_comentario = isset($_REQUEST['id_comentario']) ? $_REQUEST['id_comentario'] : null;
$miConsulta = $miPDO->prepare('DELETE FROM comentario WHERE id_comentario = ?');
$miConsulta->execute([ $id_comentario]);
header('Location: blog.php');
?>
