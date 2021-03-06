<?php require_once('./../../includes/header.php') ?>

<?php

session_start();

if ($_SESSION['register'] === NULL) {
  header('Location: ./../../views/home/home.php');
}

?>

<main>
    <div class="indigo lighten-1 white-text p-choose">
        &nbsp;
        <div class="p-choose-content">
            <div class="p-top center">
                <a href="./../freelancers/freelancers.php">
                    <h3>Encontre Freelancers</h3>
                </a>
            </div>
            <div class="divider"></div>
            <div class="p-bottom center">
                <a href="./../projects/projects.php">
                    <h3>Encontre Projetos</h3>
                </a>
            </div>
        </div>
    </div>
</main>
<?php require_once('./../../includes/footer.php') ?>
</body>
</html>
