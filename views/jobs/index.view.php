<?php require 'views/partials/header.view.php' ?>

<div class="container-fluid main">
    <h1>Werkervaring van 
        <?= $vars['user']->first_name ?>
    </h1>

    <?php foreach($vars['jobs'] as $job) :?>
        <div class="row">
            <div class="col-1">
                <p>
                    <?= $job->begin_year ?> -
                    <?= $job->end_year ?> 
                </p>
            </div>
            <div class="col-4">
                <p>
                    <?= $job->job ?>  
                </p>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?php require 'views/partials/footer.view.php' ?>