<?php
require_once('./../../includes/header.php');
require_once('./../../../../backend/classes/usuario.class.php');

session_start();

$usuario = unserialize($_SESSION['register']);

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

<main class="p-usuario">
  <div class="p-indicator">
    <h4>Perfil</h4>
  </div>

  <form class="col s12" method="post" action="./../../../../backend/controllers/users/editar.user.php">
    <div class="row">
      <div class="input-field col s12">
        <input id="username" name="username" type="text" class="p-input-edit" value="<?php echo $usuario->getUsername(); ?>" class="validate" disabled>
        <label for="username">Username</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input id="CPF" name="CPF" type="text" value="<?php echo $usuario->getCPF(); ?>" class="p-input-edit validate" disabled>
        <label for="CPF">CPF</label>
        <span class="helper-text" data-error="wrong" data-success="right">* Este dado não vai ser editado</span>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input id="email" type="email" name="email" class="p-input-edit" value="<?php echo $usuario->getEmail(); ?>" class="validate" disabled>
        <label for="email">Email</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input id="password" name="pass" type="password" class="p-input-edit p-pass" value="" disabled class="validate">
        <label for="password">Password</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <textarea id="textarea1" name="desc" class="p-input-edit materialize-textarea" required disabled><?php echo $usuario->getDescricao() ?></textarea>
        <label for="textarea1">Description</label>
      </div>
    </div>
    <label>
      <input type="checkbox" class="p-checkbox" />
      <span>Editar</span>
    </label>
    <div id="modal" class="modal">
      <div class="modal-content">
        <h4>Tem certeza?</h4>
        <p>Tem certeza que deseja excluir sua conta permanentemente?</p>
      </div>
      <div class="modal-footer">
        <a href="./../../../../backend/controllers/users/excluir.user.php" class="modal-close waves-effect waves-green btn-flat">Sim</a>
      </div>
    </div>
    <a class="btn btn-excluir red lighten-1 modal-trigger" href="#modal">Excluir Conta</a>
    <div class="row p-button-edit">
      <div class="col">
        <input type="submit" class="btn btn-salvar" style="display: none;" value="Salvar">
      </div>
      <div class="col">
        <a class=" btn btn-cancelar" href="" style="display: none;">Cancelar</a>
      </div>
    </div>
    <div>
  </form>
</main>
<script src="./index.js"></script>
<?php require_once('./../../includes/footer.php') ?>
