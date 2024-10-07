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
# Fecha de creacion del documento: 2024-09-18 03:09:07 
#################################################################################
?>
<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-lg-2">
 <?php include view("cv_motivation_letter", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <h1><?php _t("cv_motivation_letter"); ?></h1>
        
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include view("cv_motivation_letter","form_search"   , $arg = ["redi" => 1]);?>
        
    </div>
</div>

<?php include view("home", "footer"); ?>
