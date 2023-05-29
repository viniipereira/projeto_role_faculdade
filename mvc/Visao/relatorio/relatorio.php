<main>
  <div class="container mt-5" id="report">
    <h1 class="text-center">Relatório</h1>

    <div class="row mt-5">
      <div class="col-md-4">
        <h3>Total de cidades cadastradas:</h3>
        <p class="texto"><?php echo $relatorio['total_cidades'][0]; ?></p>
      </div>
      <div class="col-md-4">
        <h3>Total de rolês cadastrados:</h3>
        <p class="texto"><?php echo $relatorio['total_roles'][0]; ?></p>
      </div>
      <div class="col-md-4">
        <h3>Quantidade de rolês divididos por nota:</h3>
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <?php if (isset($relatorio['roles_por_nota'])) : ?>
                <?php foreach ($relatorio['roles_por_nota'] as $nota => $quantidade) : ?>
                  <tr>
                    <td class="texto">Nota <?php echo $nota; ?>:</td>
                    <td class="texto"><?php echo $quantidade; ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php else : ?>
                <tr>
                  <td colspan="2" class="texto">Nenhum resultado encontrado.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-6">
        <h3>Total de rolês de dia cadastrados:</h3>
        <p class="texto"><?php echo $relatorio['roles_de_dia'][0]; ?></p>
      </div>
      <div class="col-md-6">
        <h3>Total de rolês de noite cadastrados:</h3>
        <p class="texto"><?php echo $relatorio['roles_de_noite'][0]; ?></p>
      </div>
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