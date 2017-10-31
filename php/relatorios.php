<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once 'validar.php';
?>
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Relatórios</title>
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
            <h1><img src="../imagens/logoBP.jpg" id="imgpos"><a href="index.php"></a></h1>   
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
                            <li id='liHorizontal'><a href='cadastrarCliente.php'>Cadastrar Usuário</a></li>
                            <li id='liHorizontal'class='active' ><a href='relatorios.php'>Relatórios</a></li>
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
                 <table id="customers">
              <?php  
              
             echo "<CENTER>";
            
            include_once("conexaoBD.php");
            $listar = "SELECT * FROM usuarios"; 
            
            $res = mysqli_query($link, $listar) or die ("Erro ao pesquisar dados do cliente. ". mysqli_error() );
                  
            $total = mysqli_num_rows($res);
            
            echo "<H3><br>O total de clientes é: $total </H3></br>";
            
            //echo "<TABLE border=1>";
            
            echo "<TR>
                <td bgcolor=#BEBEBE <TH>Tipo de Usuario</td></TH>
                <td bgcolor=#BEBEBE>NOME</td>
                <td bgcolor=#BEBEBE>SOBRENOME</td>
                <td bgcolor=#BEBEBE>DATA DE NASCIMENTO</td>
                <td bgcolor=#BEBEBE>ENDERECO</td>
                <td bgcolor=#BEBEBE>CPF</td>
                <td bgcolor=#BEBEBE>SEXO</td>
                <td bgcolor=#BEBEBE>EMAIL</td>
                </TR>";
            
            while ( $registro = mysqli_fetch_assoc($res) ) {

               
                $tipoUsuario = $registro["tipoUsuario"];
                $nome        = $registro["nome"];
                $sobrenome   = $registro["sobrenome"];
                $dtNasc      = $registro["dtNasc"];
                $endereco    = $registro["endereco"];
                $cpf         = $registro["cpf"];
                $sexo        = $registro["sexo"];
                $email       = $registro["email"];

                echo "<tr>
                    
                      <td>$tipoUsuario</td>
                      <td>$nome</td>
                      <td>$sobrenome</td>
                      <td>$dtNasc</td>
                      <td>$endereco</td>
                      <td>$cpf</td>
                      <td>$sexo</td>
                      <td>$email</td>
                </tr>";
            }
            echo "</table>"; 
            
            echo "<center><br><a href='cadastrarCliente.php' title='Vai para a tela de Cadastro de Clientes'>Cadastrar Novo Cliente</a>";
            echo "</CENTER>";
       
          ?>
                </div>
       </table>
</html>

