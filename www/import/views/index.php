<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("import", "izq"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
        <?php // include view("import", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>




        <div class="row">
            <div class="col-sm-6 col-md-2">
                <div class="thumbnail">
                    <img src="..." alt="...">
                    <div class="caption">
                        <h3>
                            <?php _menu_icon('top', "contacts") ?>
                            <?php _t("Contacts"); ?>
                        </h3>
                        <p>
                            <?php echo _t("Import contacts"); ?>
                        </p>
                        <p>
                            <a href="index.php?c=import&a=contacts" class="btn btn-primary" role="button">
                                <?php _t("Import"); ?>
                            </a> 
                            
                            <a href="#" class="btn btn-default" role="button">
                                <?php _t("Help"); ?>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>











    </div>
</div>

<?php include view("home", "footer"); ?> 

