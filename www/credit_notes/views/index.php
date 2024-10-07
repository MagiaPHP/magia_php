<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("credit_notes", "izq"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">

        <?php include view("credit_notes", "nav"); ?>

        <?php if ($_REQUEST): ?>
            <?php foreach ($error as $key => $value): ?>
                <?php message("info", "$value"); ?>
            <?php endforeach; ?>
        <?php endif; ?>
                

        <?php if ($credit_notes): ?> 
        
            <?php include view("credit_notes", "part_index"); ?>   
        
        <?php else: ?>
            <?php message('info', 'No items found'); ?>
        <?php endif; ?>
        

    </div>
    
    
</div>

<?php include view("home", "footer"); ?>
