<?php
    function enviarMensagem($dados){
       //Dados do fomulário
        $nome_usuario     = $dados['nome'];
        $email_usuario    = $dados['email'];
        $mensagem_usuario = $dados['mensagem'];
        
        //Criar variáveis de envio
        $destino   = "suporte@imediabrasil.com.br";
        $remetente = "imediabrasil@imediabrasil.com.br";
        $assunto   = "Mensagem do site";
        //Montar o corpo da mensagem
        $mensagem  = "O usuário ". $nome_usuario . "enviou uma mensagem." . "</br>";
        $mensagem .= "Email do usuário: " . $email_usuario . "</br>";
        $mensagem .= "Mensagem: " . "</br>";
        $mensagem .= $mensagem_usuario;
        return mail($destino, $assunto, $mensagem, $remetente);
    }
?>  