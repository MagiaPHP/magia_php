<?php include "header.php"; ?>

<div class="row">
    <div class="col-sx-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("home", "izq"); ?>
    </div>

    <div class="col-sx-12 col-sm-12 col-md-8 col-lg-8">

        <?php include view("home", "nav"); ?>

        <h1>
            <?php _t("FAQ"); ?>
        </h1>



    </div>

    <div class="col-sx-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("home", "der"); ?>
    </div>
</div>



<?php include view("home", "footer_about"); ?> 





<?php include "footer.php"; ?>

