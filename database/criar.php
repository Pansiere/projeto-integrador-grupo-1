<?php

$pdo = new PDO('sqlite:' . __DIR__ . '/db.sqlite');

$comandos = [
    "DROP TABLE IF EXISTS produtos;",
    "CREATE TABLE produtos (
        id INTEGER PRIMARY KEY,
        nome TEXT NOT NULL,
        preco REAL NOT NULL,
        quantidade INTEGER NOT NULL,
        minimo INTEGER NOT NULL
    );",
    "INSERT INTO produtos (nome, preco, quantidade, minimo) VALUES ('Bolo', 4.00, 60, 5);",
    "INSERT INTO produtos (nome, preco, quantidade, minimo) VALUES ('Refrigerante', 8.00, 8, 5);",
    "INSERT INTO produtos (nome, preco, quantidade, minimo) VALUES ('Suco', 5.00, 25, 5);",
    "INSERT INTO produtos (nome, preco, quantidade, minimo) VALUES ('Bala', 3.00, 100, 5);",
    "DROP TABLE IF EXISTS movimentacoes;",
    "CREATE TABLE movimentacoes (
        id INTEGER PRIMARY KEY,
        produto_id NOT NULL REFERENCES produtos(id),
        tipo TEXT NOT NULL,
        quantidade INTEGER NOT NULL,
        data TEXT NOT NULL
    );",
    "INSERT INTO movimentacoes (produto_id, tipo, quantidade, data) VALUES (1, 'Sobremesa', 60, '2026/08/20');",
    "INSERT INTO movimentacoes (produto_id, tipo, quantidade, data) VALUES (2, 'Bebida', 8, '2026/08/20'); ",
    "INSERT INTO movimentacoes (produto_id, tipo, quantidade, data) VALUES (3, 'Bebida', 25, '2026/08/20');",
    "INSERT INTO movimentacoes (produto_id, tipo, quantidade, data) VALUES (4, 'Doce', 100, '2026/08/20');",
    "INSERT INTO movimentacoes (produto_id, tipo, quantidade, data) VALUES (2, 'saida', 30,'2026/08/20');",
    "UPDATE produtos SET quantidade = 6 WHERE id = 2;",
    "SELECT id, nome, quantidade FROM produtos WHERE id =2;"
];

foreach ($comandos as $comando) {
    $pdo->query($comando);
}

echo "Banco criado: database/db.sqlite\n";
