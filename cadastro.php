<?php
	if(isset($_POST ['vazio'])&& !empty($_POST['vazio'])){

    include("conexao.php");
	
    $nome=$_POST['nome'];
    $cpf_cnpj=$_POST ['cpf_cnpj'];
    $cep=$_POST['cep'];
    $rua=$_POST['rua'];
    $bairro=$_POST['bairro'];
    $cidade=$_POST['cidade'];
    $rua=$_POST['rua'];
    $numero_casa=$_POST['numero_casa'];
    $estado=$_POST['estado'];
    $telefone=$_POST['telefone'];
    $celular=$_POST['celular'];
    $email=$_POST['email'];
    $banco=$_POST['banco'];
    $agencia=$_POST['agencia'];
    $conta=$_POST['conta'];
    $tipo_conta=$_POST['tipo_conta'];
    $status_cliente='ativo';

	
    $validador="SELECT * FROM cliente where cpf_cnpj='$cpf_cnpj' && status_cliente='ativo' ";
    $resposta_validador=mysqli_query($conexao, $validador) or die ("Erro");
    $array_resposta_validador= mysqli_fetch_array($resposta_validador);

    
    if(($array_resposta_validador)!= null && count($array_resposta_validador)>0){
        echo "<script> alert('Erro: CPF/CNPJ já cadastrado');location.href='index.php';</script>";

    }

    else{
        $sql="INSERT INTO cliente (nome, cpf_cnpj, cep, rua,numero_casa,bairro,cidade,estado,telefone, celular, email, banco, agencia, conta, tipo_conta, status_cliente) 
            VALUES ('$nome', '$cpf_cnpj', '$cep','$rua','$numero_casa','$bairro','$cidade','$estado', '$telefone' ,'$celular', '$email','$banco', '$agencia' , '$conta', '$tipo_conta','$status_cliente')";

        if(mysqli_query($conexao, $sql)){
            echo "<html> <head></head><body>
                <script> alert('Cliente cadastrado com sucesso!'); location.href='clientes.php';</script>
                </body>
                </html>";

        }
        else{
            echo "Erro".mysqli_connect_error($conexao);
        }
    }

    
    mysqli_close($conexao);
    }
    else{
        echo"Acesso negado.";
    }

?>
