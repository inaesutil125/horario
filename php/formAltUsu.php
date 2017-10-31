<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    $idUsuario = $_GET["codigo"];
    include_once 'validar.php';
    include_once 'conexaoBD';
?>
<html>
    <head>
        <title>Alterar dados do Usuário</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/estiloBarraNavegacaoFixa.css" rel="stylesheet" type="text/css">
        <link href="../css/estiloFormulario.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
            if ($_SESSION["tipoUsuario"] == "administrador"){
                echo"
                <header>
                    <ul id ='ulHorizontal'>
                        <li id='liHorizontal'><a href='paginaInicial.php'><img id='home' src='../imagens/whiteHome.png' width='15'>Início</a></li>
                        <li id='liHorizontal'><a href='#'>Institucional</a></li>
                        <li id='liHorizontal'><a href='#'>Como Ajudar</a></li>
                        <li id='liHorizontal'><a href='relatorios.php'>Relatórios</a></li>               
                        <li id='liHorizontal'><a href='formCadastroDoacaoAdm.php'>Cadastrar Doações</a></li>
                        <li id='liHorizontal'><a href='formCadastroPedidos.php'>Cadastrar Pedidos</a></li>
                        <li id='liHorizontal'><a href='formCadastroAdm.php'>Cadastrar Usuário</a></li>
                        <li id='liHorizontal'><a href='formDeContato.php'>Contato</a></li>";

                        if (session_start()){
                            echo "<li id='liHorizontal' style='float:right'><a href='logout.php'>Sair</a></li>"; 
                        }
                        else {
                            echo "<li id='liHorizontal' style='float:right' class='active'><a href='formLogin.php'>Login</a></li>"; 
                        }
                    echo "</ul>
                </header>";
            }
            elseif ($_SESSION["tipoUsuario"] == "doador"){
                echo"
                <header>
                    <ul id ='ulHorizontal'>
                        <li id='liHorizontal'><a href='paginaInicial.php'><img id='home' src='../imagens/whiteHome.png' width='15'>Início</a></li>
                        <li id='liHorizontal'><a href='#'>Institucional</a></li>
                        <li id='liHorizontal'><a href='#'>Como Ajudar</a></li>               
                        <li id='liHorizontal'><a href='formCadastroDoacao.php'>Doe Agora</a></li>
                        <li id='liHorizontal'><a href='formDeContato.php'>Contato</a></li>";

                        if (session_start()){
                            echo "<li id='liHorizontal' style='float:right'><a href='logout.php'>Sair</a></li>"; 
                        }
                        else {
                            echo "<li id='liHorizontal' style='float:right' class='active'><a href='formLogin.php'>Login</a></li>"; 
                        }
                    echo "</ul>
                </header>";
            }
            else {
                echo"
                <header>
                    <ul id ='ulHorizontal'>
                        <li id='liHorizontal'><a href='index.php'><img id='home' src='../imagens/whiteHome.png' width='15'>Home</a></li>
                        <li id='liHorizontal'><a href='#'>Institucional</a></li>
                        <li id='liHorizontal'><a href='#'>Como Ajudar</a></li>               
                        <li id='liHorizontal'><a href='formContato.php'>Contato</a></li>
                        <li id='liHorizontal' style='float:right' class='active'><a href='formLogin.php'>Login</a></li>
                    </ul>
                </header>";
            }
        ?>
        <?php
           
            echo "<CENTER>";
            include_once("conexaoBD.php");
            $listar = "SELECT * FROM horarioo WHERE idHorarioo=$idHorarioo"; 
            
            $res = mysqli_query($link, $listar) or die ("Erro ao pesquisar dados do usuario. ". mysqli_error($link) );
                  
            $total = mysqli_num_rows($res);
            echo "<H3>Total de usuarios: $total </H3>";
            

            while ( $registro = mysqli_fetch_assoc($res) ) {
                $idHorarioo = $registro["idhorarioo"];
                
            }
        ?>
        <div id="master">
            <center>
                <div id="divFormulario">
                    <form method="post" name="formAltUsu" action="alterar.php" enctype="multipart/form-data">
                        <h1>Atualizar Horário de Aula</h1>
                    
                         <label for="hora1">06:30:00</label>
                        <input type="text" id="hora1" name="hora1" readonly="true" required
                    value="<?php echo $hora1; ?>">
                       
                    
                    <label for="hora1">hora1</label>
                    <input type="text" id="hora1" name="hora1" required
                    value="<?php echo $hora1; ?>">

                   <label for="hora2">hora1</label>
                    <input type="text" id="hora2" name="hora2" required
                    value="<?php echo $hora2; ?>">
                    
                    
                        <input  type="reset" value="Limpar">
                        
                    </form>
                </div>
            </center>
        </div>
    </body>
</html>