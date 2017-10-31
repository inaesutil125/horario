<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once 'validar.php';
?>
<html>
    <head>
        
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Perfil Professor</title>
         <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="../css/default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../css/logo.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../css/fonts.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../css/estiloFormulario.css" rel="stylesheet" type="text/css" media="all" />
        
    </head>
    <body>
        <div id="header-wrapper">
        <div id="header" class="container">
        <div id="logo">
        <h1><img src="../imagens/logoBP.jpg" id="imgpos"></img><a href="index.php"></a></h1>   
</div>
      <div id="menu">
        <?php
            $tipoUsuario = $_SESSION["tipoUsuario"];
            if ($tipoUsuario == "3"){
                echo"
                    <header>
                        <ul id ='ulHorizontal'>
                            <li id='liHorizontal' class='active' ><a href='pgInicial.php'><img id='home' src='../imagens/whiteHome.png' width='15'>Início</a></li>
                            <li id='liHorizontal'><a href='horariosAlunos.php'>Horarios dos Alunos</lei>
                            <li id='liHorizontal'><a href='cadastrarCliente.php'>Cadastrar Usuário</a></li>
                            <li id='liHorizontal'><a href='relatorios.php'>Relatórios</a></li>
                            <li id='liHorizontal'><a href='agendamentos.php'>Agendamentos</a></li>";
                            if (isset ($_SESSION["email"] ) ){
                                echo "<li id='liHorizontal' style='float:right; border-left: 1px solid #bbb;'><a href='logout.php'>Sair</a></li>";
                            }
                            else {
                                echo "<li id='liHorizontal' style='float:right; border-left: 1px solid #bbb;'><a href='formLogin.php'>Login</a></li>";
                            }
                echo    "</ul>
                    </header>";
            }
            
            elseif ($tipoUsuario == "2"){
                echo"
                    <header>
                        <ul id ='ulHorizontal'>
                            <li id='liHorizontal'><a href='pgInicial.php'><img id='home' src='../imagens/whiteHome.png' width='15'>Início</a></li>
                            <li id='liHorizontal'><a href='horariosAlunos.php'>Horários Alunos</lei>
                            <li id='liHorizontal'  class='active' ><a href='perfilProfessor.php'>Perfil</a></li>";
                            if (isset ($_SESSION["email"] ) ){
                                echo "<li id='liHorizontal' style='float:right; border-left: 1px solid #bbb;'><a href='logout.php'>Sair</a></li>";
                            }
                            else {
                                echo "<li id='liHorizontal' style='float:right; border-left: 1px solid #bbb;'><a href='formLogin.php'>Login</a></li>";
                            }
                echo    "</ul>
                    </header>";
            }
            
            elseif ($tipoUsuario == "1"){
                echo"
                    <header>
                        <ul id ='ulHorizontal'>
                            <li id='liHorizontal'><a href='pgInicial.php'><img id='home' src='../imagens/whiteHome.png' width='15'>Início</a></li>
                            <li id='liHorizontal'><a href='horariosAulas.php'>Meus Horários</lei>
                            <li id='liHorizontal'class='active' ><a href='trocarH.php'>Trocar Horários</a></li>
                            <li id='liHorizontal'><a href='perfilAluno.php'>Perfil</a></li>";
                            if (isset ($_SESSION["email"] ) ){
                                echo "<li id='liHorizontal' style='float:right; border-left: 1px solid #bbb;'><a href='logout.php'>Sair</a></li>";
                            }
                            else {
                                echo "<li id='liHorizontal' style='float:right; border-left: 1px solid #bbb;'><a href='formLogin.php'>Login</a></li>";
                            }
                echo    "</ul>
                    </header>";
            }
        ?>
          
                      </div>
  </div>
</div>
        <br><br>   
           
          
        <div id="master">
            
        </div> 
    </body>
</html>
