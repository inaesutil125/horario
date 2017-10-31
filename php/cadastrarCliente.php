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
        <title>Cadastro de Usuarios</title>
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
                            <li id='liHorizontal'><a href='pgInicial.php'><img id='home' src='../imagens/whiteHome.png' width='15'>Início</a></li>
                            <li id='liHorizontal'><a href='horariosAlunos.php'>Horarios dos Alunos</lei>
                            <li id='liHorizontal' class='active'><a href='cadastrarCliente.php'>Cadastrar Usuário</a></li>
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
                            <li id='liHorizontal' class='active' ><a href='pgInicial.php'><img id='home' src='../imagens/whiteHome.png' width='15'>Início</a></li>
                            <li id='liHorizontal'><a href='horariosAlunos.php'>Horários Alunos</lei>
                            <li id='liHorizontal'><a href='perfilProfessor.php'>Perfil</a></li>";
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
                            <li id='liHorizontal' class='active' ><a href='pgInicial.php'><img id='home' src='../imagens/whiteHome.png' width='15'>Início</a></li>
                            <li id='liHorizontal'><a href='horariosAulas.php'>Meus Horários</lei>
                            <li id='liHorizontal'><a href='trocarH.php'>Trocar Horários</a></li>
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
            <center>
                <div id="divFormulario">
                    <h1>Cadastro de Usuário</h1>
                    <form action="cadCliente.php" method="POST" name="cadastrarCliente">
                        
                        <label for="tipoUsuario">Tipo de Usuário</label>
                        <select name="tipoUsuario">
                            <?php
                                include_once 'conexaoBD.php';
                                $buscarTipoUsuario = "SELECT * FROM tipoUsuario";
                                $confirmarBuscarUsuario = mysqli_query($link, $buscarTipoUsuario);
                                
                                if ($confirmarBuscarUsuario) {
                                    while ($registro = mysqli_fetch_assoc($confirmarBuscarUsuario)){
                                        $codTipo = $registro["cod_tipo"];
                                        $tipoUsuario = $registro["nome"];
                                        echo "<option value='$codTipo'>$tipoUsuario</option>";
                                    }
                                }
                                else {
                                    die ("Erro ao buscar Tipo de Usuário" . mysqli_error($link));
                                }
                            ?>
                        </select>
                        
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome">

                       <label for="sobrenome">Sobrenome</label>
                       <input type="text" id="sobrenome" name="sobrenome">

                       <label for="dtNasc">Data de Nascimento</label>
                       <input type="date" id="dtNasc" name="dtNasc">
                        
                       <label for="cpf">CPF</label>
                       <input type="text" id="cpf" name="cpf">
                    
                       <label for="endereco">Endereço</label>
                       <input type="text" id="endereco" name="endereco">  
                           
                        <label for="sexo">Sexo</label><br><br>
                        <input type="radio" id="sexo" value="M" name="sexo">Masculino
                        
                        <input type="radio" id="sexo" value="F" name="sexo">Feminino<br><br>

                        <label for="email">E-MAIL</label>
                        <input type="text" id="email" name="email">
                            
                        <label for="senhal">Senha</label>
                        <input type="password" id="senha1" name="senha1">    
                    
                        <label for="senha2">Confirmação de Senha</label>
                        <input type="password" id="senha2" name="senha2">
                 
                  
                        <input type="submit" value="Cadastrar">

                    </form>
                </div>
            </center>
        </div>        
    </body>
</html>
