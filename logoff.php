<?php
    //remover indices do SESSION || destruir variavel de sessao
    //unset || session_destroy -> forçar redirecionamento
    session_start();
    session_destroy();
    header('Location: index.php');
?>