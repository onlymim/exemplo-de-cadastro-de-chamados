<?php
session_start();
$_SESSION['validado'] = false;
$id_usuario = null;
$id_perfil = null;

$alunos = array(
    array("id" => "1", "id_perfil" => "1", "email" => "usuario1@gmail.com", "senha" => "12345678"),
    array("id" => "2","id_perfil" => "1", "email" => "usuario2@gmail.com", "senha" => "12345678"),
    array("id" => "3", "id_perfil" => "2", "email" => "usuario3@gmail.com", "senha" => "12345678"),
    array("id" => "4", "id_perfil" => "2", "email" => "usuario4@gmail.com", "senha" => "12345678")
);
$aluno_enc = false;
foreach($alunos as $aluno){
    if( $aluno["email"] == $_POST["email"] && $aluno["senha"] == $_POST["senha"] ){
    $aluno_enc = true;
    $id_usuario = $aluno["id"];
    $id_perfil = $aluno["id_perfil"];
    break;
    }
}

 if($aluno_enc){
    $_SESSION["validado"] = true;
    $_SESSION["id_usuario"] = $id_usuario;
    $_SESSION["id_perfil"] = $id_perfil;
        header("Location: home.php");
    }else{
        header("Location: index.php?login=erro");
    }


?>