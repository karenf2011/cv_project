<?php require 'views/partials/header.view.php' ?>

<div class="container-fluid main">
    <h1>Opleidingen van 
        <?= $vars['user']->first_name ?>
    </h1>

    <?php foreach($vars['educations'] as $education) :?>
        <div class="row">
            <div class="col-1">
                <p>
                    <?= $education->begin_year ?> -
                    <?php if($education->end_year === NULL) : ?>
                        heden
                    <?php else : ?> 
                        <?= $education->end_year ?>
                    <?php endif ?> 
                </p>
            </div>
            <div class="col-2">
                <p>
                    <?= $education->sort_of_education ?>  
                </p>
            </div>
            <div class="col-3">
                <p>
                    <?= $education->institution ?>  
                </p>
            </div>
            <div class="col-3">
                <p>
                    <?= $education->degree ?> 
                </p>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?php require 'views/partials/footer.view.php' ?>