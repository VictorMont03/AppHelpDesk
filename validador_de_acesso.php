<?php
  session_start();
  if($_SESSION['autenticado'] == 'NO' || !isset($_SESSION['autenticado'])){
    header('Location: index.php?login=erro2');
  }
?>