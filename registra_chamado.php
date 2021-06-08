<?php
    session_start();

    $_POST['titulo'] = str_replace('#', '-', $_POST['titulo']);//caso haja algum uso de # sera subtituido por - 
    $_POST['categoria'] = str_replace('#', '-', $_POST['categoria']);//motivo: evitar bugs
    $_POST['descricao'] = str_replace('#', '-', $_POST['descricao']);

    $text = $_SESSION['id'] . '#' . implode('#', $_POST) . PHP_EOL;

    $arq = fopen('arquivo.hd', 'a');
    
    fwrite($arq, $text);

    fclose($arq);
    
    header('Location: abrir_chamado.php?chamado=sucess');
    //echo $text;
?>