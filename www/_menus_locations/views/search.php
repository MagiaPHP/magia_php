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
<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-lg-2">
 <?php include view("_menus_locations", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <h1><?php _t("_menus_locations"); ?></h1>
        
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include view("_menus_locations","form_search"   , $arg = ["redi" => 1]);?>
        
    </div>
</div>

<?php include view("home", "footer"); ?>
