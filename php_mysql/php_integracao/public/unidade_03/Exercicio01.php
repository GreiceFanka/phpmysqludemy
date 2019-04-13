<?php require_once("../../conexao/conexao.php");
?>
<?php
    //Passo 3 - fazer uma consulta ao banco de dados
    $consulta_categorias = "SELECT * FROM categorias";
    $categorias = mysqli_query($conecta,$consulta_categorias);
    if (!$categorias){die("Falha na consulta ao banco de dados");
        
    }
    
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
    </head>

    <body>
        <ul>
            <?php
            //passo 4 - Listagem dos dados
            while ($registro = mysqli_fetch_assoc($categorias)){
            ?>
            <li><?php echo $registro["nomecategoria"]?></li>
               
            <?php    
                }
            ?>
        </ul>
            <?php
            //passo 5 - liberar os dados consultados do servidor
                mysqli_free_result($categorias);
            ?>
    </body>
</html>
            <?php
            //passo 6 - fechar conexão
                mysqli_close($conecta); 
            ?>