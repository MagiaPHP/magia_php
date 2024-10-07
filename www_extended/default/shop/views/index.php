<?php include view("home", "header"); ?>


<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"> 

        </div>


        <div class="col-xs-12 col-sm-4 col-md-8 col-lg-8"> 

            <h1><?php _t("Welcome"); ?></h1>





            <div class="panel panel-default">
                <div class="panel-body">
                    <h2><?php _t("Hi"); ?>, <?php echo contacts_field_id('name', $u_id); ?></h2>
                    <?php _t("You can now enter your system, use the following data"); ?>
                    <ul>
                        <li><b><?php _t("Web address of your system"); ?></b>: <a href="https://<?php echo $company->getSubdomain_Data('subdomain_domain'); ?>" target="top">https://<?php echo $company->getSubdomain_Data('subdomain_domain'); ?></a></li>
                        <li><?php _t("User"); ?>: ***</li>
                        <li><?php _t("Password"); ?>: ***</li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"> 

            <?php include "der_index.php"; ?>
        </div>

    </div>
</div>

<?php include view("home", "footer"); ?>