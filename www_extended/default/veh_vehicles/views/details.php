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
# Fecha de creacion del documento: 2024-08-30 13:08:04 
#################################################################################
?>
<?php include view("home", "header"); ?> 


<?php include view("veh_vehicles", "nav"); ?>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        
        <?php include view("veh_vehicles", "izq_details"); ?>
        
    </div>

    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">

        <?php include view('veh', 'tabs'); ?>

        <h1>
            <?php _menu_icon("top", 'veh_vehicles'); ?>
            <?php _t("Veh_vehicles details"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php include view("veh_vehicles", "form_details", $arg = ["redi" => 1]); ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

        <?php include view("veh_vehicles", "der_details"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
