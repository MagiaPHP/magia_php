<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 17:09:28 
#################################################################################
?>

                
<?php if ($config) { ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <?php
            $magia_forms_lines = new Magia_forms_lines();

            $magia_forms_lines->setMagia_forms_lines($line_id);

            $arg = array(
                "redi" => 5,
                "c" => "veh_vehicle_management",
                "a" => "details",
            );

            include view("magia_forms_lines", "form_edit");
            ?>    
        </div>
    </div>
<?php } ?>


<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'veh_vehicle_management'); ?>
            <?php echo _t("Veh_vehicle_management"); ?>
    </a>
    <a href="index.php?c=veh_vehicle_management" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "veh_vehicle_management", "create")) { ?>
        <a href="index.php?c=veh_vehicle_management&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>