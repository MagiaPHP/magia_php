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
# Fecha de creacion del documento: 2024-09-23 11:09:25 
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
                "c" => "expenses",
                "a" => "edit",
            );

            include view("magia_forms_lines", "form_edit");
            ?>    
        </div>
    </div>
<?php } ?>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'expenses'); ?>
            <?php echo _t("Expenses"); ?>
    </a>
    <a href="index.php?c=expenses" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "expenses", "create")) { ?>
        <a href="index.php?c=expenses&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>