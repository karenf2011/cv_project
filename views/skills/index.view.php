<?php require 'views/partials/header.view.php' ?>

<div class="container-fluid main">
    <h1>Vaardigheden van 
        <?= $vars['user']->first_name ?>
    </h1>

        <div class="row">
            <div class="col">
                <p>Ervaring met:</p>
                <ul>
                    <?php foreach($vars['skills'] as $skill) :?>
                        <li>
                            <?= $skill->description ?>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
</div>

<?php require 'views/partials/footer.view.php' ?>