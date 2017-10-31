<?php   
    session_start();
    if ( ! isset ($_SESSION["email"] ) ){
        // Se a variável de sessão "login" NÂO existe
        // é porque a sessão NÂO for criada, ou seja,
        // o usuário NÂO foi validado
        // Redireciona para o formulário de login
        header("Location:formlogin.php?erro=Usuário não logado.");
    }
?>