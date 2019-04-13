<?php
//Passo 1-abrir conexão
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "mydata";
    $conecta = mysqli_connect($servidor,$usuario,$senha,$banco);

    //Passo 2 - Testar conexão
    if (mysqli_connect_errno()){
        die ("Conexão falhou! ".mysqli_connect_errno());
    }
?>