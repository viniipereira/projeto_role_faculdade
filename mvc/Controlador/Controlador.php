<?php

namespace Controlador;

use \Framework\DW3Controlador;
use \Framework\DW3Sessao;
use \Modelo\Usuario;

abstract class Controlador extends DW3Controlador
{
    use ControladorVisao;

    protected $usuario;

    protected function verificarLogado()
    {
        $usuario = $this->getUsuario();

        if ($usuario == null) {
            $this->redirecionar(URL_RAIZ . 'login');
            return false;
        }

        return true;
    }
    protected function verificarSeSaoRotasSemAutenticacao($url)
    {
        $cadastro = str_contains($url, 'usuarios/criar');
        $listar_roles = str_contains($url, 'roles');

        if ($cadastro || $listar_roles) {
            return true;
        } else {
            return false;
        }
    }


    protected function mostrarMenuConformeRota($url)
    {
        $mostrar_menu = strpos($url, 'login') === false;

        return  $mostrar_menu;
    }

    protected function getUsuario()
    {
        if ($this->usuario == null) {
            $usuario = DW3Sessao::get('usuario');
        }
        return $usuario;
    }
}
