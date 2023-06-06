<?php
namespace Teste\Unitario;

use \Teste\Teste;
use \Modelo\Role;
use \Framework\DW3BancoDeDados;

class TesteRoles extends Teste
{
    public function testeInserir()
    {
        
        $role = new Role(
            'teste',
            'descricao',
            null,
            4,
            'Dia',
            1,
            1
        );
        $role->salvar();
        $query = DW3BancoDeDados::query("SELECT count(*)  as quantidade FROM role WHERE id = " . $role->getId());
        $bdCidade = $query->fetch();
        $this->verificar($bdCidade['quantidade'] == 1);
    }


}
