<?php

    $matriz[0][0];
    $linha  = 1;
    $coluna = 1;
    
    echo "<table border='2'>";
    for ($linha=1; $linha<=3; $linha++){
        echo "<tr>";
        for ($coluna=1; $coluna<=3; $coluna++){
            echo "<td>$linha</td>";
            echo "<td>$coluna</td>";
        }
        echo"</tr>";
    }
?>