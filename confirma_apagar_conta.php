<?php
    include('conexao.php');

    $resposta_apagar=$_GET['opcao'];


    $sql="SELECT * FROM contas where id_contas='$resposta_apagar'";

    $resultado= mysqli_query($conexao, $sql) or die ("Erro ao tentar cadastrar registro");
        while ($registro = mysqli_fetch_array ($resultado)){
            $id_contas=$registro['id_contas'];
            $tipo_de_conta=$registro['tipo_de_conta'];
        }

    echo"
    <html>
        <head>

        <script>
            if (confirm ('Tem certeza que deseja excluir?')==true){

                window.location.href='apagar_conta.php?apagar=$resposta_apagar&modalidade=$tipo_de_conta';
            }
            else{
                window. history. back();
            }
            
        </script>
        </head>
    </html>";

?>