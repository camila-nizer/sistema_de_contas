<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Contas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="novo.css">
    <script>
        function limpa_formulário_cep() {
            document.getElementById('rua').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                document.getElementById('rua').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('uf').value = (conteudo.uf);

            } else {
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            var cep = valor.replace(/\D/g, '');

            if (cep != "") {

                var validacep = /^[0-9]{8}$/;

                if (validacep.test(cep)) {

                    document.getElementById('rua').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('uf').value = "...";

                    var script = document.createElement('script');

                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    document.body.appendChild(script);

                } else {

                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } else {
                limpa_formulário_cep();
            }
        };
    </script>

</head>

<body>
    <header>
        <div class="title">
            <i class="fa fa-bar-chart" style="font-size:20px; color:#fff; margin-right: 5px"></i>Sistema de Contas
        </div>
    </header>

    <div class="fora1">
        <div class="total">
            <div class="s1">
                <div class="s2">Saldo</div>
                <div class="valor">R$
                    <?php
                    include('calcula_saldo.php');
                    calcula_saldo();
                    ?>
                </div>
            </div>
        </div>
        <div class="total">
            <div class="s1">
                <div class="s2">A Receber</div>
                <div class="valor">R$
                    <?php
                    calcula_receita_pendente();
                    ?>
                </div>
            </div>
            <div class="s1">
                <div class="s2">Despesas</div>
                <div class="valor">R$
                    <?php
                    calcula_despesa_pendente();
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="fora2">
        <div class="registros">
            <div class="fora3">
                <form class="tipo" action="#" method="get">
                    <div class="nome" id="pag-ativa">
                        <?php
                        echo "<a href='index.php'>";
                        ?>
                        <input id="pag" name="pagina" type="button" value="Receita">

                        <?php
                        echo "</a>";
                        ?>
                    </div>
                    <div class="nome">
                        <?php
                        echo "<a href='despesaf.php'>";
                        ?>
                        <input id="pag" name="pagina" type="button" value="Despesa Fixa" />

                        <?php
                        echo "</a>";
                        ?>
                    </div>
                    <div class="nome">
                        <?php
                        echo "<a href='despesav.php'>";
                        ?>
                        <input id="pag" name="pagina" type="button" value="Despesa Variável" />

                        <?php
                        echo "</a>";
                        ?>
                    </div>
                    <div class="nome">
                        <?php
                        echo "<a href='clientes.php'>";
                        ?>
                        <input id="pag" name="pagina" type="button" value="Clientes" />

                        <?php
                        echo "</a>";
                        ?>
                    </div>
                </form>
            </div>

            <div class="fora4">
                <?php
                include("conexao.php");

                $sql = "SELECT * FROM contas INNER JOIN cliente on id_cliente_fk = id_cliente where status_conta='ativo' && tipo_de_conta='receita' ";

                $resultado = mysqli_query($conexao, $sql) or die("Erro ao tentar cadastrar registro");
                while ($registro = mysqli_fetch_array($resultado)) {
                    $id_contas = $registro['id_contas'];
                    $id_cliente = $registro['id_cliente'];
                    $nome = $registro['nome'];
                    $cpf_cnpj = $registro['cpf_cnpj'];
                    $descricao = $registro['descricao'];
                    $vencimento = $registro['vencimento'];
                    $data_recebimento = $registro['data_recebimento'];
                    $valor = $registro['valor'];
                    $forma_pagamento = $registro['forma_pagamento'];
                    $status_pagamento = $registro['status_pagamento'];
                    $tipo_de_conta = $registro['tipo_de_conta'];

                    $vencimento=date_create($vencimento);
                    $vencimento=date_format($vencimento,'d-m-Y');
                    
                    if($data_recebimento != '' && $data_recebimento != null){
                        
                        $data_recebimento=date_create($data_recebimento);
                        $data_recebimento=date_format($data_recebimento,'d-m-Y');

                    }
                    else{
                        $data_recebimento="--";
                    }

                    

                    echo "<div class='marg'><div class='fora5'><div class='expor'>";
                    echo  $nome;
                    echo  $cpf_cnpj;
                    echo  $descricao;
                    echo  $vencimento;
                    echo  $data_recebimento;
                    echo  $valor;
                    echo  $forma_pagamento;
                    echo  $status_pagamento;
                    echo  " <form action='confirma_conta_paga.php' method='GET'> <button><input type='hidden' name='opcao' value='$id_contas'/>PAGO</button></form>";
                    echo "<form action='confirma_apagar_conta.php' method='GET'> <button><input type='hidden' name='opcao' value='$id_contas'/>APAGAR REGISTRO</button></form>";
                    echo "</div> </div> </div>";
                }

                
                ?>
                <div class="marg">
                    <div class="fora5">
                        <div class="expor">
                            <!--Nome cliente / adsadasd / Descrição
                            / Vencimento / Recebimento / Valor / Forma de
                            pagamento / Status-->
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <div class="fora7">
        <div class="cadastro">
            <div class="cad">Cadastrar Cliente</div>
            <form action="cadastro.php" method="post">
                <div class="formcadastro">
                    <div class="centcadastro">
                        <div class="formc">
                            <div class="info"><label for="">Nome Completo:</label></div>
                            <div class="inputcadastro"><input type="text" name="nome"></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">CPF/CNPJ:</label></div>
                            <div class="inputcadastro"><input type="text" name="cpf_cnpj" pattern="[0-9]{11}|[0-9]{14}"></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">CEP:</label></div>
                            <div class="inputcadastro"><input name="cep" type="text" id="cep" value="" onblur="pesquisacep(this.value);"></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Rua:</label></div>
                            <div class="inputcadastro"><input type="text" name="rua" id="rua" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">N°:</label></div>
                            <div class="inputcadastro"><input type="text" name="numero_casa" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Bairro:</label></div>
                            <div class="inputcadastro"><input type="text" name="bairro" id="bairro" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Cidade:</label></div>
                            <div class="inputcadastro"><input type="text" name="cidade" id="cidade" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Estado:</label></div>
                            <div class="inputcadastro"><input type="text" name="estado" id="uf" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Telefone Fixo:</label></div>
                            <div class="inputcadastro"><input type="number" name="telefone" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Celular:</label></div>
                            <div class="inputcadastro"><input type="number" name="celular" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">E-mail:</label></div>
                            <div class="inputcadastro"><input type="email" name="email" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Banco:</label></div>
                            <div class="inputcadastro"><input type="text" name="banco" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Agência:</label></div>
                            <div class="inputcadastro"> <input type="number" name="agencia" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Conta:</label></div>
                            <div class="inputcadastro"><input type="number" name="conta" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Tipo de Conta:</label></div>
                            <div class="inputcadastro">
                                <select name="tipo_conta" required>
                                    <option value="poupança">Poupança</option>
                                    <option value="corrente">Corrente</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <input class="final" type="submit" name="vazio" value="Cadastrar">
            </form>
        </div>

        <div class="cadastro">
            <div class="cad">Novo Registro</div>
            <form action="cadastro_conta.php" method="post">
                <div class="formcadastro">
                    <div class="centcadastro">
                        <div class="formc">
                            <div class="info"><label for="">Cliente:</label></div>
                            <div class="inputcadastro">
                                <select name="id_cliente">
                                    <?php
                                    include('conexao.php');

                                    $sql = "SELECT * FROM cliente where status_cliente='ativo'";
                                    $resultado = mysqli_query($conexao, $sql) or die("Erro ao tentar cadastrar registro");
                                    while ($registro = mysqli_fetch_array($resultado)) {
                                        $id_cliente = $registro['id_cliente'];
                                        $nome = $registro['nome'];
                                        $cpf_cnpj = $registro['cpf_cnpj'];
                                        echo "<option value='$id_cliente'> $nome </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Descrição:</label></div>
                            <div class="inputcadastro"><input type="text" name="descricao" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Vencimento:</label></div>
                            <div class="inputcadastro"><input type="date" name="vencimento" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Valor:</label></div>
                            <div class="inputcadastro"><input type="number" step=".01" name="valor" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Forma de pagamento:</label></div>
                            <div class="inputcadastro">
                                <select name="forma_pagamento">
                                    <option value="pix/ted/doc">PIX/TED/DOC</option>
                                    <option value="boleto">Boleto</option>
                                    <option value="cartao_credito">Cartão de Crédito</option>
                                </select>
                            </div>
                        </div>

                        <div class="formc">
                            <div class="info"><label for="">Tipo de Registro:</label></div>
                            <div class="inputcadastro">
                                <select name="tipo_de_conta">
                                    <option value="receita">Receita</option>
                                    <option value="despesa_fixa">Despesa Fixa</option>
                                    <option value="despesa_variavel">Despesa Variável</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <input class="final" type="submit" name="vazio" value="Cadastrar"/>
            </form>
        </div>

    </div>

</body>

</html>