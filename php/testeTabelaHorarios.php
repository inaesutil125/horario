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
        <title>Troca de Horários</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/estiloBarraNavegacaoFixa.css" rel="stylesheet" type="text/css">
        <link href="../css/estiloFormulario.css" rel="stylesheet" type="text/css">
        <link href="../css/estiloTabelaHorarios.css" rel="stylesheet" type="text/css">
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
                            <li id='liHorizontal'><a href='index.php'><img id='home' src='../imagens/whiteHome.png' width='15'>Início</a></li>
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
        
  
        
        
        <div id="master">
            <center>
                
                <div id="divTabelaHorarios">
                    <?php
                    
                        include_once 'conexaoBD.php';
                        $buscarHorarios = "SELECT * FROM horarios";
                        $confirmarBuscarHorarios = mysqli_query($link, $buscarHorarios);
                        $totalHorarios = mysqli_num_rows($confirmarBuscarHorarios);
                        
                        echo "<p>Quantidade de Horarios: $totalHorarios</p>";
                    
                        $matriz[0][0];
                        $linha  = 1;
                        $coluna = 1;
                        
                        $data = date('Y-m-d');
                        $diaAtual = date('w', strtotime($data));
                        //echo "Data: $data<br>Dia da Semana: $diaAtual";
                        $dia = date('d');
                        $mes = date('m');
                 
                        echo "<table border='2'>";
                        // para cada horario
                        for ($linha=1; $linha<=$totalHorarios; $linha++){
                            echo "<tr>";
                            if ($linha > 1 && $linha <=6){
                                
                                include_once 'conexaoBD.php';
                                $buscarHorarios = "SELECT * FROM horarios";
                                $confirmarBuscarHorarios = mysqli_query($link, $buscarHorarios);
                                $totalHorarios = mysqli_num_rows($confirmarBuscarHorarios);
                                
                                if ($confirmarBuscarHorarios) {
                                    while ($registro = mysqli_fetch_assoc($confirmarBuscarHorarios)) {
                                        $hora = $registro["horario"];
                                        echo "<tr><td>$hora</td></tr>";
                                        echo "<p>Linha: $linha | Coluna: $coluna</p>";
                                    }
                                }
                                //echo "<p>Quantidade de Horarios: $totalHorarios</p>";
                                echo "</th>";
                            }
                            for ($coluna=1; $coluna<=6; $coluna++){
                                if (($linha == 1) && ($coluna == 1)) {
                                    echo "<th>HORA</th>";
                                }
                                if (($linha == 1) && ($coluna == 2)) {
                                    switch ($diaAtual){
                                        case 1: $segunda = $dia;
                                            echo "<TH>SEGUNDA ($segunda/$mes)</TH>";
                                        break;
                                    
                                        case 2: $segunda = $dia-1;
                                            echo "<TH>SEGUNDA ($segunda/$mes)</TH>";
                                        break;
                                    
                                        case 3: $segunda = $dia-2;
                                            echo "<TH>SEGUNDA ($segunda/$mes)</TH>";
                                        break;
                                        
                                        case 4: $segunda = $dia-3;
                                            echo "<TH>SEGUNDA ($segunda/$mes)</TH>";
                                        break;
                                    
                                        case 5: $segunda = $dia-4;
                                            echo "<TH>SEGUNDA ($segunda/$mes)</TH>";
                                        break;
                                    }
                                }
                                
                                if (($linha == 1) && ($coluna == 3)) {
                                    switch ($diaAtual){
                                        case 1: $terca = $dia+1;
                                            echo "<TH>TERÇA ($terca/$mes)</TH>";
                                        break;
                                    
                                        case 2: $terca = $dia;
                                            echo "<TH>TERÇA ($terca/$mes)</TH>";
                                        break;
                                    
                                        case 3: $terca = $dia-1;
                                            echo "<TH>TERÇA ($terca/$mes)</TH>";
                                        break;
                                        
                                        case 4: $terca = $dia-2;
                                            echo "<TH>TERÇA ($terca/$mes)</TH>";
                                        break;
                                    
                                        case 5: $terca = $dia-3;
                                            echo "<TH>TERÇA ($terca/$mes)</TH>";
                                        break;
                                    }
                                }
                                
                                if (($linha == 1) && ($coluna == 4)) {
                                    switch ($diaAtual){
                                        case 1: $quarta = $dia+2;
                                            echo "<TH>QUARTA ($quarta/$mes)</TH>";
                                        break;
                                    
                                        case 2: $quarta = $dia+1;
                                            echo "<TH>QUARTA ($quarta/$mes)</TH>";
                                        break;
                                    
                                        case 3: $quarta = $dia;
                                            echo "<TH>QUARTA ($quarta/$mes)</TH>";
                                        break;
                                        
                                        case 4: $quarta = $dia-1;
                                            echo "<TH>QUARTA ($quarta/$mes)</TH>";
                                        break;
                                    
                                        case 5: $quarta = $dia-2;
                                            echo "<TH>QUARTA ($quarta/$mes)</TH>";
                                        break;
                                    }
                                }
                                
                                if (($linha == 1) && ($coluna == 5)) {
                                    switch ($diaAtual){
                                        case 1: $quinta = $dia+3;
                                            echo "<TH>QUINTA ($quinta/$mes)</TH>";
                                        break;
                                    
                                        case 2: $quinta = $dia+2;
                                            echo "<TH>QUINTA ($quinta/$mes)</TH>";
                                        break;
                                    
                                        case 3: $quinta = $dia+1;
                                            echo "<TH>QUINTA ($quinta/$mes)</TH>";
                                        break;
                                        
                                        case 4: $quinta = $dia;
                                            echo "<TH>QUINTA ($quinta/$mes)</TH>";
                                        break;
                                    
                                        case 5: $quinta = $dia-1;
                                            echo "<TH>QUINTA ($quinta/$mes)</TH>";
                                        break;
                                    }
                                }
                                
                                if (($linha == 1) && ($coluna == 6)) {
                                    switch ($diaAtual){
                                        case 1: $sexta = $dia+4;
                                            echo "<TH>SEXTA ($sexta/$mes)</TH>";
                                        break;
                                    
                                        case 2: $sexta = $dia+3;
                                            echo "<TH>SEXTA ($sexta/$mes)</TH>";
                                        break;
                                    
                                        case 3: $sexta = $dia+2;
                                            echo "<TH>SEXTA ($sexta/$mes)</TH>";
                                        break;
                                        
                                        case 4: $sexta = $dia+1;
                                            echo "<TH>SEXTA ($sexta/$mes)</TH>";
                                        break;
                                    
                                        case 5: $sexta = $dia;
                                            echo "<TH>SEXTA ($sexta/$mes)</TH>";
                                        break;
                                    }
                                }
                            }
                            echo "</tr>";
                        }
                         
                        /* 
                        $buscarAulas = "SELECT * FROM aulas";
                        $confirmarBuscarAulas = mysqli_query($link, $buscarAulas);
                        
                            if ($confirmarBuscarAulas) {     
                                while ($registro = mysqli_fetch_assoc($confirmarBuscarAulas)) {
                                    $idAula = $registro["idAula"];
                                    $data = $registro["data"];
                                    $hora = $registro["hora"];
                                    $status = $registro["status"];
                                    
                                    $dia = date("d", strtotime($data));
                                    $mes = date("m", strtotime($data));
                                    $ano = date("Y", strtotime($data));
                                    
                                    if ($ano == 2017){
                                        if ($mes == 9){
                                            if ($dia == 20){
                                                echo "<tr>
                                                <td>idAula: $idAula</td>
                                                <td>Data: $data</td>
                                                <td>Hora: $hora</td>
                                                <td>Status: $status</td>
                                                 </tr>";
                                            }
                                        }
                                    }
                                    
                                }
                            }
                            else {
                                die ("Erro ao buscar aulas!<br>");
                            }
                        
                        
                        include_once 'conexaoBD.php';
                        $buscarHorarios = "SELECT horario FROM horarios";
                        $confirmarBuscarHorarios = mysqli_query($link, $buscarHorarios);
                        $totalHorarios = mysqli_num_rows($result);
                        
                        echo "<p>Quantidade de Horarios: $totalHorarios</p>";
                        
                        
                        
                        /*
                        
                            if ($confirmarBuscarHorarios) {     
                                while ($registro = mysqli_fetch_assoc($confirmarBuscarHorarios)) {
                                    $hora = $registro["horario"];
                                    echo "<tr>
                                            <td>$hora</td>
                                            <td><a href='trocarH.php'>$status</td>
                                            <td><a href='#'>$status</td>
                                            <td><a href='#'>$status</td>
                                            <td><a href='#'>$status</td>
                                            <td><a href='#'>$status</td>
                                                <td><a href='#'>$status</td>
                                         </tr>";
                                }
                            }
                            else {
                                die ("Erro ao buscar horários!<br>");
                            }
                        echo "</tr>";
                        echo "</table>";
                        
                        /*
                         * $buscarAulas = "SELECT * FROM aulas";
                        $confirmarBuscarAulas = mysqli_query($link, $buscarAulas);
                        
                            if ($confirmarBuscarAulas) {     
                                while ($registro = mysqli_fetch_assoc($confirmarBuscarAulas)) {
                                    $idAula = $registro["idAula"];
                                    $data = $registro["data"];
                                    $hora = $registro["hora"];
                                    $status = $registro["status"];
                                    echo "<tr>
                                        <td>idAula: $idAula</td>
                                        <td>Data: $data</td>
                                        <td>Hora: $hora</td>
                                        <td>Status: $status</td>
                                         </tr>";
                                }
                            }
                            else {
                                die ("Erro ao buscar aulas!<br>");
                            }
                         */
                    ?>
                </center>
            </div>
        
    </body>
</html>