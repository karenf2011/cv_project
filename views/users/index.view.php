<?php require 'views/partials/header.view.php' ?>

<div class="main">
    <div>Werkervaring van <?= $vars['user']->first_name ?></div>
</div>

<section>
    <?php foreach($vars['jobs'] as $job) : ?>
        <div><?= $job->name ?></div>
    <?php endforeach ?>
</section>

<?php require 'views/partials/footer.view.php' ?>