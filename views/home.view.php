<?php require 'views/partials/header.view.php' ?>

<div class="container-fluid main">
    <h1>CV van 
        <?= $vars['user']->first_name ?>
        <?= $vars['user']->last_name ?>
    </h1>
    <div class="row">
        <div class="col-4">
            <?php foreach ($vars['educations'] as $education) : ?>
                <?php if ($education->end_year === NULL) : ?>
                    <p>Huidige opleiding:</p>
                    <p>
                        <?= $education->sort_of_education ?> 
                        bij <?= $education->institution ?> 
                    </p>
                <?php endif ?>
            <?php endforeach ?>
            <p>Laatst behaald: </p>
            <p>
                <?= $vars['degree']->degree ?>
                <?= $vars['degree']->sort_of_education ?>
            </p>    
            <a href="/educations">Zie meer</a>
        </div>
        <div class="col-4">
            <p>Huidig werk:</p>
            <?php if($vars['currentJob']): ?>
                <p>
                    <?= $vars['currentJob']->job ?>
                </p>
            <?php else : ?>
                <p>Op zoek naar werk</p>
            <?php endif ?> 
            <p>Laatste werk:</p>
            <p>
                <?= $vars['latestJob']->job ?>
            </p>
            <a href="/jobs">Zie meer</a>
        </div>
    </div>
</div>

<?php require 'views/partials/footer.view.php' ?>