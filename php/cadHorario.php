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
        <title>Cadastro de Clientes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/estiloBarraNavegacaoFixa.css" rel="stylesheet" type="text/css">
        <link href="../css/estiloTabelaHorarios.css.css" rel="stylesheet" type="text/css">
        <link href="../css/estiloFormulario.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
            $tipoUsuario = $_SESSION["tipoUsuario"];
            echo "<p>Tipo de Usuário: " . $tipoUsuario . "</p>";
        
            if ($tipoUsuario == "3"){
                echo"
                    <header>
                        <ul id ='ulHorizontal'>
                            <li id='liHorizontal' class='active' ><a href='index.php'><img id='home' src='../imagens/whiteHome.png' width='15'>Início</a></li>
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
                            <li id='liHorizontal' class='active' ><a href='index.php'><img id='home' src='../imagens/whiteHome.png' width='15'>Início</a></li>
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
                            <li id='liHorizontal' class='active' ><a href='index.php'><img id='home' src='../imagens/whiteHome.png' width='15'>Início</a></li>
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
        <div id="master">

       
        <?php
            echo "<CENTER>";
            include_once 'conexaoBD.php';
            
            $hora1 = $_POST["hora1"];
            $hora2 = $_POST["hora2"];
            $hora3 = $_POST["hora3"];
            $hora4 = $_POST["hora4"];
            $hora5 = $_POST["hora5"];
            $hora6 = $_POST["hora6"];
            $hora7 = $_POST["hora7"];
            $hora8 = $_POST["hora8"];
            $hora9 = $_POST["hora9"];
            $hora10 = $_POST["hora10"];
            $hora11 = $_POST["hora11"];
            $hora12 = $_POST["hora12"];
            $hora13 = $_POST["hora13"];
            $hora14 = $_POST["hora14"];
            $hora15 = $_POST["hora15"];
            $hora16 = $_POST["hora16"];
            $hora17 = $_POST["hora17"];
            $hora18 = $_POST["hora18"];
            $hora19 = $_POST["hora19"];
            $hora20 = $_POST["hora20"];
            $camposOK = true;
      
            
            if ($hora1 == "") {
                echo "Informe  a horaaaaaa. <BR>";
                $camposOK = false;   
            } 
            
             if ($hora2 == "") {
                echo "Informe  a horaaaaa. <BR>";
                $camposOK = false;   
            } 
            
             if ($hora3 == "") {
                echo "Informe  a hora. <BR>";
                $camposOK = false;   
            } 
            
             if ($hora4 == "") {
                echo "Informe  a hora. <BR>";
                $camposOK = false;   
            } 
            
             if ($hora5 == "") {
                echo "Informe  a hora. <BR>";
                $camposOK = false;   
            } 
            
             if ($hora6 == "") {
                echo "Informe  a hora. <BR>";
                $camposOK = false;   
            } 
             if ($hora7 == "") {
                echo "Informe  a hora. <BR>";
                $camposOK = false;   
            } 
             if ($hora8 == "") {
                echo "Informe  a hora. <BR>";
                $camposOK = false;   
            } 
             if ($hora9 == "") {
                echo "Informe  a hora. <BR>";
                $camposOK = false;   
            } 
             if ($hora10 == "") {
                echo "Informe  a hora. <BR>";
                $camposOK = false;   
            } 
             if ($hora11 == "") {
                echo "Informe  a hora. <BR>";
                $camposOK = false;   
            } 
             if ($hora12 == "") {
                echo "Informe  a hora. <BR>";
                $camposOK = false;   
            } 
             if ($hora13 == "") {
                echo "Informe  a hora. <BR>";
                $camposOK = false;   
            } 
             if ($hora14 == "") {
                echo "Informe  a hora. <BR>";
                $camposOK = false;   
            } 
             if ($hora15 == "") {
                echo "Informe  a hora. <BR>";
                $camposOK = false;   
            } 
             if ($hora16 == "") {
                echo "Informe  a hora. <BR>";
                $camposOK = false;   
            } 
             if ($hora17 == "") {
                echo "Informe  a hora. <BR>";
                $camposOK = false;   
            } 
             if ($hora18 == "") {
                echo "Informe  a hora. <BR>";
                $camposOK = false;   
            } 
             if ($hora19 == "") {
                echo "Informe  a hora. <BR>";
                $camposOK = false;   
            } 
             if ($hora20 == "") {
                echo "Informe  a hora. <BR>";
                $camposOK = false;   
            } 
            
         
            if ($camposOK){
        
                echo "<TABLE border='2' cellpadding='5'>";
                echo"<TH>Horários</TH>";
                echo"<TH>SEGUNDA-FEIRA</TH>";
                echo"<TH>TERÇA-FEIRA</TH>";
                echo"<TH>QUARTA-FEIRA</TH>";
                echo"<TH>QUINTA-FEIRA</TH>";
                      
                echo "<TR><TD>06:30:00</TD><TD><B><a href='formAltUsu.php' title='Alterar Horario '>$hora1</B></TD>"
                        . "<TD><B><a href='formAltUsu.php' title='Alterar Horario'>$hora6</B></TD>"
                        . "<TD><B><a href='formAltUsu.php' title='Alterar Horario'>$hora11</B></TD>"
                        . "<TD><B><a href='formAltUsu.php' title='Alterar Horario'>$hora16</B></TD></TR>";
              
                echo "<TR><TD>07:00:00</TD><TD><B><a href='formAltUsu.php' title='Alterar Horario'>$hora2</B></TD>"
                        . "<TD><B><a href='formAltUsu.php' title='Alterar Horario'>$hora7</B></TD>"
                        . "<TD><B><a href='formAltUsu.php' title='Alterar Horario'>$hora12</B></TD>"
                        . "<TD><B><a href='formAltUsu.php' title='Alterar Horario'>$hora17</B></TD></TR>";
                
                echo "<TR><TD>07:30:00</TD><TD><B><a href='formAltUsu.php' title='Alterar Horario'>$hora3</B></TD>"
                        . "<TD><B><a href='formAltUsu.php' title='Alterar Horario'>$hora8</B></TD>"
                        . "<TD><B><a href='formAltUsu.php' title='Alterar Horario'>$hora13</B></TD>"
                        . "<TD><B><a href='formAltUsu.php' title='Alterar Horario'>$hora18</B></TD></TR>";
                
                echo "<TR><TD>08:00:00</TD><TD><B><a href='formAltUsu.php' title='Alterar Horario'>$hora4</B></TD>"
                        . "<TD><B><a href='formAltUsu.php' title='Alterar Horario'>$hora9</B></TD>"
                        . "<TD><B><a href='formAltUsu.php' title='Alterar Horario'>$hora14</B></TD>"
                        . "<TD><B><a href='formAltUsu.php' title='Alterar Horario'>$hora19</B></TD></TR>";
                
                echo "<TR><TD>08:30:00</TD><TD><B><a href='formAltUsu.php' title='Alterar Horario'>$hora5</B></TD>"
                        . "<TD><B><a href='formAltUsu.php' title='Alterar Horario'>$hora10</B></TD>"
                        . "<TD><B><a href='formAltUsu.php' title='Alterar Horario'>$hora15</B></TD>"
                        . "<TD><B><a href='formAltUsu.php' title='Alterar Horario'>$hora20</B></TD></TR>";
                

               
               $inserir = "INSERT INTO horarioo ( hora1, hora2, hora3, hora4, hora5, hora6, hora7, hora8, hora9, hora10, hora11, hora12, hora13, hora14, hora15, hora16, hora17, hora18, hora19, hora20)
                                       VALUES ('$hora1', '$hora2', '$hora3', '$hora4', '$hora5', '$hora6', '$hora7', '$hora8', '$hora9', '$hora10', '$hora11', '$hora12', '$hora13', '$hora14', '$hora15', '$hora16', '$hora17', '$hora18', '$hora19', '$hora20')";

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
