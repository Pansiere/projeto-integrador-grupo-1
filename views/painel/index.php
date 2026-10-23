<?php require dirname(__DIR__) . '/partials/topo.php'; ?>

<style>
/* FUNDO DA PÁGINA */
body {
    background: linear-gradient(135deg, #ffd6ec, #ffb6d9, #f783c1);
    min-height: 100vh;
    font-family: "Segoe UI", Arial, sans-serif;
    color: #4a1234;
    position: relative;
    overflow-x: hidden;
}

body::before {
    content: "";
    position: fixed;
    width: 350px;
    height: 350px;
    background: rgba(255, 255, 255, 0.25);
    border-radius: 50%;
    top: -120px;
    left: -100px;
    z-index: -1;
    pointer-events: none;
}

body::after {
    content: "";
    position: fixed;
    width: 300px;
    height: 300px;
    background: rgba(255, 20, 147, 0.12);
    border-radius: 50%;
    bottom: -100px;
    right: -80px;
    z-index: -1;
    pointer-events: none;
}

/* CARTÃO PRINCIPAL */
.container {
    background: rgba(255, 255, 255, 0.92);
    border-radius: 25px;
    padding: 40px !important;
    margin-top: 35px;
    margin-bottom: 50px;
    box-shadow: 0 15px 45px rgba(112, 18, 74, 0.25);
    border: 2px solid rgba(255, 255, 255, 0.8);
}

/* TÍTULOS */
h1 {
    text-align: center;
    color: #d41475;
    font-size: 2.8rem;
    font-weight: 800;
    margin-bottom: 35px !important;
    text-shadow: 2px 2px 0 #ffd1e7;
}

h1::before {
    content: "🐾 ";
}

h1::after {
    content: " 💗";
}

h2 {
    color: #b20d61;
    font-weight: 700;
    border-left: 7px solid #f02b91;
    padding-left: 15px;
    margin-bottom: 25px;
}

h3 {
    color: #c4146e;
    font-weight: 700;
    margin-top: 35px;
}

/* TABELA DE ESTOQUE */
.table {
    border-radius: 15px;
    overflow: hidden;
    margin-top: 20px;
    box-shadow: 0 8px 20px rgba(145, 21, 91, 0.12);
    border-color: #f4bad6;
    margin-bottom: 30px;
}

.table thead {
    background: linear-gradient(90deg, #d41475, #f02b91) !important;
    color: white;
}

.table thead th {
    background: transparent !important;
    color: white !important;
    text-align: center;
    padding: 16px;
    border-color: #e45b9e;
}

.table tbody td {
    padding: 14px;
    vertical-align: middle;
    text-align: center;
    color: #54183d;
    font-weight: 500;
}

.table tbody tr:nth-child(even) {
    background-color: #fff0f8;
}

.table tbody tr:nth-child(odd) {
    background-color: #ffffff;
}

.table tbody tr {
    transition: 0.2s ease;
}

.table tbody tr:hover > * {
    background-color: #ffd6eb;
    color: #54183d;
}

/* STATUS DOS PRODUTOS */
.badge {
    padding: 8px 13px;
    border-radius: 20px;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.badge.bg-danger {
    background: linear-gradient(90deg, #e91e63, #ff4081) !important;
    box-shadow: 0 3px 8px rgba(233, 30, 99, 0.25);
}

/* FORMULÁRIO */
form {
    background: linear-gradient(145deg, #fff1f8, #ffe0ef);
    padding: 30px;
    border-radius: 20px;
    border: 2px solid #ffc1df;
    box-shadow: 0 8px 25px rgba(179, 22, 101, 0.12);
}

.form-label {
    color: #85104d;
    font-weight: 700;
}

.form-select,
.form-control {
    border: 2px solid #f2a5ca;
    border-radius: 12px;
    padding: 12px 15px;
    color: #54183d;
    background-color: #fff;
    transition: 0.2s ease;
}

.form-select:focus,
.form-control:focus {
    border-color: #e91e8f;
    box-shadow: 0 0 0 0.25rem rgba(233, 30, 143, 0.15);
}

.form-check {
    margin-bottom: 8px;
}

.form-check-input {
    border: 2px solid #df5595;
}

.form-check-input:checked {
    background-color: #d41475;
    border-color: #d41475;
}

.form-check-label {
    color: #5c1942;
    font-weight: 600;
}

/* BOTÃO */
.btn-primary {
    background: linear-gradient(90deg, #d41475, #f02b91);
    border: none;
    border-radius: 30px;
    padding: 12px 30px;
    font-weight: 700;
    font-size: 1rem;
    box-shadow: 0 6px 15px rgba(212, 20, 117, 0.3);
    transition: all 0.25s ease;
}

.btn-primary:hover {
    background: linear-gradient(90deg, #b20d61, #dc147d);
    transform: translateY(-3px);
    box-shadow: 0 9px 20px rgba(212, 20, 117, 0.4);
}

/* RESUMOS */
.container > p {
    background: #fff0f8;
    border-left: 6px solid #e91e8f;
    border-radius: 10px;
    padding: 15px 20px;
    color: #661642;
    font-weight: 600;
}

p strong {
    color: #a80f5d;
}

/* LISTA DE COMPRAS */
ul {
    list-style: none;
    padding: 0;
}

ul li {
    background: linear-gradient(90deg, #fff0f8, #ffe1ef);
    border: 1px solid #ffc1df;
    border-radius: 12px;
    margin-bottom: 10px;
    padding: 12px 18px;
    color: #661642;
    font-weight: 600;
    transition: 0.2s ease;
}

ul li::before {
    content: "🛍️ ";
}

ul li:hover {
    transform: translateX(5px);
    background: #ffd4e9;
}

/* CELULAR */
@media (max-width: 768px) {
    .container {
        padding: 22px !important;
        margin-top: 20px !important;
    }

    h1 {
        font-size: 2rem;
    }

    h2 {
        font-size: 1.5rem;
    }

    .table {
        font-size: 0.85rem;
    }

    .table thead th,
    .table tbody td {
        padding: 8px 5px;
    }

    form {
        padding: 20px;
    }
}
</style>

<div class="container">

    <!-- TÍTULO -->
    <h1 class="mb-4">Estoque da Cantina</h1>

    <!-- TABELA DO ESTOQUE -->
    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Mínimo</th>
                <th>Preço</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($produtos as $produto):
            $qtd = $produto['quantidade'];
            $min = $produto['minimo'];
        ?>
            <tr>
                <td>
                    <?php echo htmlspecialchars($produto['nome']); ?>
                </td>

                <td><?php echo $qtd; ?></td>

                <td><?php echo $min; ?></td>

                <td>
                    R$ <?php echo number_format(
                        (float) $produto['preco'],
                        2,
                        ',',
                        '.'
                    ); ?>
                </td>

                <td>
                    <?php
                    if ($qtd <= $min) {
                        if ($qtd == 0) {
                            echo '<span class="badge bg-danger">Em falta</span>';
                        } else {
                            echo '<span class="badge bg-danger">Acabando</span>';
                        }
                    } else {
                        echo '<span class="badge text-bg-success">Disponível</span>';
                    }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>

    </table>

    <!-- FORMULÁRIO DE MOVIMENTAÇÃO -->
    <h2 class="mt-5">Registrar movimentação</h2>

    <form action="recebe.php" method="POST">

        <div class="mb-3">
            <label class="form-label" for="produto">Produto</label>

            <select name="produto" id="produto" class="form-select" required>
                <?php foreach ($produtos as $produto): ?>
                    <option value="<?php echo $produto['id']; ?>">
                        <?php echo htmlspecialchars($produto['nome']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label" for="quantidade">Quantidade</label>

            <input
                type="number"
                name="quantidade"
                id="quantidade"
                class="form-control"
                min="1"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Movimentação</label>

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

        <button type="submit" class="btn btn-primary">
            Registrar
        </button>

    </form>

    <!-- CONTAGEM DE PRODUTOS NO MÍNIMO OU ABAIXO -->
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

    <!-- LISTA DE COMPRAS -->
    <h3>Lista de compras</h3>

    <ul>
        <?php foreach ($produtos as $produto):
            $qtd = $produto['quantidade'];
            $min = $produto['minimo'];

            if ($qtd <= $min):
                $falta = $min - $qtd;
        ?>
            <li>
                <?php
                echo htmlspecialchars($produto['nome']) . ': ';

                if ($falta > 0) {
                    echo 'faltam ' . $falta;
                } else {
                    echo 'está no mínimo';
                }
                ?>
            </li>
        <?php
            endif;
        endforeach;
        ?>
    </ul>

    <!-- VALOR TOTAL DO ESTOQUE -->
    <?php
    $valorTotal = 0;

    foreach ($produtos as $produto) {
        $valorTotal +=
            $produto['quantidade'] * $produto['preco'];
    }
    ?>

    <p>
        <strong>Valor total do estoque:</strong>
        R$ <?php echo number_format($valorTotal, 2, ',', '.'); ?>
    </p>

</div>

<?php require dirname(__DIR__) . '/partials/rodape.php'; ?>