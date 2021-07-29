<?php require 'views/partials/header.view.php' ?>

<div class="container-fluid main">
    <h1>Hobbies van 
        <?= $vars['user']->first_name ?>
    </h1>
        <div class="row">
            <div class="col">
                <ul>
                    <?php foreach($vars['hobbies'] as $hobby) :?>
                        <li>
                            <?= $hobby->description ?>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
</div>

<?php require 'views/partials/footer.view.php' ?>