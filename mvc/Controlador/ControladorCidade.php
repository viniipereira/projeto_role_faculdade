<?php
namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Cidade;

class ControladorCidade  extends Controlador
{
    public function index()
    {
        
        $this->visao('cadastroCidade/cadastroCidade.php', [
        ]);
    }

    public function armazenar()
    {
        $this->verificarLogado();
        $cidade = new Cidade(
            $_POST['nome'],
            $_POST['uf'],
        );
        $cidade->inserir();
        DW3Sessao::setFlash('mensagem', 'Cidade cadastrada com sucesso.');
        $this->redirecionar(URL_RAIZ . 'cidades');
    }

    public function listar()
    {

        $this->verificarLogado();
        $cidades = Cidade::buscarTodas();
        
        $this->visao('lista/cidades.php', [
            'cidades' => $cidades,
            'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }
}
