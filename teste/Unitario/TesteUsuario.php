<?php
namespace Teste\Unitario;

use \Teste\Teste;
use \Modelo\Usuario;
use \Framework\DW3BancoDeDados;

class TesteUsuario extends Teste
{
    public function testeInserir()
    {
        $usuario = new Usuario('email@teste.com','12345','Usuario teste');
        $usuario->salvar();
        $query = DW3BancoDeDados::query("SELECT count(*)  as quantidade FROM usuarios WHERE id = " . $usuario->getId());
        $bdUsuario = $query->fetch();
        $this->verificar($bdUsuario['quantidade'] == 1);
    }
}
