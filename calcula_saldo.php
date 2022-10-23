<?php

	function calcula_saldo(){
		include('conexao.php');
		$sql="SELECT * FROM contas where status_conta='ativo' && status_pagamento='pago'";
		$resultado= mysqli_query($conexao, $sql) or die ("Erro ao tentar acessar registro");
		$saldo=0;
		while($registro = mysqli_fetch_array($resultado)){
			$tipo_de_conta=$registro ['tipo_de_conta'];
			$valor=$registro['valor'];
	
			if ($tipo_de_conta=='receita'){
				$saldo=$saldo+$valor;
			}

			if ($tipo_de_conta=='despesa_fixa'){
				$saldo=$saldo-$valor;

			}

			if ($tipo_de_conta=='despesa_variavel'){
				$saldo=$saldo-$valor;

			}


		}
		echo $saldo;
	}



	function calcula_despesa_pendente(){
		include('conexao.php');
		$sql="SELECT * FROM contas where status_conta='ativo' && status_pagamento='pendente'";
		$resultado= mysqli_query($conexao, $sql) or die ("Erro ao tentar acessar registro");
		$saldo_a_pagar=0;
		while($registro = mysqli_fetch_array($resultado)){
			$tipo_de_conta=$registro ['tipo_de_conta'];
			$valor=$registro['valor'];
	
			if ($tipo_de_conta=='despesa_fixa'){
				$saldo_a_pagar=$saldo_a_pagar-$valor;

			}

			if ($tipo_de_conta=='despesa_variavel'){
				$saldo_a_pagar=$saldo_a_pagar-$valor;

			}


		}
		echo $saldo_a_pagar;
	}

	function calcula_receita_pendente(){
		include('conexao.php');
		$sql="SELECT * FROM contas where status_conta='ativo' && status_pagamento='pendente'";
		$resultado= mysqli_query($conexao, $sql) or die ("Erro ao tentar acessar registro");
		$saldo_a_receber=0;
		while($registro = mysqli_fetch_array($resultado)){
			$tipo_de_conta=$registro ['tipo_de_conta'];
			$valor=$registro['valor'];
	
			if ($tipo_de_conta=='receita'){
				$saldo_a_receber=$saldo_a_receber+$valor;
			}
		}
		echo $saldo_a_receber;
	}
