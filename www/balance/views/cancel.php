<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php // include view("balance", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php //include view("balance", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <h1><?php _t("You will be cancel this transaction"); ?></h1>

        <p><a class="btn btn-danger" href="index.php?c=balance&a=ok_cancel&id=<?php echo $id; ?>" ><?php _t("Yes, cancel"); ?></a></p>

        <p><a class="btn btn-primary" onclick="history.back()"><?php _t("Return without canceling"); ?></a></p>





    </div>
</div>

<?php include view("home", "footer"); ?> 

