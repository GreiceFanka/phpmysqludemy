<?php require_once("../../conexao/conexao.php"); ?>
<?php
    session_start();
        if(!isset($_SESSION["user_portal"])){
        header("location:login.php");
        }
        if(isset($_GET["codigo"])){
        $produto_id = $_GET["codigo"];}
        else {
        header("location:login.php");
        }
    // Consulta ao banco de dados
    $consulta = "SELECT * ";
    $consulta .= "FROM produtos ";
    $consulta .= "WHERE produtoID = {$produto_id} ";
    $detalhe = mysqli_query($conecta,$consulta);

    //testar erro
    if (!$detalhe){
        die ("Falha no banco de dados");
    } else { $dados_detalhe = mysqli_fetch_assoc($detalhe);
            
        $nomeproduto   =  $dados_detalhe ["nomeproduto"];
        $descricao     =  $dados_detalhe ["descricao"];
        $codigobarra   =  $dados_detalhe ["codigobarra"];
        $tempoentrega  =  $dados_detalhe ["tempoentrega"];
        $precorevenda  =  $dados_detalhe ["precorevenda"];
        $precounitario =  $dados_detalhe ["precounitario"];
        $estoque       =  $dados_detalhe ["estoque"];
        $imagemgrande  =  $dados_detalhe ["imagemgrande"];
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/produto_detalhe.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>
            <div id ="detalhe_produto" >
                <ul>
                    <li class="imagem"><img src="<?php echo $imagemgrande?>"></li>
                    <li><h2><?php echo $nomeproduto?></h2></li>
                    <li><b>Descrição: </b> <?php echo $descricao?></li>
                    <li><b>Código de barra: </b> <?php echo $codigobarra?></li>
                    <li><b>Tempo de entrega: </b> <?php echo $tempoentrega?></li>
                    <li><b>Preço de revenda: </b><?php echo "R$ ".
                    number_format($precorevenda,2,",",".")?></li>
                    <li><b>Pre&ccedil;o unitário: </b> <?php echo "R$ ".number_format($precounitario,2,",",".")?></li>
                    <li><b>Estoque: </b> <?php echo $estoque?></li>
                              
                </ul>
             </div>
        </main>

        <?php include_once("_incluir/rodape.php"); ?>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>