<?php

namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Role;
use \Modelo\Cidade;

class ControladorRoles  extends Controlador
{
    public function index()
    {
        $this->verificarLogado();
        $cidades = Cidade::buscarTodas();
        $this->visao('cadastroRoles/cadastroRoles.php',  [
            'cidades' => $cidades,
            'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function listar()
    {

        if (!isset($_GET['filtrar'])) {
            $roles = Role::buscarTodos();
            $cidades = Cidade::buscarTodas();

            $this->visao('lista/roles.php', [
                'roles' => $roles,
                'cidades' => $cidades,
                'mensagem' => DW3Sessao::getFlash('mensagem', null)
            ]);
        } else {
            if (isset($_GET['cidade']) && $_GET['cidade'] !== '') {
                $cidade = intval($_GET['cidade']);
                $roles = Role::buscarPorCidade($cidade);
                $cidades = Cidade::buscarTodas();

                $this->visao('lista/roles.php', [
                    'roles' => $roles,
                    'cidades' => $cidades,
                    'mensagem' => DW3Sessao::getFlash('mensagem', null)
                ]);
            } else {
                $this->verificarLogado();
                $roles = Role::buscarTodos();
                $cidades = Cidade::buscarTodas();

                $this->visao('lista/roles.php', [
                    'roles' => $roles,
                    'cidades' => $cidades,
                    'mensagem' => DW3Sessao::getFlash('mensagem', null)
                ]);
            }
        }
    }
    public function armazenar()
    {
        $foto = array_key_exists('foto', $_FILES) ? $_FILES['foto'] : null;
        $nota = $_POST['nota']; // supondo que $_POST['nota'] seja um número

        $this->verificarLogado();

        $usuario = $this->getUsuario();



        $role = new Role(
            $_POST['nome'],
            $_POST['descricao'],
            $foto,
            $nota,
            $_POST['horario'],
            $_POST['cidade'],
            $usuario
        );
        $role->salvar();
        DW3Sessao::setFlash('mensagem', 'Role cadastrado com sucesso.');
        $this->redirecionar(URL_RAIZ . 'roles');
        // a imagem foi enviada com sucesso
    }
    public function deletar()
    {
        $id_role = intval($_POST['role_id']);

        $sucesso = ROLE::deletarRole($id_role);

        if($sucesso) {
           $this->sucesso();
        }

    }
    public function sucesso()
    {
        $this->visao('cadastroRoles/sucessoDelete.php');
    }
}
