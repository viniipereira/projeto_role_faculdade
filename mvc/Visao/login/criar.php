<div class="center-block site">
    <div class="col-sm-6 col-sm-offset-3" id="cadastro">
        <h1 class="text-center">Cadastre-se no Sistema!</h1>
        <form action="<?= URL_RAIZ . 'usuarios/criar' ?>" method="post" class="margin-bottom" enctype="multipart/form-data">
        <div class="form-group">
                <label class="control-label" for="email">Nome:*</label>
                <?php $this->incluirVisao('util/formErro.php', ['campo' => 'nome']) ?>
                <input id="nome" name="nome" class="form-control" autofocus value="<?= $this->getPost('nome') ?>">
            </div>
            <div class="form-group <?= $this->getErroCss('email') ?>">
                <label class="control-label" for="email">E-mail *</label>
                <?php $this->incluirVisao('util/formErro.php', ['campo' => 'email']) ?>
                <input type="email" id="email" name="email" class="form-control" autofocus value="<?= $this->getPost('email') ?>">
            </div>
            <div class="form-group <?= $this->getErroCss('senha') ?>">
                <label class="control-label" for="senha">Senha *</label>
                <?php $this->incluirVisao('util/formErro.php', ['campo' => 'senha']) ?>
                <input id="senha" name="senha" class="form-control" type="password">
            </div>
            <div class="form-group <?= $this->getErroCss('foto') ?>">
                <label class="control-label" for="foto">Foto (somente PNG)</label>
                <?php $this->incluirVisao('util/formErro.php', ['campo' => 'foto']) ?>
                <input id="foto" name="foto" class="form-control" type="file">
            </div>
            <button type="submit" class="btn btn-primary center-block">Cadastrar-se</button>
        </form>
        <p class="text-center">
            <a href="<?= URL_RAIZ . 'login' ?>">Voltar para a tela de Login</a>
        </p>
    </div>
</div>
