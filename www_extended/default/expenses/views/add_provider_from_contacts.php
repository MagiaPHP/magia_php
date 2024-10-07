<?php
# MagiaPHP 
# file date creation: 2024-01-11 
?>
<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">       
        <?php //include "add_nav.php"; ?>    
    </div>   

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">   



        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php if (modules_field_module('status', 'providers')) { ?>

            <?php if (count(providers_list()) > 0) { ?>
                <ul class="nav nav-tabs">
                    <li role="presentation"><a href="index.php?c=expenses&a=add_provider"><?php _t('Add provider'); ?></a></li>
                    <li role="presentation"><a href="index.php?c=expenses&a=add"><?php _t("My providers"); ?></a></li>
                    <li role="presentation" class="active"><a href="index.php?c=expenses&a=add_provider_from_contacts"><?php _t('My contacts'); ?></a></li>
                </ul>
            <?php }
            ?>  


            <br>
            <br>





            <div class="panel panel-default">
                <div class="panel-body">
                    <p><?php _t("My contacts list"); ?></p>
                    <p><?php _t("Add one of my contacts as a provider"); ?></p>


                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'form_add_contact_like_provider');
                    }


                    include "form_add_contact_like_provider.php";
                    ?>
                </div>
            </div>



            <?php
        } else {
            message('info', 'Module providers is inactived');
        }
        ?>



















    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">     
        <?php // include "add_der.php";    ?>
    </div>


</div>

<?php include view("home", "footer"); ?>
