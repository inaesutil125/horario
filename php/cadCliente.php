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
        <title>Cadastro de Clientes</title>
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
            
        <?php
            echo "<CENTER>";
            include_once 'conexaoBD.php';
            
            $tipoUsuario = $_POST["tipoUsuario"];
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $dtNasc = $_POST["dtNasc"];
            $endereco = $_POST["endereco"];
            $cpf = $_POST["cpf"];
            $sexo = $_POST["sexo"];
            $email = $_POST["email"];
            $senha1 = $_POST["senha1"];
            $senha2 = $_POST["senha2"];
            $camposOK = true;
      
            
            if ($nome == "") {
                echo "Informe  o Nome. <BR>";
                $camposOK = false;   
            } 
            
            if ($sobrenome == "") {
                echo "Informe  o Sobrenome. <BR>";
                $camposOK = false;   
            }
            
        
            if  (strlen($dtNasc) == 10){
                $dia = substr($dtNasc, 0,2);
                $mes = substr($dtNasc, 3,2);
                $ano = substr($dtNasc, 6,4);
                $dtNasc = "$ano-$mes-$dia";

                if ( ! checkdate($mes, $dia, $ano)){
                    echo "data inválida. <br>";
                    $camposOK = false;
                }   
            }
            
            if ($cpf == "") {
                echo "Informe  o CPF. <BR>";
                $camposOK = false;
            }  
            
             if ($endereco == "") {
                echo "Informe  o Endereço. <BR>";
                $camposOK = false;
            } 
                        
             if ($sexo == "") {
                echo "Informe  o Sexo. <BR>";
                $camposOK = false;             
            }
            
            if ($email == "") {
                echo "Informe  o E-mail. <BR>";
                $camposOK = false;             
            }
            if ($senha1 != $senha2 ) {
                echo "As SENHAS não conferem!. <BR>";
                $camposOK = false;
            }
            
            if ($senha1 == "" || $senha2 =="" ) {
                echo "O campo SENHA é Obrigatório!. <BR>";
                $camposOK = false;
            }
         
            if ($camposOK){
        
                echo "<TABLE border='2' cellpadding='5'>";
                echo "<TR><TD>TIPO DE USUARIO:</TD><TD><B>$tipoUsuario</B></TD></TR>";
                echo "<TR><TD>NOME:</TD><TD><B>$nome</B></TD></TR>";
                echo "<TR><TD>SOBRENOME:</TD><TD><B>$sobrenome</B></TD></TR>";
                echo "<TR><TD>DATA DE NASCIMENTO:</TD><TD><B>$dtNasc </B></TD></TR>";
                echo "<TR><TD>CPF:</TD><TD><B>$cpf </B></TD></TR>"; 
                echo "<TR><TD>ENDEREÇO:</TD><TD><B>$endereco </B></TD></TR>";
                echo "<TR><TD>SEXO:</TD><TD><B>$sexo </B></TD></TR>";  
                echo "<TR><TD>Email:</TD><TD><B>$email </B></TD></TR>";
                echo "<TR><TD>SENHA:</TD><TD><B>$senha1 </B></TD></TR>";
                
               $inserir = "INSERT INTO usuarios ( tipoUsuario, nome, sobrenome, dtNasc, cpf, endereco,  sexo, email, senha)
                                       VALUES ('$tipoUsuario', '$nome', '$sobrenome', '$dtNasc', '$cpf', '$endereco', '$sexo', '$email', '$senha1')";

                $confirmaInsercao = mysqli_query($link, $inserir);
                
                if ($confirmaInsercao){
                    echo "<br>Os dados do Cliente foram inseridos com Sucesso no Banco de Dados!";
                }
                else{
                    die ("<br>Erro ao inserir dados de clientes. $inserir");
                }
            } //Fim IF camposOK
            echo "<br><a href='relatorios.php' title='Exibe uma lista de todos os clientes cadastrados'>Listar Clientes Cadastrados</a><BR>";
            echo "<A href='pesqCliente.php' title='Pesquisa por Nome '>Pesquisar Clientes</a><br>";
            echo "</CENTER>";
        ?>
        </div>
</html>
