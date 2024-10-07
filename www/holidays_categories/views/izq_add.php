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
# Fecha de creacion del documento: 2024-09-23 21:09:25 
#################################################################################
?>

               
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'holidays_categories'); ?>
            <?php echo _t("Holidays categories"); ?>
    </a>
    <a href="index.php?c=holidays_categories" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "holidays_categories", "create")) { ?>
        <a href="index.php?c=holidays_categories&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>