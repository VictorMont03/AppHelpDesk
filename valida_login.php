<?php
    session_start();

    $usuarios = [
        ['email' => 'luffy@gmail', 'senha' => 'carne'],
        ['email' => 'zoro@gmail', 'senha' => 'espada'],
        ['email' => 'nami@gmail', 'senha' => 'dinheiro'],
        ['email' => 'robin@gmail', 'senha' => 'historia']
    ];
    /*echo '<pre>';
    print_r($usuarios);
    echo '</pre>';*/
    ///print_r($_POST);
    $usuario_autenticado = false;
    
    foreach ($usuarios as $user){
        /*echo 'Usuario: ' . $user['email'] . ' / '. $user['senha'];
        echo '<br> Digitado: ';
        print_r($_POST);
        echo '<hr>';*/
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $usuario_autenticado = true;
        }
    }
    
    if($usuario_autenticado){
        header('Location: home.php');
        $_SESSION['autenticado'] = 'YES';
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['senha'] = $_POST['senha'];
    }else{
        header('Location: index.php?login=erro');//passando pela variavel login o valor de erro
        $_SESSION['autenticado'] = 'NO';
    }



?>