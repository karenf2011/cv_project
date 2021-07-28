<?php require 'views/partials/header.view.php' ?>

<div class="main">
    <div class="row">
        <div class="col-12">
            Opleiding van: <?= $vars['user']->first_name ?>
        </div>
    </div>
    
    <?php foreach($vars['educations'] as $education) : ?>
        <div class="row">
            <div class="col-12">
                <?= $education->sort_of_education ?>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?php require 'views/partials/footer.view.php' ?>