    <!-- Container para lista de cidades -->
    <main>
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <form method="get" action="roles">
              <div class="form-group">
                <label for="cidade-select">Filtrar por cidade:</label>
                <select class="form-control" id="filtro-cidade" name="cidade">
                  <option value="">Todas as cidades</option>
                  <?php foreach ($cidades as $cidade) : ?>
                    <option value="<?php echo $cidade->getId(); ?>"><?php echo $cidade->getNome() . ' - ' . $cidade->getUf(); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <button type="submit" class="btn btn-primary mb-3" name="filtrar">Filtrar</button>
              <button type="submit" class="btn btn-primary mb-3 mt-5" name="limparFiltro">Limpar Filtro</button>
            </form>
            <form action="<?= URL_RAIZ . 'deletar/role' ?>" method="post" class="inline">
            <table class="table table-striped table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Descrição</th>
                  <th scope="col">Cidade</th>
                  <th scope="col">Horario</th>
                  <th scope="col">Nota</th>
                </tr>
              </thead>
              <tbody id="lista-roles">
                <?php foreach ($roles as $role) : ?>
                  <tr>
                    <td  ><?php echo $role->getId() ?></td>
                    <td><img src="<?php echo URL_PUBLICO . 'img/' . $role->getImagem() ?>"></td>
                    <td><?php echo $role->getNome(); ?></td>
                    <td><?php echo $role->getDescricao(); ?></td>
                    <td><?php echo $role->getCidade(); ?></td>
                    <td><?php echo $role->getHorario(); ?></td>
                    <td><?php echo $role->getNota(); ?></td>
                    <?php if ($this->getUsuario()  == $role->getUsuario()) : ?>
                      <input type="hidden" name="role_id" value="<?php echo $role->getId() ?>">
                      <td><button class="btn btn-danger">Excluir</button></td>
                    <?php endif; ?>
                  </tr>

                <?php endforeach; ?>
              </tbody>
            </table>
            </form>
          </div>
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