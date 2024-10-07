<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php //include view("balance", "izq"); ?></div>

    <div class="col-sm-6 col-md-6 col-lg-6">

        <h1>
            <?php _menu_icon("top", 'balance'); ?>
            <?php _t("Add balance"); ?>
        </h1>



        <p>Que deseas pagar?</p>

        <div class="row">

            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="..." alt="...">
                    <div class="caption">
                        <h3>
                            <?php _t("Pagos Vencidos"); ?>
                        </h3>
                        <p>
                            Son los mas urgentes, pagos que olvidaste pagar
                        </p>
                        <p>
                            <a href="#" class="btn btn-primary" role="button">Button</a> 
                            <a href="#" class="btn btn-default" role="button">Button</a>
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="..." alt="...">
                    <div class="caption">
                        <h3>
                            <?php _t("Proximos"); ?>
                        </h3>
                        <p>
                            Los pagos que se venceran en :
                        </p>
                        <p>
                            <a href="#" class="btn btn-primary" role="button"><?php _t("3 Days"); ?></a> 
                            <a href="#" class="btn btn-primary" role="button"><?php _t("7 Days"); ?></a> 
                            <a href="#" class="btn btn-primary" role="button"><?php _t("15 Days"); ?></a> 

                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="..." alt="...">
                    <div class="caption">
                        <h3>
                            <?php _t("Por empresa"); ?>
                        </h3>
                        <p>
                            Lista los pagos segun la empresa
                        </p>
                        <p>
                            <a href="#" class="btn btn-primary" role="button"><?php _t("3 Days"); ?></a> 
                            <a href="#" class="btn btn-primary" role="button"><?php _t("7 Days"); ?></a> 
                            <a href="#" class="btn btn-primary" role="button"><?php _t("15 Days"); ?></a> 

                        </p>
                    </div>
                </div>
            </div>


        </div>




        <?php include view("balance", "form_add"); ?>


    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">

        <?php // include view("balance", "der"); ?>

    </div>
</div>



<?php include view("home", "footer"); ?>

