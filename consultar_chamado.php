<?php 
require_once("validador.php")
?>

<?php
$chamados = [];

$arquivo = fopen("../../protegidos/registros_chamado.txt", "r");
while(!feof($arquivo)){
   $registros = fgets($arquivo); 
   $detalhes_r = explode("#", $registros);

   if($_SESSION["id_perfil"] == 2){
       if($_SESSION["id_usuario"] !== $detalhes_r[0]){
                  continue;
        }else{
          $chamados[] = $registros; 
        }
       }else{
          $chamados[] = $registros; 
        }    
   
}


fclose($arquivo);

?>


<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
             
            <?php
            foreach($chamados as $chamado){
              $chamado_v = explode("#", $chamado);

              if(count($chamado_v) < 3){
                continue;
              }

            ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $chamado_v[2]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_v[3]?></h6>
                  <p class="card-text"><?= $chamado_v[4]?></p>

                </div>
              </div>
            <?php } ?>


              <div class="row mt-5">
                <div class="col-6">
                  <a href = "home.php" class="btn btn-lg btn-warning btn-block" type="submit">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>