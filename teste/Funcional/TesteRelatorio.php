<?php
namespace Teste\Funcional;

use \Teste\Teste;
use \Framework\DW3BancoDeDados;

class TesteRelatorio extends Teste
{
    public function testeGet()
    {
        $logar = $this->post(URL_RAIZ . 'login', [
            'email' => 'teste@teste.com',
            'senha' => '123',
        ]);

        $this->verificarRedirecionar($logar, URL_RAIZ . 'roles');
        
        $pagina = $this->get(URL_RAIZ . 'relatorio');

        $this->verificarContem($pagina,'Relatório');
    }
}
