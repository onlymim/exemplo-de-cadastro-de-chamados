<?php 
session_start();
if(!$_SESSION["validado"]){
    header("Location: index.php?login=erro2");
}
?>