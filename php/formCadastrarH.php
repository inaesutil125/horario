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
        <title>Cadastro de Alunos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/estiloBarraNavegacaoFixa.css" rel="stylesheet" type="text/css">
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
                            <li id='liHorizontal'><a href='index.php'><img id='home' src='../imagens/whiteHome.png' width='15'>Início</a></li>
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
            <center>
                <div id="divFormulario">
                    <h1>Cadastro de Horário</h1>
                    <form action="cadHorario.php" method="POST" name="cadastrarHorário">
                         
                        <label for="hora1">06:30:00</label>
                        <input type="text" id="hora1" name="hora1">

                        <label for="hora2">07:00:00</label>
                        <input type="text" id="hora2" name="hora2">

                         <label for="hora3">07:30:00</label><br>
                        <input type="text" id="hora3" name="hora3">
                        
                        <label for="hora4">08:00:00</label>
                        <input type="text" id="hora4" name="hora4">

                        <label for="hora5">08:30:00</label><br>
                        <input type="text" id="hora5" name="hora5">
                        
                        <label for="hora6">06:30:00</label>
                        <input type="text" id="hora6" name="hora6">

                        <label for="hora7">07:00:00</label>
                        <input type="text" id="hora7" name="hora7">

                         <label for="hora8">07:30:00</label><br>
                        <input type="text" id="hora8" name="hora8">
                        
                        <label for="hora9">08:00:00</label>
                        <input type="text" id="hora9" name="hora9">

                        <label for="hora10">08:30:00</label><br>
                        <input type="text" id="hora10" name="hora10">
                        
                        <label for="hora11">06:30:00</label>
                        <input type="text" id="hora11" name="hora11">

                        <label for="hora12">07:00:00</label>
                        <input type="text" id="hora12" name="hora12">

                         <label for="hora13">07:30:00</label><br>
                        <input type="text" id="hora13" name="hora13">
                        
                        <label for="hora14">08:00:00</label>
                        <input type="text" id="hora14" name="hora14">

                        <label for="hora15">08:30:00</label><br>
                        <input type="text" id="hora15" name="hora15">
                        
                        <label for="hora16">06:30:00</label>
                        <input type="text" id="hora16" name="hora16">

                        <label for="hora17">07:00:00</label>
                        <input type="text" id="hora17" name="hora17">

                         <label for="hora18">07:30:00</label><br>
                        <input type="text" id="hora18" name="hora18">
                        
                        <label for="hora19">08:00:00</label>
                        <input type="text" id="hora19" name="hora19">

                        <label for="hora20">08:30:00</label><br>
                        <input type="text" id="hora20" name="hora20">

                        <input type="submit" value="Cadastrar"><br>
                        <input type="reset" value="Limpar Cadastro">
                    </form>
                </div>
            </center>
        </div>        
    </body>
</html>
