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
}

$model = new Projeto();

$user = unserialize($_SESSION['register']);

$projetos = $model->listaProjetosDoUsuario(10, 0, $user->getCPF());

?>

<div class="p-projects">
  <nav>
    <div class="nav-wrapper p-nav">
      <a href="./../projects/projects.php">
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
        <h4>Meus projetos cadastrados</h4>
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
  </main>
</div>
<?php require_once('./../../includes/footer.php') ?>
<script src="./index.js"></script>

