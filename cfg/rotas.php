<?php

$rotas = [
    '/' => [
        'GET' => '\Controlador\RaizControlador#index',
    ],
    '/cadastrar/cidades' => [
        'GET' => '\Controlador\ControladorCidade#index',
    ],
    '/cidades' => [
        'POST' => '\Controlador\ControladorCidade#armazenar',
        'GET' => '\Controlador\ControladorCidade#listar',
    ],
    '/cadastrar/usuario' => [
        'GET' => '\Controlador\ControladorUsuario#index',
    ],
    '/roles' => [
        'POST' => '\Controlador\ControladorRoles#armazenar',
        'GET' => '\Controlador\ControladorRoles#listar',
    ] ,
    '/deletar/role' => [
        'POST' => '\Controlador\ControladorRoles#deletar',
    ] ,
    '/deletar/role/sucesso' => [
        'GET' => '\Controlador\ControladorRoles#sucesso',
    ] ,

    '/cadastrar/role' => [
        'GET' => '\Controlador\ControladorRoles#index',
    ],
    '/relatorio' => [
        'GET' => '\Controlador\RelatorioGeralControlador#index',
    ],
    '/login' => [
        'GET' => '\Controlador\LoginControlador#criar',
        'POST' => '\Controlador\LoginControlador#armazenar',
        'DELETE' => '\Controlador\LoginControlador#destruir',
    ],
    '/usuarios/criar' => [
        'GET' => '\Controlador\ControladorUsuario#criar',
        'POST' => '\Controlador\ControladorUsuario#armazenar',
    ],
    '/usuarios/sucesso' => [
        'GET' => '\Controlador\ControladorUsuario#sucesso',
    ],
];
