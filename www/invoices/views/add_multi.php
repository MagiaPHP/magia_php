<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php // include view("invoices", "izq"); ?>
    </div>

    <div class="col-lg-6">
        <?php //include view("invoices", "nav"); ?><?php //_t("Extended"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Add multiple invoices"); ?></h1>

        <ul class="nav nav-tabs">

            <li role="presentation"   class="active">
                <a href="index.php?c=invoices&a=add">
                    <span class="glyphicon glyphicon-th-list"></span>
                    <?php _t("Multi invoice"); ?>
                </a>
            </li>

            <li role="presentation">
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
                    <?php _t("New private customer"); ?>
                </a>
            </li>

        </ul>

        <?php
        if ($next) {
            include "form_add_multi_next.php";
        } else {
            include "form_add_multi.php";
        }
        ?>




        <div class="col-lg-3">
            <?php //include view("invoices", "der");    ?>
        </div>

    </div>
</div>

<?php include view("home", "footer"); ?> 

