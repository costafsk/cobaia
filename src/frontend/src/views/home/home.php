<?php require_once('./../../includes/header.php') ?>

<body class="p-home">
  <div class="row">
    <!-- Carousel Article -->
    <main class="col s6  no-padding p-main">
      <div class="carousel carousel-slider center p-carousel-article">
        <div class="carousel-fixed-item center p-item-fixed">
          <header class="p-header white-text">
            <h4 class="p-title">Working</h4>
          </header>
          <!-- Modal SignIn Structure -->
          <div id="p-modal-signIn" class="modal">
            <div class="modal-content">
              <div class="row">
                <div class="col s1">
                  <a href="#p-modal-signUp" class="modal-trigger modal-close">
                    <i class="fas fa-arrow-left"></i>
                  </a>
                </div>
                <div class="col s11">
                  <h4>Sign In</h4>
                </div>
                <div>&nbsp;</div>
              </div>
              <form class="col s12">
                <div class="row">
                  <div class="input-field col s12">
                    <input id="modal-email" type="text" class="validate">
                    <label for="modal-email">E-mail</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="modal-password" type="password" class="validate">
                    <label for="modal-password">Senha</label>
                  </div>
                </div>
                <section class="p-btn-signIn">
                  <div class="row">
                    <a class="p-btn-go" href="./../choose/choose.php">Entrar</a>
                  </div>
                  <div class="row">
                    <button class="p-btn-github">
                      Entrar com Github
                      &nbsp;
                      <i class="fab fa-github"></i>
                    </button>
                  </div>
                  <div class="row">
                    <button class="p-btn-google">
                      Entrar com Google
                      &nbsp;
                      <i class="fab fa-google"></i>
                    </button>
                  </div>
                </section>
              </form>
            </div>
            <div class="modal-footer">
            </div>
          </div>
          <!-- Modal SignUp Structure -->
          <div id="p-modal-signUp" class="modal p-modal">
            <div class="modal-content">
              <h4>Sign Up</h4>
              <form class="col s12">
                <div class="row">
                  <div class="input-field col s12">
                    <input id="modal-name" type="text" class="validate">
                    <label for="modal-name">Username</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="modal-signUpEmail" type="text" class="validate">
                    <label for="modal-signUpEmail">E-mail</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="modal-signUpPassword" type="password" class="validate">
                    <label for="modal-signUpPassword">Senha</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="modal-password-confirm" type="text" class="validate">
                    <label for="modal-password-confirm">Confirmar senha</label>
                  </div>
                </div>
                <div class="row p-dialog-form-action">
                  <div class="col s4">
                    <button class="p-btn-modal-cancel">Cancelar</button>
                  </div>
                  <div class="col s4">
                    <button class="p-btn-modal-continue">Continuar</button>
                  </div>
                  <div class="col s4">
                    <button href="#p-modal-signIn" class="modal-trigger p-btn-modal-login modal-close">Fazer Login</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <section class="p-button">
            <button class="modal-trigger" href="#p-modal-signUp">Não é usuário? Crie ja sua conta</button>
          </section>
        </div>
        <div class="carousel-item indigo lighten-1 white-text p-one" href="#one!">
          <article class="p-article">
            <h3 class="white-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sem quam,
              tristique.</h3>
          </article>
          <div class="p-explorer">
            <button class="p-btn-explorer">Explorar</button>
          </div>
          <section>
            <span>Deslize para navegar</span>
          </section>
        </div>
        <div class="carousel-item green accent-2 white-text p-two" href="#two!">
          <div class="p-how-use">
            <h3>Como funciona?</h3>
            <iframe width="500" height="300" src="https://www.youtube.com/embed/tMWpm_GOLaA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        <div class="carousel-item indigo lighten-1 white-text p-three" href="#three!">
          <div class="p-work-as">
            <div class="p-top">
              <h3>Publique um projeto</h3>
            </div>
            <div class="divider"></div>
            <div class="p-bottom">
              <h3>Trabalhe como freelancer</h3>
            </div>
          </div>
        </div>
        <div class="carousel-item green accent-2 white-text p-for" href="#four!">
          <!-- <img src="./../../img/placeholder.jpg" alt="sobre nos icon" class="p-about-img"> -->
          <h3 class="p-title">Sobre nós</h3>
          <p class="p-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin faucibus condimentum facilisis. Vestibulum varius
            suscipit lobortis. Quisque dictum tortor a posuere hendrerit. Donec tempor massa mi, et tristique sapien rhoncus at.
            Duis id semper augue. Aliquam viverra quis risus non pellentesque. Maecenas eleifend elit eget velit mattis, et
            venenatis eros tempor. Maecenas purus turpis, tempus sed dolor a, pretium aliquam arcu. Donec a pharetra arcu.
            Vestibulum lacinia eros at auctor dignissim. Donec fringilla a turpis euismod elementum. Nunc ac tortor ac purus aliquet
            hendrerit vel posuere mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque nec odio porta ante
            dictum scelerisque..</p>
        </div>
        <div class="carousel-item indigo lighten-1 white-text p-five" href="#five!">
          <h3>Duvidas ?</h3>
          <div class="p-box-question">
            <p class="p-question">1. Lorem ipsum dolor sit amet, consectetur adipisicing elit?</p>
            <p>Sed do eiusmod tempor incididunt ut
              labore et dolore magna aliqua.</p>
          </div>
          <div class="p-box-question">
            <p class="p-question">2. Lorem ipsum dolor sit amet, consectetur adipisicing elit?</p>
            <p>Sed do eiusmod tempor incididunt ut
              labore et dolore magna aliqua.</p>
          </div>
          <div class="p-box-question">
            <p class="p-question">3. Lorem ipsum dolor sit amet, consectetur adipisicing elit?</p>
            <p>Sed do eiusmod tempor incididunt ut
              labore et dolore magna aliqua.</p>
          </div>
        </div>
      </div>
    </main>
    <!-- Carousel Form (Login / Register) -->
    <section class="col s5 hide-on-small-and-down p-login-and-register">
      <div class="carousel carousel-slider center p-carousel-form">
        <div class="carousel-item p-signIn indigo lighten-5" href="#one!">
          <h1 class="p-title">Sign In</h1>
          <form class="col s12" action="./../../../../backend/controllers/users/loga.user.php" method="post">
            <div class="row">
              <div class="input-field col s6">
                <input id="CPF" name="CPF" type="text" class="validate">
                <label for="CPF">CPF</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input id="password" name="pass" type="password" class="validate">
                <label for="password">Senha</label>
              </div>
            </div>
            <div class="p-btn-signIn">
              <div class="row">
                <input type="submit" class="p-btn-go" value="Entrar">
              </div>
            </div>
          </form>
          <section class="p-btn-signIn">
            <div class="row">
              <button class="p-btn-signUp">Criar uma nova conta</button>
            </div>
            <div class="row">
              <button class="p-btn-github">
                Entrar com Github
                &nbsp;
                <i class="fab fa-github"></i>
              </button>
            </div>
            <div class="row">
              <button class="p-btn-google">
                Entrar com Google
                &nbsp;
                <i class="fab fa-google"></i>
              </button>
            </div>
          </section>
        </div>
        <div class="carousel-item indigo lighten-5" href="#two!">
          <section class="p-signUp">
            <h1 class="p-title">Sign Up</h1>
            <form class="col s12" action="./../../../../backend/controllers/users/iniciarCadastro.user.php" method="POST">
              <div class="row">
                <div class="input-field col s6">
                  <input id="name" name="username" type="text" class="validate">
                  <label for="name">Username</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input id="signUpEmail" name="email" type="text" class="validate">
                  <label for="signUpEmail">E-mail</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input id="signUpCPF" name="cpf" type="text" maxlength="11" placeholder="EX: 12345678900" class="validate">
                  <label for="signUpCPF">CPF</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input id="signUpPassword" name="pass" type="password" class="validate">
                  <label for="signUpPassword">Senha</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input id="password-confirm" type="password" name="repass" class="validate">
                  <label for="password-confirm">Confirmar senha</label>
                </div>
              </div>
              <div class="row p-dialog-form-action">
                <div class="col s4">
                  <input class="p-btn-register" type="submit" value="Continuar">
                </div>
                <div class="col s4">
                  <strong>Deslize para navegar</strong>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </section>
  </div>
  <?php require_once('./../../includes/footer.php') ?>
  <script src="./index.js"></script>
</body>

</html>
