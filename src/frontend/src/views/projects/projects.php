<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Criar projeto</h4>
        <form action="">
        <div class="row">
            <div class="input-field col s12">
            <input id="title" type="text" class="validate">
            <label for="title">Titulo do projeto</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
            <select>
                <option value="" disabled selected>Tipo de projeto</option>
                <option value="1">Desenvolvimento Web</option>
                <option value="2">Banco de dados</option>
                <option value="3">Desktop</option>
            </select>
            <label>Tipo de Projeto</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
            <input id="valor" type="number" class="validate">
            <label for="valor">Valor do Projeto</label>
            </div>
            <div class="input-field col s6">
            <select>
                <option value="" disabled selected>Moeda</option>
                <option value="1">Real</option>
                <option value="2">Dolar</option>
            </select>
            <label>Moeda</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
            <select multiple>
                <option value="" disabled selected>Requisitos</option>
                <option value="1">NodeJS</option>
                <option value="2">Bootstrap</option>
                <option value="3">MongoDB</option>
            </select>
            <label>Requisitos</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
            <textarea id="textarea1" class="materialize-textarea"></textarea>
            <label for="textarea1">Description</label>
            </div>
        </div>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green center btn-flat">Criar</a>
    </div>
    </div>
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
                    <h6>NodeJS</h6>
                    </div>
                    <div class="col right">
                    <strong>50$</strong>
                    </div>
                </div>
                <div>
                    <p>Criação de uma API Rest, seria de fato o backend de uma plataforma freelancer</p>
                </div>
                </div>
                <div class="card-action">
                <a href="./../project/project.html">Analisar Projeto</a>
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
                    <h6>NodeJS</h6>
                    </div>
                    <div class="col right">
                    <strong>50$</strong>
                    </div>
                </div>
                <div>
                    <p>Criação de uma API Rest, seria de fato o backend de uma plataforma freelancer</p>
                </div>
                </div>
                <div class="card-action">
                <a href="./../project/project.html">Analisar Projeto</a>
                </div>
            </div>
            </div>
        </div>
        <a class="btn-floating btn-large purple darken-1 btn-add modal-trigger" href="#modal1"><i
            class=" fas fa-plus"></i></a>
    </main>
</div>
<?php require_once('./../../includes/footer.php') ?>
<script src="./index.js"></script>
</body>
</html>
  