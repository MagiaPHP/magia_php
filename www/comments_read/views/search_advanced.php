
<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">        
        <?php include view("comments_read", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">

        <h1>
            <?php _menu_icon("top", 'comments_read'); ?>
            <?php _t("Comments_read Search advanced"); ?>
        </h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php include view("comments_read", "form_search_advanced"); ?>


    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">       
        <?php include view("comments_read", "der"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>

