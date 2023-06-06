<?php
namespace Teste\Funcional;

use \Teste\Teste;
use \Framework\DW3BancoDeDados;

class TesteRoles extends Teste
{
    public function testeArmazenar()
    {
        $logar = $this->post(URL_RAIZ . 'login', [
            'email' => 'teste@teste.com',
            'senha' => '123',
        ]);
        $resposta = $this->post(URL_RAIZ . 'cidades', [
            'nome' => 'Ponta-Grossa',
            'uf' => 'PR',
        ]);

        $this->verificarRedirecionar($logar, URL_RAIZ . 'roles');

        $this->verificarRedirecionar($resposta, URL_RAIZ . 'cidades');
        $query = DW3BancoDeDados::query('SELECT * FROM cidade');
        $bdCidades =  $query->fetchAll();

        $this->verificar(count($bdCidades) == 4);
    }

    public function testeGet()
    {
        $logar = $this->post(URL_RAIZ . 'login', [
            'email' => 'teste@teste.com',
            'senha' => '123',
        ]);

       $pagina = $this->get(URL_RAIZ . 'cadastrar/role');



       $this->verificarContem($pagina,'Cadastro de Rôles');

    }

    public function testeDelete()
    {
        $logar = $this->post(URL_RAIZ . 'login', [
            'email' => 'teste@teste.com',
            'senha' => '123',
        ]);

        $delete =$this->post(URL_RAIZ . 'deletar/role', [
            'role_id' => 1,
        ]);

       $this->verificarContem($delete,'Sucesso');

    }
}
