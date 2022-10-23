<?php
	include("conexao.php");

    $resposta=$_GET['apagar'];

    date_default_timezone_set('America/Sao_Paulo');
    $datalocal = date('Y/m/d H:i:s');

    $comandodeletar= "UPDATE cliente SET status_cliente='inativo', exclusao_cliente='$datalocal' WHERE id_cliente=$resposta";
    $resultado= mysqli_query($conexao, $comandodeletar);

    if($resultado==false){
        echo"falhou";

    }
    else{
        header("Refresh: 0; url=clientes.php");
    }


    mysqli_close($conexao);
?>