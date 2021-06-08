<?php
    session_start();

    $adm_profile = [1 => 'administrativo', 0 => 'ususario'];
    //hardcode para testes
    $usuarios = [
        ['id' => '1', 'email' => 'victor@adm.com', 'senha' => '1234', 'adm_profile' => 1],
        ['id' => '2', 'email' => 'luffy@gmail.com', 'senha' => 'carne', 'adm_profile' => 0],
        ['id' => '3', 'email' => 'zoro@gmail.com', 'senha' => 'espada', 'adm_profile' => 0],
        ['id' => '4', 'email' => 'nami@gmail.com', 'senha' => 'dinheiro', 'adm_profile' => 0],
        ['id' => '5', 'email' => 'robin@gmail.com', 'senha' => 'historia', 'adm_profile' => 0]
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
            $_SESSION['id'] = $user['id'];
            $_SESSION['adm_profile'] = $user['adm_profile'];
        }
    }
    
    if($usuario_autenticado){
        header('Location: home.php');
        $_SESSION['autenticado'] = 'YES';
    }else{
        header('Location: index.php?login=erro');//passando pela variavel login o valor de erro
        $_SESSION['autenticado'] = 'NO';
    }



?>