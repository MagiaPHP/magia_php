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
# Fecha de creacion del documento: 2024-09-04 08:09:04 
#################################################################################
?>


<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'doc_sections'); ?>
            <?php echo _t("Doc_sections"); ?>
    </a>
    <a href="index.php?c=doc_sections" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "doc_sections", "create")) { ?>
        <a href="index.php?c=doc_sections&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>