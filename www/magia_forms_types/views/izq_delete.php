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
# Fecha de creacion del documento: 2024-08-31 17:08:11 
#################################################################################
?>

                
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'magia_forms_types'); ?>
            <?php echo _t("Magia_forms_types"); ?>
    </a>
    <a href="index.php?c=magia_forms_types" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "magia_forms_types", "create")) { ?>
        <a href="index.php?c=magia_forms_types&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>