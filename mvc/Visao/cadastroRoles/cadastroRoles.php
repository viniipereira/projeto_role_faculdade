<main>
  <div class="container mt-5">
    <div class="form-container">
      <h1>Cadastro de Rôles</h1>

      <form action="<?= URL_RAIZ . 'roles' ?>" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6 form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome"  name="nome" required value="<?= $this->getPost('nome') ?>">
          </div>
          <div class="col-md-6 form-group">
            <label for="descricao">Descrição:</label>
            <input name="descricao" type="text" class="form-control" id="descricao" required value="<?= $this->getPost('descricao') ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
            <label for="foto">Foto:</label>
            <input type="file" class="form-control" name="foto"  id="foto" accept="image/*" required value="<?= $this->getPost('foto') ?>">
          </div>
          <div class="col-md-6 form-group">
            <label for="nota">Nota:</label>
            <input type="number" class="form-control" id="nota" min="0" name="nota" max="5" required value="<?= $this->getPost('nota') ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
            <label for="horario">Horário:</label>
            <select class="form-control" id="horario" required value="<?= $this->getPost('horario') ?>" name="horario">
              <option value="dia">Dia</option>
              <option value="noite">Noite</option>
            </select>
          </div>
          <div class="col-md-6 form-group">
            <label for="cidade">Cidade:</label>
            
            <select class="form-control" id="cidade" required value="<?= $this->getPost('cidade') ?>" name="cidade">
              <option value="" disabled selected>Selecione uma cidade</option>
              <?php foreach ($cidades as $cidade) : ?>
              
                <option value="<?php echo $cidade->getId(); ?>"><?php echo $cidade->getNome(). ' - ' . $cidade->getUf(); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 submit-btn">
            <button type="submit" class="btn btn-primary">Cadastrar rolê</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</main>
<!-- Rodapé -->
<footer class="mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <p>© 2023 Todos os direitos reservados.</p>
      </div>
    </div>
  </div>
</footer>