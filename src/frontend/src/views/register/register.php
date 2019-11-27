<?php require_once('./../../includes/header.php') ?>

<main class="p-register">
  &nbsp;
  <div>
    <h3>Descreva-se</h3>
  </div>

  <form action="../../../../backend/controllers/users/finalizarCadastro.user.php" method="POST">
    <div class="row">
      <div class="input-field col s10">
        <textarea id="textarea2" name="desc" row="10" class="materialize-textarea" data-length="120"></textarea>
        <label for="textarea2" class="white-text">Descreva-se suas skills</label>
      </div>
    </div>
    <input type="submit" value="Criar usuario" class="btn light-green">
  </form>

</main>

<?php require_once('./../../includes/footer.php') ?>
