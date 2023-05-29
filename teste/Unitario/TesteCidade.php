<?php
namespace Teste\Unitario;

use \Teste\Teste;
use \Modelo\Cidade;
use \Framework\DW3BancoDeDados;

class TesteCidade extends Teste
{
    public function testeInserir()
    {
        $cidade = new Cidade('Guarapuava','PR');
        $cidade->salvar();
        $query = DW3BancoDeDados::query("SELECT count(*)  as quantidade FROM cidade WHERE id = " . $cidade->getId());
        $bdCidade = $query->fetch();
        $this->verificar($bdCidade['quantidade'] == 1);
    }
}
