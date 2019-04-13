<?php require_once("../../conexao/conexao.php"); ?>
<?php 
    if(isset($_POST["nometransportadora"])){
        $nome     = utf8_decode($_POST["nometransportadora"]);
        $endereco = utf8_decode($_POST["endereco"]);
        $cidade   = utf8_decode($_POST["cidade"]);
        $estado   = $_POST["estados"];
        $cep      = $_POST["cep"];
        $telefone = $_POST["telefone"];
        $cnpj     = $_POST["cnpj"];
        $tID      = $_POST["transportadoraID"];
        
        //Objeto para alterar
        $alterar = "UPDATE transportadoras ";
        $alterar.= "SET ";
        $alterar.= "nometransportadora = '{$nome}', ";
        $alterar.= "endereco = '{$endereco}', ";
        $alterar.= "cidade = '{$cidade}', ";
        $alterar.= "estadoID = {$estado}, ";
        $alterar.= "cep = '{$cep}', ";
        $alterar.= "cnpj = '{$cnpj}', ";
        $alterar.= "telefone = '{$telefone}' ";
        $alterar.= "WHERE transportadoraID = {$tID} ";
        $operacao_alterar = mysqli_query($conecta,$alterar);
        if(!$operacao_alterar){
            die("Erro na alteração");
        } else {
            header("location: listagem.php");
        }
        
    }
    //consulta a tabela de transportadoras
    $tr = "SELECT * ";
    $tr.= "FROM transportadoras ";
    if(isset($_GET["codigo"])){
        $id = $_GET["codigo"];
        $tr.= "WHERE transportadoraID = {$id} ";
    } else{
        $tr.= "WHERE transportadoraID = 1 ";
    }
        $con_transportadora = mysqli_query($conecta,$tr);
    if(!$con_transportadora){
        die("Erro na consulta");
    }
    $info_transportadoras = mysqli_fetch_assoc($con_transportadora);
    
    //consulta aos estados
    $estados = "SELECT * ";
    $estados.= "FROM estados ";
    $lista_estados = mysqli_query($conecta,$estados);

    if(!$lista_estados){
        die("Erro na consulta ao banco");
    }
    
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP INTEGRACAO</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/alteracao.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>
            <div id="janela_formulario">
                <form action="alteracao.php" method="post">
                    <h2>Alteração de Transportadoras</h2>
                    <label for="nometransportadora">Nome da transportadora</label>
                    <input type="text" name="nometransportadora" 
                    value="<?php echo utf8_encode($info_transportadoras["nometransportadora"])?>" id="nometransportadora">
                    
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" 
                    value="<?php echo utf8_encode($info_transportadoras["endereco"])?>" id="endereco">
                    
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" value="<?php echo utf8_encode($info_transportadoras["cidade"])?>" id="cidade">
                    
                    <label for="estados">Estados</label>
                    <select id="estados" name="estados">
                        <?php
                            $meuestado = $info_transportadoras["estadoID"];
                            while ($linha = mysqli_fetch_assoc($lista_estados)){
                                $estado_principal = $linha["estadoID"];
                                if($meuestado == $estado_principal ){
                        ?>
                        <option value="<?php echo $linha["estadoID"]?>" selected>
                        <?php echo utf8_encode($linha["nome"])?>
                        </option>
                        
                        <?php 
                            } else {
                        ?>
                        <option value="<?php echo $linha["estadoID"]?>">
                        <?php echo utf8_encode($linha["nome"])?>
                        </option>
                        <?php 
                                }
                            }
                        
                        ?>
                        
                    </select>
                    
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" value="<?php echo $info_transportadoras["cep"]?>" id="cep">
                    
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" value="<?php echo $info_transportadoras["telefone"]?>" id="telefone">
                    
                    <label for="cnpj">CNPJ</label>
                    <input type="text" name="cnpj" value="<?php echo $info_transportadoras["cnpj"]?>" id="cnpj">
                    
                    <input type="hidden" name="transportadoraID" 
                        value="<?php echo $info_transportadoras["transportadoraID"]?>">
                    
                    <input type="submit" value="Confirmar alteração">
                
                
                
                </form>
            </div>
            
        </main>

        <?php include_once("_incluir/rodape.php"); ?>  
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>