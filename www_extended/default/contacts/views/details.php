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
# Fecha de creacion del documento: 2024-09-29 09:09:33 
#################################################################################
?>
<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("contacts", "izq_details"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
        <h3>
            <?php _menu_icon("top", 'contacts'); ?>
            <?php echo contacts_formated($id); ?>
        </h3>
        <hr>

        <?php
        // si el owner_id esta en la lista de mis oficinas 

        $offices_list = (offices_list_by_headoffice($u_owner_id));

        $office = contacts_field_id('owner_id', $id);

        // Verifica si el owner_id está en la lista de oficinas
        $found = false;
        foreach ($offices_list as $item) {
            if ($item['id'] == $office) {
                $found = true;
                break;
            }
        }
        ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php //include view("contacts", "form_details", $arg = ["redi" => 1]);  ?>


    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

        <?php include view("contacts", "der_contact"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
