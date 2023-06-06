<?php

namespace Teste\Funcional;

use \Teste\Teste;
use \Framework\DW3BancoDeDados;

class TesteLogin extends Teste
{
    public function testeLogin()
    {
        $logar = $this->post(URL_RAIZ . 'login', [
            'email' => 'teste@teste.com',
            'senha' => '123',
        ]);

        $this->verificarRedirecionar($logar, URL_RAIZ . 'roles');
    }

    public function testeLoginGet()
    {
        $logar = $this->get(URL_RAIZ . 'login');

        $this->verificarContem($logar, 'Login');
    }

    public function testeLoginDelete()
    {
        $logar = $this->post(URL_RAIZ . 'login', [
            'email' => 'teste@teste.com',
            'senha' => '123',
        ]);

        $this->verificarRedirecionar($logar, URL_RAIZ . 'roles');

        $delete = $this->delete(URL_RAIZ . 'login');

        $this->verificarRedirecionar($delete, URL_RAIZ . 'login');
    }
}
