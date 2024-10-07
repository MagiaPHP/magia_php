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


            <ul class="nav nav-tabs">
                <li role="presentation"><a href="index.php?c=expenses&a=add_provider"><?php _t('Add provider'); ?></a></li>

                <li role="presentation" class="active"><a href="index.php?c=expenses&a=add"><?php _t("My providers"); ?></a></li>
                <li role="presentation"><a href="index.php?c=expenses&a=add_provider_from_contacts"><?php _t('My contacts'); ?></a></li>

            </ul>


            <?php if (permissions_has_permission($u_rol, 'config', 'update')) { ?>
                <br><br>
                <a href="index.php?c=config&a=ok_expenses_form_add&data=l&redi[redi]=2"><?php echo icon("list"); ?></a>
                <a href="index.php?c=config&a=ok_expenses_form_add&data=s&redi[redi]=2"><?php echo icon("minus"); ?></a>
            <?php } ?>

            <br>
            <br>
            <?php
            switch (_options_option('expenses_form_add')) {
                case 's':
                    include 'form_add_short.php';
                    break;
                case 'l':
                    include 'form_add_largo.php';
                    break;

                default:
                    include 'form_add_largo.php';
                    break;
            }
            ?>



            <?php
        } else {
            message('info', 'Module providers is inactived');
        }
        ?>



    </div>

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">     
        <?php // include "add_der.php";      ?>
    </div>


</div>

<?php include view("home", "footer"); ?>
