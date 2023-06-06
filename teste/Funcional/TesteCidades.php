<?php

namespace Teste\Funcional;

use \Teste\Teste;
use \Framework\DW3BancoDeDados;

class TesteCidades extends Teste
{
    public function testeCadastroGet()
    {
        $logar = $this->post(URL_RAIZ . 'login', [
            'email' => 'teste@teste.com',
            'senha' => '123',
        ]);

        $pagina = $this->get(URL_RAIZ . 'cadastrar/cidades');

        $this->verificarContem($pagina, 'Cadastro de cidades');
    }

    public function testeCadastroPost()
    {
        $logar = $this->post(URL_RAIZ . 'login', [
            'email' => 'teste@teste.com',
            'senha' => '123',
        ]);

        $pagina = $this->post(URL_RAIZ . 'cidades',[
            'nome' => 'Guarapuava',
            'uf' => 'PR'
        ]);
        
        $this->verificarRedirecionar($pagina, URL_RAIZ . 'cidades');
    }
}
