<?php include view("home", "header"); ?>  




<div class="row">

    <?php
    $logs_index_izq = array(
        "col-xs-12",
        "col-sm-2",
        "col-md-2",
        "col-lg-2"
    );

//    vardump($logs_index_izq);
//    vardump(implode(' ', $logs_index_izq)); 
    ?>



    <div class="<?php echo implode(' ', $logs_index_izq); ?>">
        <?php include view("logs", "izq"); ?>
    </div>


    <div class="col-lg-2">
        <?php include view("logs", "izq2"); ?>
    </div>

    <div class="col-lg-8">
        <?php include view("logs", "nav"); ?>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php
        if ($logs) {
            include "table_index.php";
        } else {
            message('info', 'No items');
        }
        ?>

    </div>
</div>

<?php include view("home", "footer"); ?> 

