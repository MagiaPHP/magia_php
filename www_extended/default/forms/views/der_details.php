<div class="panel panel-default">
    <div class="panel-heading">Panel heading without title</div>
    <div class="panel-body">
        [forms=<?php echo $forms->getId(); ?>]
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Panel title</h3>
    </div>
    <div class="panel-body">    
        <?php forms_insert_in_page($form->getId()); ?>
    </div>
</div>