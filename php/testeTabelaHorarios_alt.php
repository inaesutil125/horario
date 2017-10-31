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
       
 
       
       
        <div id="master">
            <center>
               
                <div id="divTabelaHorarios">
                    <?php
                            function horario_status($data, $hora) {
                                include 'conexaoBD.php';
                                $query = "SELECT * FROM `aulas` WHERE `data` = '$data' AND `hora` = '$hora'";
                                $resultado = mysqli_query($link, $query);
                                $n_linhas = mysqli_num_rows($resultado);

                                if ($resultado) {
                                    while ($registro = mysqli_fetch_assoc($resultado)) {
                                        $status = $registro["status"];
                                        // array_push($horarios, $hora);
                                    }
                                }
                                return array("eh_livre" => $status === "1", "numero_aulas" => $n_linhas);
                            }
                    
                        $horarios = [];
                       
                        include_once 'conexaoBD.php';
                        $buscarHorarios = "SELECT * FROM horarios";
                        $confirmarBuscarHorarios = mysqli_query($link, $buscarHorarios);
                        $totalHorarios = mysqli_num_rows($confirmarBuscarHorarios);
                       
                        if ($confirmarBuscarHorarios) {
                            while ($registro = mysqli_fetch_assoc($confirmarBuscarHorarios)) {
                                $hora = $registro["horario"];
                                array_push($horarios, $hora);
                            }
                        }
                    
                       
//                        echo "<pre>";
//                        var_dump($horarios);
//                        echo "</pre>";
                   
                        $data = date('Y-m-d');
                        $diaAtual = date('w', strtotime($data));
                        //echo "Data: $data<br>Dia da Semana: $diaAtual";
                        $dia = date('d');
                        $mes = date('m');
                
                        switch ($diaAtual){
                            case 1:
                                $segunda = $dia;
                            break;

                            case 2:
                                $segunda = $dia-1;
                            break;

                            case 3:
                                $segunda = $dia-2;
                            break;

                            case 4:
                                $segunda = $dia-3;
                            break;

                            case 5:
                                $segunda = $dia-4;
                            break;
                        }
                       
                        $terca = $segunda + 1;
                        $quarta = $terca + 1;
                        $quinta = $quarta + 1;
                        $sexta = $quinta + 1;
                       
                        $dias_da_semana = array(
                            "segunda" => $segunda,
                            "terca" => $terca,
                            "quarta" => $quarta,
                            "quinta" => $quinta,
                            "sexta" => $sexta
                        ); 
                       
                    
                        foreach ($dias_da_semana as $dia_da_semana){
                                // echo "<td>" . $dia_da_semana . " " . $horario . "<button>Butão</button></td>" . PHP_EOL;
                                //echo "<td><button type=\"submit\" name=\"troca_horario\" value=\""  . $dia_da_semana . "-" . $mes . "_" . $horario . "\">Trocar</button></td>" . PHP_EOL;
                            }
                        echo "<form action=\"#\" method=\"GET\">";
                        echo "<table><tbody>";
                        echo "<tr><th scope=\"col\">Horário</th><th scope=\"col\">Segunda-feira<br>" . ($dia_da_semana -4) . "/$mes</th><th scope=\"col\">Terça-feira<br>" . ($dia_da_semana -3) . "/$mes</th><th scope=\"col\">Quarta-feira<br>" . ($dia_da_semana -2) . "/$mes</th><th scope=\"col\">Quinta-feira<br>" . ($dia_da_semana -1) . "/$mes</th><th scope=\"col\">Sexta-feira<br>" . ($dia_da_semana) . "/$mes</th></tr>";
                        foreach ($horarios as $horario) {
                            echo "<tr>";
                            echo "<th scope=\"row\">$horario</th>";
                            foreach ($dias_da_semana as $dia_da_semana){
                                $consulta_horario = horario_status($data, $horario);
                                $eh_livre = $consulta_horario["eh_livre"];
                                $numero_aulas = $consulta_horario["numero_aulas"];
                                // echo "<td>" . $dia_da_semana . " " . $horario . "<button>Butão</button></td>" . PHP_EOL;
                                echo "<td><span class=\"horario-status " . ($eh_livre ? "livre" : "ocupado") . "\">(" . $numero_aulas . ") " . ($eh_livre ? "LIVRE" : "OCUPADO") . "</span><button type=\"submit\" name=\"troca_horario\" value=\""  . $dia_da_semana . "-" . $mes . "_" . $horario . "\">Trocar</button></td>" . PHP_EOL;
                            }
                        
                            echo "</tr>";
                        }
                       
                        echo "</tbody></table>";
                        echo "</form>";
                    ?>
                </center>
            </div>
       
    </body>
</html>