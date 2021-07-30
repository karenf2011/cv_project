<?php require 'views/partials/header.view.php' ?>

<div class="container-fluid main">
    <h1>Persoonlijke informatie</h1>
    <div class="row">
        <div class="col">
            <p>Naam: 
                <?= $vars['user']->first_name ?>
                <?= $vars['user']->last_name ?>
            </p>
            <p>Geboortedatum:
                <?= date('d-m-Y', strtotime($vars['user']->date_of_birth)) ?>
            </p>
            <p>Woonplaats:
                <?= $vars['user']->residence ?>
            </p>
            <p>Emailadres:
                <a href="mailto:<?= $vars['user']->email ?>"><?= $vars['user']->email ?></a>
            </p>
            <p>Github:
                <a href="<?= $vars['user']->github ?>"><?= $vars['user']->github ?></a>
            </p>
        </div>
    </div>
</div>

<?php require 'views/partials/footer.view.php' ?>