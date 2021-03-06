<?php require_once('./../../includes/header.php') ?>
<?php require_once('./../../../../backend/models/DAO.php') ?>
<?php require_once('./../../../../backend/models/user.model.php'); ?>
<?php require_once('./../../../../backend/classes/usuario.class.php'); ?>
<?php require_once('./../../../../backend/models/projeto.model.php') ?>
<?php require_once('./../../../../backend/classes/projeto.class.php') ?>
<?php
session_start();

if ($_SESSION['register'] === NULL) {
  header('Location: ./../../home/home.php');
} else {
  $model = new Projeto();

  $projetos = $model->lista(10, 0);
}
?>

<div id="modal1" class="modal">
  <div class="modal-content">
    <h4>Criar projeto</h4>
    <form action="./../../../../backend/controllers/projects/cria.project.php" method="post">
      <div class="row">
        <div class="input-field col s12">
          <input id="title" type="text" name="titulo" class="validate" required>
          <label for="title">Titulo do projeto</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <select name="tipoDeProjeto" required>
            <option disabled selected>Tipo de projeto</option>
            <option value="Desenvolvimento Web">Desenvolvimento Web</option>
            <option value="Banco de Dados">Banco de dados</option>
            <option value="Desktop">Desktop</option>
          </select>
          <label>Tipo de Projeto</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="valor" type="number" min="0" name="valor" class="validate" required>
          <label for="valor">Valor do Projeto</label>
        </div>
        <div class="input-field col s6">
          <select name="moeda">
            <option value="" disabled selected>Moeda</option>
            <option value="Real">Real</option>
            <option value="Dolar">Dolar</option>
          </select>
          <label>Moeda</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <select name="tipoDePagamento">
            <option disabled selected>Tipo de pagamento</option>
            <option value="Por Hora">Por hora</option>
            <option value="Por Completo">Por completo</option>
          </select>
          <label>Tipo de Pagamento</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="prazo" name="prazo" type="text" class="validate" required>
          <label for="prazo">Prazo</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <select multiple name="requisitos[]" size="3">
            <option value="" disabled selected required>Requisitos</option>
            <option value="NodeJS">NodeJS</option>
            <option value="Bootstrap">Bootstrap</option>
            <option value="MongoDB">MongoDB</option>
          </select>
          <label>Requisitos</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" name="desc" class="materialize-textarea" required></textarea>
          <label for="textarea1">Description</label>
        </div>
      </div>
      <div class="modal-footer">
        <!-- modal-close waves-effect -->
        <input class="waves-green center btn" type="submit" value="Criar">
      </div>
    </form>
  </div>
</div>
<div class="p-projects">
  <nav>
    <div class="nav-wrapper p-nav">
      <a href="./../choose/choose.php">
        <i class="fas fa-chevron-left p-return"></i>
      </a>
      <a href="#!" class="brand-logo">Working</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="./../usuario/usuario.php"><i class="far fa-user"></i></a></li>
        <li><a href="'./../../../../../backend/controllers/users/sair.user.php"><i class="fas fa-sign-out-alt"></i></a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="./../usuario/usuario.php">Conta</a></li>
    <li><a href="'./../../../../../backend/controllers/users/sair.user.php">Sair</a></li>
  </ul>

  <main class="p-internal-feed">
    <div class="container p-feed">
      <div class="p-indicator">
        <h4>Projetos</h4>
      </div>
      <?php if (count($projetos) === 0) { ?>
        <h5 class="grey-text center">Não há projetos cadastrados</h5>
      <?php } ?>
      <?php foreach ($projetos as $projeto) { ?>
        <div class="col s10 m6">
          <div class="card horizontal">
            <div class="card-stacked">
              <div class="card-content">
                <div class="row p-card-top">
                  <div class="col left">
                    <h6 class="p-title"><?php echo $projeto->getTitulo() ?></h6>
                  </div>
                  <div class="col right">
                    <strong class="p-moeda"><?php echo $projeto->getMoeda() . ' ' . $projeto->getValor() ?></strong>
                  </div>
                </div>
                <div class="row">
                  <div class="col right">
                    <strong>Publicado: <?php echo $projeto->getCriadoEm() ?></strong>
                    <span>43</span>
                  </div>
                  <div class="col right">
                    <strong>Propostas:</strong>
                    <span>xx</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <p class="p-desc"><?php echo $projeto->getDescricao() ?></p>
                  </div>
                </div>
                <div class="row p-skills">
                  <?php
                    $skills = explode(', ', $projeto->getRequisitos());
                    foreach ($skills as $skill) { ?>
                    <div class="col">
                      <div class="p-skill">
                        <strong class="white-text"><?php echo $skill ?></strong>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div>
                <div class="card-action">
                  <a href="./../project/project.php?project=<?php echo $projeto->getID() ?>">Analisar Projeto</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <a class="btn-floating btn-large btn-my-projects modal-trigger" href="./../myProjects/myProjects.php"><i class="fas fa-folder"></i></a>
      <a class="btn-floating btn-large btn-add modal-trigger" href="#modal1"><i class=" fas fa-plus"></i></a>
  </main>
</div>
<?php require_once('./../../includes/footer.php') ?>
<script src="./index.js"></script>
</body>

</html>
