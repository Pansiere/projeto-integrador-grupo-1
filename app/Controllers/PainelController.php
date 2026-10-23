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

        View::render('painel/index', [
            'titulo' => 'Painel',
            'produtos' => $produtos,
        ]);
    }
}
