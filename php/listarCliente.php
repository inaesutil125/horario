
<html>
    <head>
        <meta http-equiv="Content-Type" 
              content="text/html; charset=UTF-8">
        <title>Pesquisar</title>
    </head>
    <body bgcolor = "#98FB98">        
        <?php
            echo "<CENTER>";
            
            include_once("conexaoBD.php");
            $listar = "SELECT * FROM usuarios"; 
            
            $res = mysqli_query($link, $listar) or die ("Erro ao pesquisar dados do cliente. ". mysqli_error() );
                  
            $total = mysqli_num_rows($res);
            echo "<H3>O total de clientes é: $total </H3>";
            
            echo "<TABLE border=1>";
            echo "<TR>
                <td>ID</td>
                <td>TIPO DE USUARIO</td>
                <td>NOME</td>
                <td>SOBRENOME</td>
                <td>DTNASC</td>
                <td>ENDERECO</td>
                 <td>CPF</td>
                <td>SEXO</TD>
                <td>EMAIL</td>
                </TR>";
            
            while ( $registro = mysqli_fetch_assoc($res) ) {

                $idCliente = $registro["idCliente"];
                $tipoUsuario = $registro["tipoUsuario"];
                $nome      = $registro["nome"];
                $ender     = $registro["ender"];
                $cpf       = $registro["cpf"];
                $estado    = $registro["estado"];
                $sexo      = $registro["sexo"];
                $email     = $registro["email"];

                echo "<tr>
                      <td>$idCliente</td>
                      <td>$nome</td>
                      <td>$sobrenome</td>
                      <td>$ender</td>
                      <td>$cpf</td>
                      <td>$estado</td>
                      <td>$sexo</td>
                      <td>$email</td>
                </tr>";
            }
            echo "</table>"; 
            echo "<br><a href='formCadastro.php' title='Vai para a tela de Cadastro de Clientes'>Cadastrar Novo Cliente</a>";
            echo "</CENTER>";
        ?>
    </body>
</html>

