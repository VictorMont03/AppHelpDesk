<?php
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    echo '<br/>';

    $_POST['titulo'] = str_replace('#', '-', $_POST['titulo']);
    $_POST['categoria'] = str_replace('#', '-', $_POST['categoria']);
    $_POST['descricao'] = str_replace('#', '-', $_POST['descricao']);

    $text = implode('#', $_POST) . PHP_EOL;

    $arq = fopen('arquivo.hd', 'a');
    
    fwrite($arq, $text);

    fclose($arq);
    
    header('Location: abrir_chamado.php?chamado=sucess');
    //echo $text;
?>