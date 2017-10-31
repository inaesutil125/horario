<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title> Telêmaco Borba</title>
        <html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="../css/default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../css/logo.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../css/fonts.css" rel="stylesheet" type="text/css" media="all" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <link href="../css/estiloFormulario.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
           
        </header>
        
        <body>
        <div id="header-wrapper">
        <div id="header" class="container">
        <div id="logo">
        <h1><img src="../imagens/logoBP.jpg" id="imgpos"></img><a href="index.php"></a></h1>
        
        
        </div>
    <div id="menu">
  <ul id ='ulHorizontal'>

      <li id="liHorizontal"><a href="index.php"><img id="home" src="../imagens/whiteHome.png"  class= "active" width="15">Início</a></li>
                <li id="liHorizontal"><a href="formDeContatoUsuario.php">Contato</a></li>
                
                            </ul>
    </div>
  </div>
</div>
       
</body>
        
        
       
            <?php
                if (isset ($_GET["erro"])){
                    $erro = $_GET["erro"];
                    echo "<center><font color='red'>$erro</font></center>";
                }
            ?>
            <center>
                <div id="divFormulario">
                    <h1>LOGIN</h1>
                    <form action="login.php" method="post">
                        <label for="tipoUsuario">Sou um:</label>
                        <select name="tipoUsuario">
                            <?php
                                include_once 'conexaoBD.php';
                                $buscarTipoUsuario = "SELECT * FROM tipoUsuario";
                                $confirmarBuscarUsuario = mysqli_query($link, $buscarTipoUsuario);
                                
                                if ($confirmarBuscarUsuario) {
                                    while ($registro = mysqli_fetch_assoc($confirmarBuscarUsuario)){
                                        $codTipo = $registro["cod_tipo"];
                                        $tipoUsuario = $registro["nome"];
                                        echo "<option value='$codTipo'>$tipoUsuario</option>";
                                    }
                                }
                                else {
                                    die ("Erro ao buscar Tipo de Usuário" . mysqli_error($link));
                                }
                            ?>
                        </select>
                        <br>
                        <label for="email">E-mail</label>
                        <input type="text" id="email" name="email">
                        <br>
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="senha">
                        <br>

                        <input type="submit" value="Logar">
                    </form>
                </div>
            </center>
        </div>
    </body>
</html>

