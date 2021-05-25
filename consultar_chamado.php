<?
  require('validador_de_acesso.php');
?>

<?php
  $arq = fopen('arquivo.hd', 'r');
  $infos = [];
  $i = 0;
  while(!feof($arq)){
    //linhas
    $infos[$i] = fgets($arq);//pegar o que tem na linha
    $i++;
  }
  /*echo '<pre>';
  print_r($infos);
  echo '</pre>';*/

  fclose($arq);
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
        <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="logoff.php" class="nav-link">Sair</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <? foreach($infos as $info){
                  $info_explodido = explode("#", $info);
                  if(count($info_explodido) < 3){ //falta de informações -> ignora este indice
                    continue;
                  }
                  if($_SESSION['id'] == $info_explodido[0] || $_SESSION['adm_profile'] == 1){

              ?>
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title">
                      <? 
                        echo $info_explodido[1];
                      ?>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        <?          
                          echo $info_explodido[2];
                        ?>
                    </h6>
                    <p class="card-text">
                      <? 
                        echo $info_explodido[3];   
                      ?>
                    </p>

                  </div>
                </div>
              <? } } ?>
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>