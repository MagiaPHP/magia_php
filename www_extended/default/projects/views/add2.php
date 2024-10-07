<?php
# MagiaPHP 
# file date creation: 2024-02-01 
?>
<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("projects", "izq_add"); ?></div>

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'projects'); ?>
            <?php _t("Add projects"); ?>
        </h1>

        <ul class="nav nav-tabs">
            <li role="presentation"  class="active">
                <a href="index.php?c=invoices&a=add">
                    <span class="glyphicon glyphicon-th-list"></span>
                    <?php _t("My contacts"); ?>
                </a>
            </li>
            <li role="presentation"><a href="index.php?c=invoices&a=add_company">
                    <span class="glyphicon glyphicon-briefcase"></span>
                    <?php _t("New company"); ?>
                </a>
            </li>
            <li role="presentation"><a href="index.php?c=invoices&a=add_contact">
                    <span class="glyphicon glyphicon-user"></span>
                    <?php _t("New contact"); ?>
                </a>
            </li>
        </ul>




        <?php include "form_add.php"; ?>



        <?php // include view("projects", "form_add", $arg = ["redi" => 1]); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("projects", "der_add"); ?>

    </div>
</div>

<?php include view("home", "footer"); ?>

