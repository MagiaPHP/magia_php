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
# Fecha de creacion del documento: 2024-09-16 20:09:49 
#################################################################################
?>

                
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , '_menus_locations'); ?>
            <?php echo _t(" menus locations"); ?>
    </a>
    <a href="index.php?c=_menus_locations" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "_menus_locations", "create")) { ?>
        <a href="index.php?c=_menus_locations&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>