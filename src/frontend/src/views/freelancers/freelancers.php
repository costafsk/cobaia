<?php require_once('./../../includes/header.php') ?>

<body>
  <div class="container-fluid">
    <header class="p-internal-header">
      <i class="fas fa-chevron-left" onclick="history.go(-1)"></i>
      <form>
        <div class="row">
          <div class="input-field">
            <input id="search" type="text" placeholder="Pesquisar Projetos">
          </div>
        </div>
      </form>
    </header>
    <main class="p-internal-feed">
      <div class="container p-feed">
        <div class="col s10 m6">
          <div class="card horizontal">
            <div class="card-image">
              <img src="./../../img/ti.jpg" class="img-search">
            </div>
            <div class="card-stacked">
              <div class="card-content">
                <div class="row">
                  <div class="col left">
                    <h6>Desenvolvedor NodeJS</h6>
                  </div>
                  <div class="col right">
                    <strong>20$ Valor Hora</strong>
                  </div>
                </div>
                <div>
                  <p>Desenvolvedor NodeJS com experiencia em criação de APIs utilizando o framework Expressjs</p>
                </div>
              </div>
              <div class="card-action">
                <a href="#">Analisar Desenvolvedor</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col s10 m6">
          <div class="card horizontal">
            <div class="card-image">
              <img src="./../../img/ti.jpg" class="img-search">
            </div>
            <div class="card-stacked">
              <div class="card-content">
                <div class="row">
                  <div class="col left">
                    <h6>Desenvolvedor NodeJS</h6>
                  </div>
                  <div class="col right">
                    <strong>20$ Valor Hora</strong>
                  </div>
                </div>
                <div>
                  <p>Desenvolvedor NodeJS com experiencia em criação de APIs utilizando o framework Expressjs</p>
                </div>
              </div>
              <div class="card-action">
                <a href="#">Analisar Desenvolvedor</a>
              </div>
            </div>
          </div>
        </div>
    </main>
  </div>
  <?php require_once('./../../includes/footer.php') ?>
</body>
</html>