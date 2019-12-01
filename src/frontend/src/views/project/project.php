<?php require_once('./../../includes/header.php') ?>
<?php require_once('./../../../../backend/models/DAO.php') ?>
<?php require_once('./../../../../backend/models/user.model.php'); ?>
<?php require_once('./../../../../backend/classes/usuario.class.php'); ?>
<?php require_once('./../../../../backend/models/projeto.model.php') ?>
<?php require_once('./../../../../backend/classes/projeto.class.php') ?>


<?php

session_start();

$param = isset($_GET['project']);

if ($_SESSION['register'] === NULL) header('Location: ./../../home/home.php');

if (!$param) header('Location: ./../../projects/projects.php');

$model = new Projeto();

$projeto = $model->busca(intval($_GET['project']));
?>


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
<main class="p-detalhes">
  <div class="p-indicator">
    <h4>Detalhes</h4>
  </div>
  <article>
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
                <strong>Prazo:</strong>
                <strong><?php echo $projeto->getPrazo() ?> </strong>
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
            <div class="row">
              <div class="col">
                <strong>Criado por:</strong>
                <strong><?php echo $projeto->getCriador()->getUsername() ?> </strong>
              </div>
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
  </article>
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Editar projeto</h4>
      <form action="./../../../../backend/controllers/projects/editar.project.php?id=<?php echo $projeto->getID() ?>" method="post">
        <div class="row">
          <div class="input-field col s12">
            <input id="title" type="text" name="titulo" value="<?php echo $projeto->getTitulo() ?>" class="validate" required>
            <label for="title">Titulo do projeto</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <select name="tipoDeProjeto" value="<?php echo $projeto->getTipoDeProjeto() ?>" required>
              <option disabled>Tipo de projeto</option>
              <option value="Desenvolvimento Web">Desenvolvimento Web</option>
              <option value="Banco de Dados">Banco de dados</option>
              <option value="Desktop">Desktop</option>
            </select>
            <label>Tipo de Projeto</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="valor" type="number" min="0" name="valor" value="<?php echo $projeto->getValor() ?>" class="validate" required>
            <label for="valor">Valor do Projeto</label>
          </div>
          <div class="input-field col s6">
            <select name="moeda" value="<?php echo $projeto->getMoeda() ?>">
              <option value="" disabled>Moeda</option>
              <option value="Real">Real</option>
              <option value="Dolar">Dolar</option>
            </select>
            <label>Moeda</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <select name="tipoDePagamento" value="<?php echo $projeto->getTipoDePagamento() ?>">
              <option disabled>Tipo de pagamento</option>
              <option value="Por Hora">Por hora</option>
              <option value="Por Completo">Por completo</option>
            </select>
            <label>Tipo de Pagamento</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="prazo" name="prazo" type="text" class="validate" value="<?php echo $projeto->getPrazo() ?>" required>
            <label for="prazo">Prazo</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <select multiple name="requisitos[]" size="3" value="<?php echo $projeto->getRequisitos() ?>">
              <?php
              $myRequisitos = explode(', ', $projeto->getRequisitos());
              $requisitos = array("MongoDB", "Bootstrap", "NodeJS");

              foreach ($requisitos as $requisito) { ?>
                <option value="<?php echo $requisito ?>" <?php echo in_array($requisito, $myRequisitos) ? 'selected' : '' ?> required><?php echo $requisito ?>
                </option>
              <?php } ?>
            </select>
            <label>Requisitos</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="textarea1" name="desc" class="materialize-textarea" required><?php echo $projeto->getDescricao() ?></textarea>
            <label for="textarea1">Description</label>
          </div>
        </div>
        <div class="modal-footer">
          <!-- modal-close waves-effect -->
          <input class="waves-green center btn" type="submit" value="Editar">
        </div>
      </form>
    </div>
  </div>
  <!-- Modal Structure -->
  <div id="modal2" class="modal">
    <div class="modal-content">
      <h4>Tem certeza?</h4>
      <p>Tem certeza que deseja excluir esse projeto?</p>
    </div>
    <div class="modal-footer">
      <a href="./../../../../backend/controllers/projects/excluir.project.php?id=<?php echo $projeto -> getID() ?>" class="modal-close waves-effect waves-green btn-flat">Sim</a>
    </div>
  </div>
  <?php
  $userSession = unserialize($_SESSION['register']);

  if ($userSession->getCPF() === $projeto->getCriador()->getCPF()) {
    ?>
    <a class="btn-floating btn-large light-blue accent-3 btn-edit-project modal-trigger" href="#modal1"><i class="fas fa-edit"></i></a>
    <a class="btn-floating btn-large light-blue accent-3 btn-delete-project modal-trigger" href="#modal2"><i class="fas fa-trash"></i></a>
  <?php } ?>
</main>
<ul class="sidenav" id="mobile-demo">
  <li><a href="sass.html">Conta</a></li>
  <li><a href="badges.html">Sair</a></li>
</ul>

<script src="./index.js"></script>
<?php require_once('./../../includes/footer.php') ?>
