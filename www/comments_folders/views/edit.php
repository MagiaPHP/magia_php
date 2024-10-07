
<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">       
        <?php include view("comments_folders", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">

        <h1>
            <?php _menu_icon("top", 'comments_folders'); ?>
            <?php _t("Comments_folders edit"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include view("comments_folders", "form_edit"); ?>

    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">


        <?php // include view("comments_folders", "der"); ?>

    </div>
</div>

<?php include view("home", "footer"); ?>

