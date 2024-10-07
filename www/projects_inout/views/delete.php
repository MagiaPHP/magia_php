<?php
# MagiaPHP 
# file date creation: 2024-04-02 
?>
<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("projects_inout", "izq_delete"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'projects_inout'); ?>
            <?php _t("Delete projects_inout"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php include view("projects_inout", "form_delete", $arg = ["redi" => 1]); ?>

    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("projects_inout", "der_delete"); ?>
    </div>
</div>
<?php include view("home", "footer"); ?>
