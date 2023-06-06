<?php

namespace Teste\Funcional;

use \Teste\Teste;
use \Framework\DW3BancoDeDados;

class TesteUsuarios extends Teste
{
    public function testeCriarUsuario()
    {
        $cadastro = $this->post(URL_RAIZ . 'usuarios/criar', [
            'email' => 'teste@teste.com',
            'senha' => '123',
            'nome' => 'TESTE'
        ]);

        $this->verificarContem($cadastro,'Usuário cadastrado com sucesso.');
    }

    public function testeUsuarioGet()
    {

        $resposta = $this->get(URL_RAIZ . 'usuarios/criar');


        $this->verificarContem($resposta, 'Cadastre-se no Sistema!');
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
