    <!-- Container para lista de cidades -->
    <main>
      <div class="container mt-5">
        <div class="form-container">
          <h1>Sistema de Rolê</h1>
          <form  action="<?= URL_RAIZ . 'login' ?>" method="POST">
            <div class="form-group">
            <div class="form-group has-error text-center">
                <?php $this->incluirVisao('util/formErro.php', ['campo' => 'login']) ?>
            </div>
              <div class="form-group <?= $this->getErroCss('email') ?>">
                <label class="control-label" for="email">E-mail *</label>
                <?php $this->incluirVisao('util/formErro.php', ['campo' => 'email']) ?>
                <input id="email" name="email" class="form-control" autofocus value="<?= $this->getPost('email') ?>">
            </div>
            </div>
            <div class="form-group">
              <div class="form-group <?= $this->getErroCss('senha') ?>">
                <label class="control-label" for="senha">Senha *</label>
                <?php $this->incluirVisao('util/formErro.php', ['campo' => 'senha']) ?>
                <input id="senha" name="senha" class="form-control" type="password">
            </div>
            </div>
            <div class="submit-btn d-flex justify-content-center" >
              <button type="submit" class="btn btn-success mr-3" id="login">Login</button>
              <a href="<?= URL_RAIZ . 'usuarios/criar' ?>">Não tem um usuário? Cadastrar-se aqui!</a>
            </div>
          </form>
        </div>
      </div>
    </main>
    <footer class="mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <p>© 2023 Todos os direitos reservados.</p>
          </div>
        </div>
      </div>
    </footer>