<?php
    include('conexao.php');

    $resposta_conta_paga=$_GET['opcao'];

    $sql="SELECT * FROM contas where id_contas='$resposta_conta_paga' ";

    $resultado= mysqli_query($conexao, $sql) or die ("Erro ao tentar cadastrar registro");
        while ($registro = mysqli_fetch_array ($resultado)){
            $id_contas=$registro['id_contas'];
            $tipo_de_conta=$registro['tipo_de_conta'];
        }
            

    


    echo"
    <html>
        <head>

        <script>
            if (confirm ('Marcar conta como paga??')==true){

                window.location.href='conta_paga.php?conta_paga=$resposta_conta_paga&modalidade=$tipo_de_conta';
            }
            else{
                window. history. back();
            }
            
        </script>
        </head>
    </html>";
?>