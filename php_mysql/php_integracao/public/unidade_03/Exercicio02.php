<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
    </head>

    <body>
        <?php
        //include se der erro continua e execução da página, require dá erro fatal e não executa mais nada. Pode se usar os dois com a mesma função de adicionar porém com essa diferença de erro.Pode se ser usado tbm o include_once e require_once adicionando apenas uma vez o elemento.
            include("pagina01.php");
            echo "<br>";
            require_once("pagina02.php");
            
        ?>
    </body>
</html>