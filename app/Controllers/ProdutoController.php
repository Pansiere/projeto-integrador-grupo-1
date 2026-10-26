<?php

namespace App\Controllers;

use App\View;
use App\Banco;

class ProdutoController
{
    public function salvar(): void
    {
        // TODO: implementar a lógica para salvar evitar dar baixa no estoque do produto quando 
        $pdo = Banco::conectar();
        
        $produto_id = $_POST['produto_id'];
        $tipo = $_POST['tipo'];
        $quantidade = $_POST['quantidade'];

        $stmt = $pdo->prepare("INSERT INTO movimentacoes (produto_id, tipo, quantidade, data) VALUES (:produto_id, :tipo, :quantidade, :data)");
        $stmt->execute([
            ':produto_id' => $produto_id,
            ':tipo' => $tipo,
            ':quantidade' => $quantidade,
            ':data' => date('Y-m-d H:i:s'),
        ]);

        if ($tipo === 'entrada') {
            $stmt = $pdo->prepare("UPDATE produtos SET quantidade = quantidade + :quantidade WHERE id = :produto_id");
        } else {
            $stmt = $pdo->prepare("UPDATE produtos SET quantidade = quantidade - :quantidade WHERE id = :produto_id");
        }

        $stmt->execute([
            ':quantidade' => $quantidade,
            ':produto_id' => $produto_id,
        ]);

        header('Location: /');
        exit;   
    }

    public function novoProduto(): void
    {
        $pdo = Banco::conectar();

        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];
        $minimo = $_POST['minimo'];
        $preco = $_POST['preco'];

        $stmt = $pdo->prepare("INSERT INTO produtos (nome, quantidade, minimo, preco) VALUES (:nome, :quantidade, :minimo, :preco)");
        $stmt->execute([
            ':nome' => $nome,
            ':quantidade' => $quantidade,
            ':minimo' => $minimo,
            ':preco' => $preco,
        ]); 

        header('Location: /');
        exit;
    }
}
