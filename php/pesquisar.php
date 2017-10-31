
<html>
    <head>
        <meta http-equiv="Content-Type" 
              content="text/html; charset=UTF-8">
        <title>Pesquisar</title>
    </head>
    <body>     
        <?php
            echo "<CENTER>";
            
            include_once("conexaoBD.php");
            $listar = "SELECT * FROM horarioo"; 
            
            $res = mysqli_query($link, $listar) or die ("Erro ao pesquisar dados do cliente. ". mysqli_error() );
                  
            $total = mysqli_num_rows($res);
            echo "<H3>O total de Horarios é: $total </H3>";
            
            echo "<TABLE border=1>";
            echo "<TR>
                <th>Segunda-Feira</th>
                <th>Terça-Feira</th>
                <th>Quarta-Feira</th>
                <th>Quinta-Feira</th>
                <th>Sexta-Feira</th>
                </TR>";
            
            while ( $registro = mysqli_fetch_assoc($res) ) {

                $hora1   = $registro["hora1"];
                $hora2   = $registro["hora2"];
                $hora3   = $registro["hora3"];
                $hora4   = $registro["hora4"];
                $hora5   = $registro["hora5"];
              

                echo "<tr>
                      <td>$hora1</td>
                      <td>$hora2</td>
                      <td>$hora3</td>
                      <td>$hora4</td>
                      <td>$hora5</td>
                </tr>";
            }
            echo "</table>"; 
            echo "<br><a href='formCadastro.php' title='Vai para a tela de Cadastro de Clientes'>Cadastrar Novo Cliente</a>";
            echo "</CENTER>";
        ?>
    </body>
</html>

