<?php

namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Relatorio;

class RelatorioGeralControlador extends Controlador
{
    public function index()
    {
        $this->verificarLogado();
        $relatorioGeral = Relatorio::relatorio();

        $this->visao('relatorio/relatorio.php', [
            'relatorio' => $relatorioGeral
        ]);
    }
}
