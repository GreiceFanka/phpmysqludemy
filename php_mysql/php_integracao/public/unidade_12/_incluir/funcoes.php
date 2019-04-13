<?php
    function gerarCodigoUnico() {
    $alfabeto  = "23456789ABCDEFGHIJKMNPQRS";
    $tamanho   = 12;
    $letra     = "";
    $resultado = "";

    for($i=1; $i<$tamanho; $i++){
        $letra     = substr($alfabeto, rand(0,23),1);
        $resultado.= $letra;
    }
  
    date_default_timezone_set('Europe/Warsaw');
    $agora = getdate();
    
    $codigo_data = $agora['year']. "_" .$agora['yday'];
    $codigo_data.= $agora['hours'] . $agora['minutes'] . $agora['seconds'];
    return "foto_" . $codigo_data . "_" . $resultado;
    }

    function getExtensao($nome) {
        return strrchr($nome,".");
    }

    function publicarImagem($imagem) {
        $arquivo_temporario = $imagem['tmp_name'];
        $nome_original      = $imagem['name'];
        $nome_novo          = gerarCodigoUnico() . getExtensao($nome_original);
        $nome_completo      = "images/product_images/" . $nome_novo;
        
        if(move_uploaded_file($arquivo_temporario, $nome_completo)) {
            return array("Imagem publicada com sucesso",$nome_completo);   
        } else {
            return array(retornarErro($imagem['error']),"");            
        }        
    }

    function retornarErro($numero_erro) {
        $array_erro = array(
            UPLOAD_ERR_OK =>            "Sem erro.",
            UPLOAD_ERR_INI_SIZE =>      "O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.",
            UPLOAD_ERR_FORM_SIZE =>     "O arquivo excede o limite máximo de 600Kb.",
            UPLOAD_ERR_PARTIAL =>       "O upload do arquivo foi feito parcialmente.",
            UPLOAD_ERR_NO_FILE =>       "Nenhum arquivo foi enviado.",
            UPLOAD_ERR_NO_TMP_DIR =>    "Pasta temporária ausente.",
            UPLOAD_ERR_CANT_WRITE =>    "Falha em escrever o arquivo em disco.",
            UPLOAD_ERR_EXTENSION =>     "Uma extensão do PHP interrompeu o upload do arquivo."
        ); 
        
        return $array_erro[$numero_erro];
    }
?>