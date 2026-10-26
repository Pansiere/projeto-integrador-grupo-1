<?php

namespace App\Controllers;

use App\View;
use App\Banco;

class PainelController
{
    public function index(): void
    {
        $pdo = Banco::conectar();

        $consulta = $pdo->query('SELECT * FROM produtos');
        $produtos = $consulta->fetchAll();

        $movimentacoes = $pdo->query('SELECT movimentacoes.*, 
            produtos.nome FROM movimentacoes JOIN produtos ON movimentacoes.produto_id = produtos.id ORDER BY movimentacoes.id DESC');
        $movimentacoes = $movimentacoes->fetchAll();

        View::render('painel/index', [
            'titulo' => 'Painel',
            'produtos' => $produtos,
            'movimentacoes' => $movimentacoes
        ]);
    }
}
