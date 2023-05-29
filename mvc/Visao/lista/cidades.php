    <!-- Container para lista de cidades -->
    <main>
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <table class="table table-striped table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">UF</th>
                </tr>
              </thead>
              <tbody id="lista-cidades">
              
                <?php foreach ($cidades as $cidade) : ?>
                  <tr>
                    <td><?php echo $cidade->getId()?></td>
                    <td><?php echo $cidade->getNome(); ?></td>
                    <td><?php echo $cidade->getUf(); ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
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
    <!-- Bootstrap JS (necessário para a funcionalidade do menu) -->
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery.js"></script>
    <script src="./js/ajax.js"></script>
    <script src="./js/lista-cidades.js"></script>