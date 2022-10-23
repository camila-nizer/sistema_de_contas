<!DOCTYPE html>
<html lang="pt-br">
   <head>
      
      <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Desafio Horacio- Empresa de contas</title>
      
   </head>
   <body>
      <?php
            include ('calcula_saldo.php');
            echo"<b>"."SALDO DISPONIVEL:  "."</b>";
            calcula_saldo();
      ?>
      <p> Cadastrar na conta</p>
      <hr/>
      <form action="cadastro_conta.php" method="POST">

      Cliente
      <select name='id_cliente'> 
         <?php
            include('conexao.php');

            $sql="SELECT * FROM cliente where status_cliente='ativo'";
            $resultado= mysqli_query($conexao, $sql) or die ("Erro ao tentar cadastrar registro");
            while ($registro = mysqli_fetch_array ($resultado)){
            $id_cliente=$registro['id_cliente'];
            $nome=$registro['nome'];
            $cpf_cnpj=$registro['cpf_cnpj'];
            echo "<option value='$id_cliente'> $nome </option>";
            }
            ?>
      </select>
         <br/>
         <label for="">Descrição </label>
         <input type="text" name="descricao" required>
         <br/>
         <label for="">Vencimento </label>
         <input type="date" name="vencimento" required>
         <br/>
         <label for="">Valor </label>
         <input type="number" name="valor" required>
         <br/>
         <label for="">Forma de Pagamento </label>
         <input type="radio" name="forma_pagamento" value="pix/ted/doc"> PIX/TED/DOC
         <input type="radio" name="forma_pagamento" value="boleto">Boleto
         <br/>
         <input type="radio" name="tipo_de_conta" value="receita"> Receita
         <input type="radio" name="tipo_de_conta" value="despesa_fixa">Despesa Fixa
         <input type="radio" name="tipo_de_conta" value="despesa_variavel">Despesa Variável
         <br/>
         <input type='submit' name= 'vazio' value='Cadastrar'>
      </form>
      <?php
         echo "<a href='lista_clientes.php'><button>Exibir clientes cadastrados</button></a>";
         echo "<br/>";
         echo "<a href='lista_contas_receita.php'><button>Exibir contas RECEITA</button></a>";
         echo "<br/>";
         echo "<a href='lista_contas_despesa_fixa.php'><button>Exibir contas Despesa fixa</button></a>";
         echo "<br/>";
         echo "<a href='lista_contas_despesa_variavel.php'><button>Exibir contas Despesa variavel</button></a>";
         echo "<br/>";
         echo "<a href='index.php'><button>Index</button></a>";
      ?>
   </body>
</html>