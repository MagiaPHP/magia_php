<?php include view("home", "header"); ?> 

<div class="row">

    <div class="col-sm-2 col-md-2 col-lg-2">
        <?php include "izq_details_contact.php"; ?>
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
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
            }
            ?>

            <?php // _t('Money advance'); ?>

        </h4>


        <?php //vardump($category_code); ?>


        <?php
        include "form_hr_employee_fines_search_from_to.php";
        ?>



        <?php
        if ($hr_employee_fines) {
            include "table_hr_employee_fines.php";
        } else {
            message("info", "No items");
        }
        ?>

    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">        
        <?php
        include "der_hr_employee_fines.php";
        ?>                    
    </div>

</div>
<?php include view("home", "footer"); ?>  
