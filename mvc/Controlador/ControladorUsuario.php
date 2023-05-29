<?php
namespace Controlador;

use \Modelo\Usuario;

class ControladorUsuario extends Controlador
{
    public function criar()
    {
        $this->visao('login/criar.php');
    }

    public function armazenar()
    {


        $foto = array_key_exists('foto', $_FILES) ? $_FILES['foto'] : null;

        $usuario = new Usuario($_POST['email'], $_POST['senha'],$_POST['nome'] ,$foto);

        if ($usuario->isValido()) {
            $usuario->salvar();
            $this->redirecionar(URL_RAIZ . 'usuarios/sucesso');

        } else {

            $this->setErros($usuario->getValidacaoErros());
            $this->visao('login/criar.php');
        }
    }

    public function sucesso()
    {
        $this->visao('login/sucesso.php');
    }


    public function index()
    {
        $this->visao('login/criar.php', [
        ]);
    }

    public function listar()
    {
        $this->visao('lista/usuarios.php');
    }
}

