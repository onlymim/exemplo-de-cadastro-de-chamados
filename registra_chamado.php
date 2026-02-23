<?php 
session_start();

$id_u = str_replace ('#', '-', $_SESSION["id_usuario"]);
$id_p = str_replace ('#', '-', $_SESSION["id_perfil"]);
$titulo = str_replace ('#', '-', $_POST["titulo"]);
$categoria = str_replace ('#', '-', $_POST["categoria"]);
$descrição = str_replace ('#', '-', $_POST["descricao"]);

$texto = $id_u . '#' . $id_p . '#' . $titulo . '#' . $categoria . '#' . $descrição . PHP_EOL;

$arquivo = fopen("../../protegidos/registros_chamado.txt", "a");
fwrite($arquivo, $texto);
fclose($arquivo); 

header("Location: abrir_chamado.php?enviado=true");


?>