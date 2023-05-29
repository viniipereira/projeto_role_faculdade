<?php
namespace Teste\Funcional;

use \Teste\Teste;
use \Framework\DW3BancoDeDados;

class TesteUsuario extends Teste
{
    public function testeLogin()
    {
        $logar = $this->post(URL_RAIZ . 'login', [
            'email' => 'teste@teste.com',
            'senha' => '123',
        ]);

        $this->verificarRedirecionar($logar, URL_RAIZ . 'roles');

    }
}
