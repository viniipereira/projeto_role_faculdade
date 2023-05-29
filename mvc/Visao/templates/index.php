<?php
$usuario_autenticado = isset($_SESSION['usuario']);

$url_atual = $_SERVER['REQUEST_URI'];

$semAutenticacao = $this->verificarSeSaoRotasSemAutenticacao($url_atual);

$mostrar_menu = $this->mostrarMenuConformeRota($url_atual);

if (!$semAutenticacao) {
  if ($mostrar_menu) {
    $this->verificarLogado();
  }
}



?>
<!DOCTYPE html>
<html>

<head>
  <title><?= APLICACAO_NOME ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= URL_CSS . 'reset.css' ?>">
  <link rel="stylesheet" href="<?= URL_CSS . 'bootstrap.min.css' ?>">
  <link rel="stylesheet" href="<?= URL_CSS . 'login.css' ?>">
  <link rel="stylesheet" href="<?= URL_CSS . 'main.css' ?>">

  <script src="<?= URL_JS . 'jquery-3.1.1.min.js' ?>"></script>
  <script src="<?= URL_JS . 'bootstrap.min.js' ?>"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#" style="font-family: Arial, sans-serif;">Sistema de Rolês</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul>
        <?php if ($usuario_autenticado) : ?>
          <li class="somente_logado">
            <a href="#">Cidades</a>
            <ul>
              <li><a href="<?= URL_RAIZ . 'cadastrar/cidades' ?>">Cadastro de Cidade</a></li>
              <li><a href="<?= URL_RAIZ . 'cidades' ?>">Lista de Cidades</a></li>
            </ul>
          </li>
        <?php endif; ?>
        <?php if ($usuario_autenticado) : ?>
          <li class="somente_logado">
            <a href="#">Usuários</a>
            <ul>
              <li><a href="<?= URL_RAIZ . 'cadastrar/usuario' ?>">Cadastro de Usuário</a></li>
            </ul>
          </li>
        <?php endif; ?>
        <li>
          <a href="#">Roles</a>
          <ul>
            <?php if ($usuario_autenticado) : ?>

              <li class="somente_logado"><a href="<?= URL_RAIZ . 'cadastrar/role' ?>">Cadastro de Role</a></li>
            <?php endif; ?>
            <li><a href="<?= URL_RAIZ . 'roles' ?>">Lista de Roles</a></li>
          </ul>
        </li>
        <?php if ($usuario_autenticado) : ?>
          <li>

            <a class="somente_logado" href="<?= URL_RAIZ . 'relatorio' ?>">Relatório</a>

          </li>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav ml-auto">
        <?php if (!$usuario_autenticado) : ?>
          <li class="nav-item login">
            <a href="<?= URL_RAIZ . 'login' ?>">Login</a>
          </li>
        <?php endif; ?>
        <?php if ($usuario_autenticado) : ?>
          <form action="<?= URL_RAIZ . 'login' ?>" method="post" class="inline">
            <input type="hidden" name="_metodo" value="DELETE">
            <a href="" class="btn btn-default" onclick="event.preventDefault(); this.parentNode.submit()">
              Sair do sistema
            </a>
          </form>
        <?php endif; ?>

      </ul>
    </div>
  </nav>


  <?php $this->imprimirConteudo() ?>


</body>

</html>