<?php

namespace App\Support\Models;

class PedidoStatusModel
{

    public int $pedidoStatusId;
    public string $descricao;
    public string $winthorCodigo;

    public function __construct(int $pedidoStatusId, string $descricao, string $winthorCodigo)
    {
        $this->pedidoStatusId = $pedidoStatusId;
        $this->descricao = $descricao;
        $this->winthorCodigo = $winthorCodigo;
    }
}
