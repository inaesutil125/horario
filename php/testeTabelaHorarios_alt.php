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
                            $cache_consulta_horarios = array();
                            $cache_existe = FALSE;
                            
                            function horario_status($data, $hora) {
                                global $cache_consulta_horarios;
                                global $cache_existe;
                                
                                if ($cache_existe == FALSE) {
                                    include 'conexaoBD.php';
                                    // 
                                    $query = "SELECT * FROM `aulas` WHERE `data` >= '$data' AND `data` < DATE_ADD('$data', INTERVAL 7 DAY)";
                                    // $query = "SELECT * FROM `aulas` WHERE `data` = '$data' AND `hora` = '$hora'";
                                    $resultado = mysqli_query($link, $query);
                                    $n_linhas = mysqli_num_rows($resultado);

                                    if ($resultado) {
                                        while ($registro = mysqli_fetch_assoc($resultado)) {
                                            $minha_data = $registro["data"];
                                            $minha_hora = $registro["hora"];
                                            $meu_status = $registro["status"];
                                            
                                            $item = array("data" => $minha_data, "hora" => $minha_hora, "status" => $meu_status, "n_linhas" => 1);
                                            $chave = $minha_data . "_" . $minha_hora;
                                            if (isset($cache_consulta_horarios[$chave])) {
                                                $cache_consulta_horarios[$chave]["n_linhas"]++;
                                            } else {
                                                $cache_consulta_horarios[$chave] = $item;
                                            }
                                        }
                                    }
                                    $cache_existe = TRUE;
                                } 
                                
                                $item_cache = procura_horario_cache($data, $hora);
                                
                                return array("eh_livre" => $item_cache["status"] !== "1", "numero_aulas" => $item_cache["n_linhas"]);
                            }
                            
                            function procura_horario_cache($data, $hora) {
                                global $cache_consulta_horarios;
                                
//                                foreach ($cache_consulta_horarios as $item) {
//                                    if ($item["data"] == $data && $item["hora"] == $hora) {
//                                        return $item;
//                                    }
//                                }
                                
                                $chave = $data . "_" . $hora;
                                if (isset($cache_consulta_horarios[$chave])) { 
                                    return $cache_consulta_horarios[$chave];
                                }
                                return array("data" => $data, "hora" => $hora, "status" => "0", "n_linhas" => 0);
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
                   
                        $hoje = date_create();
                        $hoje_str = date_format($hoje, "Y-m-d");
                        $data = date('Y-m-d');
                        $diaAtual = date('w', strtotime($data));
                        //echo "Data: $data<br>Dia da Semana: $diaAtual";
                        $dia = date('d');
                        $mes = date('m');
                
                        // por default
                        $segunda_data = date_create($hoje_str);
                        
                        switch ($diaAtual){
                            case 1:
                                $segunda = $dia;
                                // utiliza a data default para segunda_data
                            break;

                            case 2:
                                $segunda = $dia-1;
                                date_add($segunda_data, date_interval_create_from_date_string("-1 day"));
                            break;

                            case 3:
                                $segunda = $dia-2;
                                date_add($segunda_data, date_interval_create_from_date_string("-2 day"));
                            break;

                            case 4:
                                $segunda = $dia-3;
                                date_add($segunda_data, date_interval_create_from_date_string("-3 day"));
                            break;

                            case 5:
                                $segunda = $dia-4;
                                date_add($segunda_data, date_interval_create_from_date_string("-4 day"));
                            break;
                        }
                       
                        $segunda_str = date_format($segunda_data, "Y-m-d");
                        
                        $terca = $segunda + 1;
                        $terca_data = date_create($segunda_str);
                        date_add($terca_data, date_interval_create_from_date_string("1 day"));
                        $terca_str = date_format($terca_data, "Y-m-d");
                        
                        $quarta = $terca + 1;
                        $quarta_data = date_create($terca_str); 
                        date_add($quarta_data, date_interval_create_from_date_string("1 day"));
                        $quarta_str = date_format($quarta_data, "Y-m-d");
                        
                        $quinta = $quarta + 1;
                        $quinta_data = date_create($quarta_str); 
                        date_add($quinta_data, date_interval_create_from_date_string("1 day"));
                        $quinta_str = date_format($quinta_data, "Y-m-d");
                        
                        $sexta = $quinta + 1;
                        $sexta_data = date_create($quinta_str); 
                        date_add($sexta_data, date_interval_create_from_date_string("1 day"));
                        $sexta_str = date_format($sexta_data, "Y-m-d");
                       
                        $dias_da_semana = array(
                            "segunda" => $segunda_data,
                            "terca" => $terca_data,
                            "quarta" => $quarta_data,
                            "quinta" => $quinta_data,
                            "sexta" => $sexta_data
                        ); 
                       
                    
                        foreach ($dias_da_semana as $dia_da_semana){
                                // echo "<td>" . $dia_da_semana . " " . $horario . "<button>Butão</button></td>" . PHP_EOL;
                                //echo "<td><button type=\"submit\" name=\"troca_horario\" value=\""  . $dia_da_semana . "-" . $mes . "_" . $horario . "\">Trocar</button></td>" . PHP_EOL;
                            }
                        echo "<form action=\"#\" method=\"GET\">";
                        echo "<table><tbody>";
                        echo "<tr><th scope=\"col\">Horário</th><th scope=\"col\">Segunda-feira<br>" . date_format($segunda_data, 'd/m') . "</th><th scope=\"col\">Terça-feira<br>" . date_format($terca_data, 'd/m') . "</th><th scope=\"col\">Quarta-feira<br>" . date_format($quarta_data, 'd/m') . "</th><th scope=\"col\">Quinta-feira<br>" . date_format($quinta_data, 'd/m') . "</th><th scope=\"col\">Sexta-feira<br>" . date_format($sexta_data, 'd/m') . "</th></tr>";
                        foreach ($horarios as $horario) {
                            echo "<tr>";
                            echo "<th scope=\"row\">$horario</th>";
                            foreach ($dias_da_semana as $dia_da_semana){
                                $data_fmt_consulta = date_format($dia_da_semana, "Y-m-d");
                                $consulta_horario = horario_status($data_fmt_consulta, $horario);
                                $eh_livre = $consulta_horario["eh_livre"];
                                $numero_aulas = $consulta_horario["numero_aulas"];
                                // echo "<td>" . $dia_da_semana . " " . $horario . "<button>Butão</button></td>" . PHP_EOL;
                                echo "<td><span class=\"horario-status " . ($eh_livre ? "livre" : "ocupado") . "\">(" . $numero_aulas . ") " . ($eh_livre ? "LIVRE" : "OCUPADO") . "</span><button type=\"submit\" name=\"troca_horario\" value=\""  . date_format($dia_da_semana, 'd') . "-" . $mes . "_" . $horario . "\">Trocar</button></td>" . PHP_EOL;
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