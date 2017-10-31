<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $tipoUsuario  = $_POST["tipoUsuario"];
            $emailUsuario = $_POST["email"];
            $senhaUsuario = $_POST["senha"];
            
            echo "Tipo de Usuário: $tipoUsuario<br>Email: $emailUsuario <br>Senha: $senhaUsuario<br>";
            include_once ("conexaoBD.php");
           
            if ($tipoUsuario == "3"){
                $buscarLogin = "SELECT * FROM usuarios WHERE email = '$emailUsuario' AND senha = '$senhaUsuario' AND tipoUsuario = 3";
            }
            //criar mais um if para o professor 
            elseif ($tipoUsuario == "2") {
                $buscarLogin = "SELECT * FROM usuarios WHERE email = '$emailUsuario' AND senha = '$senhaUsuario' AND tipoUsuario = 2";
            }
            
            elseif ($tipoUsuario == "1") {
                $buscarLogin = "SELECT * FROM usuarios WHERE email = '$emailUsuario' AND senha = '$senhaUsuario' AND tipoUsuario = 1";
            }
            echo $buscarLogin;
            
            $confirmarBuscaLogin = mysqli_query($link, $buscarLogin) or die ("<p>Erro ao buscar Usuário!</p>");
            
            if ($registro = mysqli_fetch_assoc($confirmarBuscaLogin)){
                $idUsuario = $registro["idUsuario"];
                $nome = $registro["nome"];
                //echo "<p>Bem vindo(a), $nome!<br></p>";
                session_start();
                $_SESSION["email"] = $emailUsuario;
                $_SESSION["nome"] = $nome;
                $_SESSION["tipoUsuario"] = $tipoUsuario;
                $_SESSION["idUsuario"] = $idUsuario;
                header("Location: pgInicial.php"); 
            }
            else {
                header("Location:formLogin.php?erro=Login inválido.");
                //echo "Nao Entrou no IF =/";
            }
        ?>
    </body>
</html>