<?php include view("home", "header"); ?> 

<div class="row">

    <div class="col-sm-2 col-md-2 col-lg-2">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-sm-7 col-md-7 col-lg-7">

        <?php // include view("contacts", "nav_system"); ?>  
        <?php
        if ($_REQUEST && $a) {
            foreach ($error as $key => $value) {
                message("warning", "$value");
            }
        }
        ?>

        <?php
        if ((isset($smst) && $smst != false ) && (isset($smst) && $smst != false)) {
            message($smst, $smsm);
        }
        ?>

        <?php
        // si es empleado aparece esto 
        include view('hr', 'tabs_hr');
        ?>

        <h4>
            <?php
            ########################################################################
            ########################################################################
            # L I C E N S E S 
            ########################################################################
            ########################################################################


            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
            }
            ?>
            <?php _t("Driver's license"); ?>
        </h4>



        <?php
        if ($veh_drivers) {
            include "table_veh_drivers.php";
        } else {
            message('info', 'No items');
        }
        ?>


        <h4>
            <?php echo icon("car", 'f'); ?>
            <?php _t("List of vehicles assigned to this worker"); ?>

        </h4>





        <?php
        if ($veh_drivers) {

            include "table_veh_vehicles_drivers.php";
        } else {
            message('info', 'No items');
        }
        ?>




    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">        
        <?php
        include "der_veh_vehicles_drivers.php";
        ?>                    
    </div>

</div>
<?php include view("home", "footer"); ?>  
