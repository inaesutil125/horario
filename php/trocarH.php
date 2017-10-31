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
        <title>Troca de horários</title>
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
                            <li id='liHorizontal' class='active' ><a href='pgIninial.php'><img id='home' src='../imagens/whiteHome.png' width='15'>Início</a></li>
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
            <center>
                <h1>Selecione o Horário para o qual deseja efetuar a troca:</h1>
                <div id="divTabelaHorarios">
                    <?php
                        include_once 'conexaoBD.php';
                        $data = date('Y-m-d');
                        $diaAtual = date('w', strtotime($data));
                        //echo "Data: $data<br>Dia da Semana: $diaAtual";
                        $dia = date('d');
                        $mes = date('m');

                        echo "<table border='2'>";
                        echo "<tr>";
                        echo "<th>HORA</th>";

                        while ($diaAtual < 6){
                            switch ($diaAtual) {
                                case 1 : 
                                        $segunda = $dia;
                                        $terca = $dia+1;
                                        $quarta = $dia+2;
                                        $quinta = $dia+3;
                                        $sexta = $dia+4;
                                        echo "<TH>SEGUNDA ($segunda/$mes)</TH>";
                                        echo "<TH>TERÇA ($terca/$mes)</TH>";
                                        echo "<TH>QUARTA ($quarta/$mes)</TH>";
                                        echo "<TH>QUINTA ($quinta/$mes)</TH>";
                                        echo "<TH>SEXTA ($sexta/$mes)</TH>";
                                break;

                                case 2 : 
                                        $segunda = $dia-1;
                                        $terca = $dia;
                                        $quarta = $dia+1;
                                        $quinta = $dia+2;
                                        $sexta = $dia+3;
                                        echo "<TH>SEGUNDA ($segunda/$mes)</TH>";
                                        echo "<TH>TERÇA ($terca/$mes)</TH>";
                                        echo "<TH>QUARTA ($quarta/$mes)</TH>";
                                        echo "<TH>QUINTA ($quinta/$mes)</TH>";
                                        echo "<TH>SEXTA ($sexta/$mes)</TH>";
                                break;

                                case 3 : 
                                        $segunda = $dia-2;
                                        $terca = $dia-1;
                                        $quarta = $dia;
                                        $quinta = $dia+1;
                                        $sexta = $dia+2;
                                        echo "<TH>SEGUNDA ($segunda/$mes)</TH>";
                                        echo "<TH>TERÇA ($terca/$mes)</TH>";
                                        echo "<TH>QUARTA ($quarta/$mes)</TH>";
                                        echo "<TH>QUINTA ($quinta/$mes)</TH>";
                                        echo "<TH>SEXTA ($sexta/$mes)</TH>";
                                break;

                                case 4 : 
                                        $segunda = $dia-3;
                                        $terca = $dia-2;
                                        $quarta = $dia-1;
                                        $quinta = $dia;
                                        $sexta = $dia+1;
                                        echo "<TH>SEGUNDA ($segunda/$mes)</TH>";
                                        echo "<TH>TERÇA ($terca/$mes)</TH>";
                                        echo "<TH>QUARTA ($quarta/$mes)</TH>";
                                        echo "<TH>QUINTA ($quinta/$mes)</TH>";
                                        echo "<TH>SEXTA ($sexta/$mes)</TH>";
                                break;

                                case 5 : 
                                        $segunda = $dia-4;
                                        $terca = $dia-3;
                                        $quarta = $dia-2;
                                        $quinta = $dia-1;
                                        $sexta = $dia;
                                        echo "<TH>SEGUNDA ($segunda/$mes)</TH>";
                                        echo "<TH>TERÇA ($terca/$mes)</TH>";
                                        echo "<TH>QUARTA ($quarta/$mes)</TH>";
                                        echo "<TH>QUINTA ($quinta/$mes)</TH>";
                                        echo "<TH>SEXTA ($sexta/$mes)</TH>";
                                break;

                            }
                            $diaAtual++;
                        }

                        $buscarHorarios = "SELECT * FROM horarios";
                        $confirmarBuscarHorarios = mysqli_query($link, $buscarHorarios);

                            if ($confirmarBuscarHorarios) {     
                                while ($registro = mysqli_fetch_assoc($confirmarBuscarHorarios)) {
                                    $hora = $registro["horario"];
                                    echo "<tr>
                                            <td>$hora</td>
                                            <td><a href=''>Disponível</td>
                                            <td><a href=''>Disponível</td>
                                            <td><a href=''>Disponível</td>
                                            <td><a href=''>Disponível</td>
                                            <td><a href=''>Disponível</td>
                                         </tr>";
                                }
                            }
                            else {
                                die ("Erro ao buscar horários!<br>");
                            }
                        echo "</tr>";
                        echo "</table>";
                    ?>
                </center>
            </div>
        </div> 
    </body>
</html>