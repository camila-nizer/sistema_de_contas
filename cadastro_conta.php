<?php
	if(isset($_POST ['vazio'])&& !empty($_POST['vazio'])){

        include("conexao.php");
    	
        $id_cliente_fk=$_POST['id_cliente'];
        $descricao=$_POST ['descricao'];
        $vencimento=$_POST['vencimento'];
        $valor=$_POST['valor'];
        $forma_pagamento=$_POST['forma_pagamento'];
        $status_pagamento='Pendente';
        $tipo_de_conta=$_POST['tipo_de_conta'];
        $status_conta='ativo';


    	

        $sql="INSERT INTO contas (id_cliente_fk, descricao, vencimento, valor, forma_pagamento, status_pagamento, tipo_de_conta,status_conta) 
                VALUES ('$id_cliente_fk', '$descricao', '$vencimento', '$valor', '$forma_pagamento','$status_pagamento','$tipo_de_conta','$status_conta')";


        if(mysqli_query($conexao, $sql)){
            $href = 'despesaf.php';
            if($tipo_de_conta=='receita'){
                $href = 'index.php';
            }
            if($tipo_de_conta=='despesa_variavel'){
                $href = 'despesav.php';
            }

            echo "<html> <head></head><body>
                <script> alert('Cadastro realizado com sucesso!'); location.href='$href';</script>
                </body>
                </html>";

        }
        else{
            echo "Erro".mysqli_connect_error($conexao);
        }
        mysqli_close($conexao);
    }
?>