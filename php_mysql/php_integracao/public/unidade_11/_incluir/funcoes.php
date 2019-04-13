  <?php

        function mostrarAvisoPublicacao($numero){
            $array_erro = array(
            UPLOAD_ERR_OK => "Sem erro.",
            UPLOAD_ERR_INI_SIZE => "O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.",
            UPLOAD_ERR_FORM_SIZE => "O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML",
            UPLOAD_ERR_PARTIAL => "O upload do arquivo foi feito parcialmente.",
            UPLOAD_ERR_NO_FILE => "Nenhum arquivo foi enviado.",
            UPLOAD_ERR_NO_TMP_DIR => "Pasta temporária ausente.",
            UPLOAD_ERR_CANT_WRITE => "Falha em escrever o arquivo em disco.",
            UPLOAD_ERR_EXTENSION => "Uma extensão do PHP interrompeu o upload do arquivo."
    ); 
            return $array_erro[$numero];
        }
        function publicarArquivo($imagem){
            $arquivo_temporario = $imagem['tmp_name'];
            $arquivo = basename($imagem['name']);
            $diretorio = "uploads";
            if (move_uploaded_file($arquivo_temporario,$diretorio."/".$arquivo))
            { $mensagem = "Arquivo publicado";

            } else { 
            $mensagem = mostrarAvisoPublicacao($imagem['error']);}
            return $mensagem;
         }
?>