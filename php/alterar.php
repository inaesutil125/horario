<?php
    include_once 'validar.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../css/estiloBarraNavegacaoFixa.css" rel="stylesheet" type="text/css">
        <link href="../css/estiloFormulario.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
            if ($_SESSION["tipoUsuario"] == "administrador"){
                echo"
                <header>
                <ul id ='ulHorizontal'>
                        <li id='liHorizontal'><a href='indexAdministrador.php'><img id='home' src='../imagens/whiteHome.png' width='15'>Home</a></li> 
                        <li id='liHorizontal'><a href='pesqChamados.php'>Pesquisar Chamados</a></li>
                        <li id='liHorizontal'><a href='formuCadastroAdm.php'>Cadastrar Alunos</a></li>               
                        <li id='liHorizontal'><a href='formuCadastroAdministrador.php'>Cadastrar Administradores</a></li>
                        <li id='liHorizontal'><a href='relatoriosLab.php'>Relatórios</a></li>
                        <li id='liHorizontal'><a href='#'>Sobre</a></li>
                        <li id='liHorizontal'class= 'active'><a href='contato.php'>Contato</a></li>";
                        
                        if (session_start()){
                            echo "<li id='liHorizontal' style='float:right'><a href='logout.php'>Sair</a></li>"; 
                        }
                        else {
                            echo "<li id='liHorizontal' style='float:right'><a href='formuLogin.php'>Login</a></li>"; 
                        }
                    echo "</ul>
                </header>";
            }
            elseif ($_SESSION["tipoUsuario"] == "aluno"){
                echo"
                <header>
                    <ul id ='ulHorizontal'>
                        <li id='liHorizontal'><a href='indexAluno.php'><img id='home' src='../imagens/whiteHome.png' width='15'>Home</a></li>
                        <li id='liHorizontal'><a href='formuRegistrarChamado.php'>Laboratórios</a></li>
                        <li id='liHorizontal'><a href='#'>Sobre</a></li>
                        <li id='liHorizontal'class= 'active'><a href='contato.php'>Contato</a></li>";
                        

                        if (session_start()){
                            echo "<li id='liHorizontal' style='float:right'><a href='logout.php'>Sair</a></li>"; 
                        }
                        else {
                            echo "<li id='liHorizontal' style='float:right'><a href='formuLogin.php'>Login</a></li>"; 
                        }
                    echo "</ul>
                </header>";
            }
            else {
                echo"
                <header>
                    <ul id ='ulHorizontal'>
                        <li id='liHorizontal'><a href='index.php'><img id='home' src='../imagens/whiteHome.png' width='15'>Home</a></li>
                        <li id='liHorizontal'><a href='#'>Sobre</a></li>               
                        <li id='liHorizontal'><a href='contato.php'>Contato</a></li>
                        <li id='liHorizontal' style='float:right' class='active'><a href='formuLogin.php'>Login</a></li>
                    </ul>
                </header>";
            }
        ?>
        <div id="master">
        <?php
            $idHorarioo = $_POST["ra"];
            $hora1 = $_POST["hora1"];
            $hora2 = $_POST["hora2"];
           
           
            $camposOK = true;
            $mensagem = "";
            if ( $hora1 == "" ) {
                $mensagem = $mensagem . "Informe se ta ocupado ou não. <br>";
                $camposOK = false;
            }
            if ( $hora2 == "" ) {
                $mensagem = $mensagem . "Informe se ta ocupado ou não. <br>";
                $camposOK = false;
            }
            
            include_once("conexaoBD.php");
            $alterarAluno = "UPDATE horarioo SET  hora1 = '$hora1', hora2 = '$hora2' WHERE idHorarioo = $idHorarioo";
            
            $confirmarAlterarUsuario = mysqli_query($link, $alterarAluno);
                  
            if ($confirmarAlterarUsuario){
                echo "<p>Os dados de $hora1 foram alterados com êxito!</p>";
                header("Location:formAltUsu.php");
            }
            else {
                die ("<p>Erro ao tentar alterar os dados de $hora1</p>" . mysqli_error($link));
            }
        ?>
        </div>
    </body>
</html>