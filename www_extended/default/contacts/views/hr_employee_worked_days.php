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
        <?php //include view("contacts" , "nav") ; ?>       


        <?php //include "table_contacts_system.php"; ?>


        <?php include 'hr_tab.php'; ?>


        <?php
        if ($permissions) {
            include "table_hr_employee_worked_days.php";
        } else {
            message('info', 'No items');
        }
        ?>

    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">        
        <?php
        include "der_hr_employee_worked_days.php";
        ?>                    
    </div>

</div>
<?php include view("home", "footer"); ?>  
