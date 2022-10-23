<?php

    $resposta_apagar=$_GET['opcao'];

    echo"
    <html>
        <head>

        <script>
            if (confirm ('Tem certeza que deseja excluir?')==true){

                window.location.href='apagar_cliente.php?apagar=$resposta_apagar';
            }
            else{
                window. history. back();
            }
            
        </script>
        </head>
    </html>";
?>