<?php require 'views/partials/header.view.php' ?>

<div class="container-fluid main">
    <h1>CV van 
        <?= $vars['user']->first_name ?>
        <?= $vars['user']->last_name ?>
    </h1>
    <div class="row">
        <div class="col">
            <?php foreach($vars['educations'] as $education) :?>
                <?php if($education->end_year === NULL) : ?>
                    <p> Huidige opleiding: 
                        <?= $education->sort_of_education ?> 
                        bij <?= $education->institution ?> 
                    </p>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    </div>


            <!-- <p>Naam: 
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
    </div> -->
</div>

<?php require 'views/partials/footer.view.php' ?>