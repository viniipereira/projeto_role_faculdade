    <div class="center-block site">
    <div class="col-sm-6 col-sm-offset-3" id="cadastro">
        <h1 class="text-center">Cadastro de cidades</h1>
        <form action="<?= URL_RAIZ . 'cidades' ?>" method="post" id="form-cadastro" class="rounded-lg p-5 shadow-lg" style="background-color: #f7f7f7;">
            <div class="form-group">
              <label for="nome-cidade">Nome da Cidade</label>
              <?php $this->incluirVisao('util/formErro.php', ['campo' => 'cidade']) ?>
              <input type="text"  name="nome" class="form-control" id="nome-cidade" placeholder="Digite o nome da cidade" value="<?= $this->getPost('nome') ?>">
            </div>
            <div class="form-group">
              <label for="uf">UF:</label>
              <?php $this->incluirVisao('util/formErro.php', ['campo' => 'uf']) ?>
              <select type="text" class="form-control" id="uf-cidade" name="uf" value="<?= $this->getPost('uf') ?>">
                <option value="" selected disabled>Selecione o estado</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-4">Cadastrar</button>
          </form>
    </div>
</div>





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