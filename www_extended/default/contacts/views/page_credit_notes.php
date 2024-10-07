<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">        
        <?php include view("contacts", 'izq_details'); ?>
    </div>


    
    
    
    <div class="col-sm-10 col-md-10 col-lg-10">

        <?php include "nav_credit_notes.php"; ?> 

        <?php
        //
        if ($credit_notes) {
            include view('credit_notes', 'table_index');
        } else {
            message('info', 'No items');
        }
        ?>

    </div>
</div>
<?php include view("home", "footer"); ?>  

