<?php
include("conexao.php");

$resposta = $_GET['conta_paga'];

$tipo_de_conta = $_GET['modalidade'];

date_default_timezone_set('America/Sao_Paulo');
$datalocal = date('Y/m/d H:i:s');

$comando_pagar_conta = "UPDATE contas SET status_pagamento='pago',data_recebimento='$datalocal' WHERE id_contas=$resposta";
$resultado = mysqli_query($conexao, $comando_pagar_conta);

if ($resultado == false) {
  echo "falhou";
} else {
  if ($tipo_de_conta == 'receita') {
    header("Refresh: 0; url='index.php'");
  }
  if ($tipo_de_conta == 'despesa_variavel') {
    header("Refresh: 0; url='despesav.php'");
  }
  if ($tipo_de_conta == 'despesa_fixa') {
    header("Refresh: 0; url='despesaf.php'");
  }
}


mysqli_close($conexao);
