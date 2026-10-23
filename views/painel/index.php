
<?php require dirname(__DIR__) . '/partials/topo.php'; ?>

    <!-- 3 - TÍTULO -->
    <h1 class="mb-4">Estoque da Cantina</h1>


    <!-- 4 - TABELA DO ESTOQUE -->
    <table class="table table-bordered table-striped">

        <thead class="table-dark">
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Mínimo</th>
                <th>Preço</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

        <?php

        // 5 - LAÇO PARA MOSTRAR TODOS OS PRODUTOS
        foreach ($produtos as $produto) {
            // 6 - PEGA A QUANTIDADE E O MÍNIMO DO PRODUTO
            $qtd = $produto['quantidade'];
            $min = $produto['minimo'];
        ?>

            <tr>

                <td>
                    <?php echo $produto['nome']; ?>
                </td>

                <td>
                    <?php echo $qtd; ?>
                </td>

                <td>
                    <?php echo $min; ?>
                </td>

                <td>
                    R$ <?php echo $produto['preco']; ?>
                </td>

                <td>

                    <?php

                    // 7 - VERIFICA SE ESTÁ ACABANDO
                    if ($qtd <= $min) {

                        if ($qtd == 0) {
                            echo '<span class="badge bg-danger">em falta</span>';
                        } else {
                            echo '<span class="badge bg-danger">acabando</span>';
                        }

                    }

                    ?>

                </td>

            </tr>

        <?php
        }
        ?>

        </tbody>

    </table>

    <!-- 8 - FORMULÁRIO DE MOVIMENTAÇÃO -->
    <h2 class="mt-5">Registrar movimentação</h2>

    <form action="recebe.php" method="POST">

        <!-- 9 - ESCOLHA DO PRODUTO -->
        <div class="mb-3">

            <label class="form-label">Produto</label>

            <select name="produto" class="form-select" required>

                <?php

                // 10 - O LAÇO MONTA A LISTA DE PRODUTOS
                foreach ($produtos as $produto) {
                    echo '<option value="' . $produto['id'] . '">';
                    echo $produto['nome'];
                    echo '</option>';
                }

                ?>

            </select>

        </div>


        <!-- 11 - QUANTIDADE -->
        <div class="mb-3">

            <label class="form-label">Quantidade</label>

            <input
                type="number"
                name="quantidade"
                class="form-control"
                min="1"
            >

        </div>


        <!-- 12 - ENTRADA OU SAÍDA -->
        <div class="mb-3">

            <label class="form-label">Movimentação</label>

            <div>

                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="tipo"
                        value="entrada"
                        id="entrada"
                        required
                    >

                    <label class="form-check-label" for="entrada">
                        Entrada
                    </label>
                </div>


                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="tipo"
                        value="saida"
                        id="saida"
                    >

                    <label class="form-check-label" for="saida">
                        Saída
                    </label>
                </div>

            </div>

        </div>


        <!-- 13 - BOTÃO -->
        <button type="submit" class="btn btn-primary">
            Registrar
        </button>

    </form>


    <!-- 14 - CONTAGEM DE PRODUTOS ACABANDO -->

    <?php
    $quantosAcabando = 0;
    $totalProdutos = count($produtos);

    foreach ($produtos as $produto) {
        if ($produto['quantidade'] <= $produto['minimo']) {
            $quantosAcabando++;
        }
    }

    ?>

    <p class="mt-4">
        <?php echo $quantosAcabando; ?>
        de
        <?php echo $totalProdutos; ?>
        produtos no mínimo ou abaixo.
    </p>


    <!-- 15 - LISTA DE COMPRAS -->

    <h3>Lista de compras</h3>

    <ul>

        <?php

        foreach ($produtos as $produto) {
            $qtd = $produto['quantidade'];
            $min = $produto['minimo'];

            if ($qtd <= $min) {

                $falta = $min - $qtd;

                if ($falta > 0) {

                    echo "<li>";
                    echo $produto['nome'] . ": faltam " . $falta;
                    echo "</li>";

                } else {

                    echo "<li>";
                    echo $produto['nome'] . ": está no mínimo";
                    echo "</li>";

                }

            }

        }

        ?>

    </ul>


    <!-- 16 - VALOR TOTAL DO ESTOQUE -->

    <?php

    $valorTotal = 0;

    foreach ($produtos as $produto) {

        $valorProduto = $produto['quantidade'] * $produto['preco'];

        $valorTotal += $valorProduto;

    }

    ?>

    <p>
        <strong>
            Valor total do estoque:
        </strong>

        R$ <?php echo $valorTotal; ?>
    </p>


<?php require dirname(__DIR__) . '/partials/rodape.php'; ?>
