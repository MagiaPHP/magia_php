<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("accounting", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php include view("accounting", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <div class="row">

            <div class="col-sm-6 col-md-2 col-lg-2">
                <div class="thumbnail">                    
                    <div class="caption">
                        <h3><?php _t("Budgets"); ?></h3>
                        <p><?php _t('Budgets list'); ?></p>
                        <p>
                            <a href="index.php?c=budgets" class="btn btn-primary" role="button"><?php _t("List"); ?></a>                             
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-2 col-lg-2">
                <div class="thumbnail">                    
                    <div class="caption">
                        <h3><?php _t("Invoices"); ?></h3>
                        <p><?php _t('Invoices list'); ?></p>
                        <p>
                            <a href="index.php?c=invoices" class="btn btn-primary" role="button"><?php _t("List"); ?></a>                             
                        </p>
                    </div>
                </div>
            </div>



        </div>









    </div>
</div>

<?php include view("home", "footer"); ?> 
