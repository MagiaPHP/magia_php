
<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">        
        <?php include view("credit_notes_counter", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">

        <h1>
            <?php _menu_icon("top", 'credit_notes_counter'); ?>
            <?php _t("Credit_notes_counter Search advanced"); ?>
        </h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php include view("credit_notes_counter", "form_search_advanced"); ?>


    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">       
        <?php include view("credit_notes_counter", "der"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>

