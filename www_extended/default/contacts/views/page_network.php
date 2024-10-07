<?php include view("home", "header"); ?>  
<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">        
        <?php
        //include "izq.php" ;
//        if ( contacts_field_id("type" , $id) == 1 ) { // si es una compani
//            include "izq_details_company.php" ;
//        } else {
//            include "izq_details_contact.php" ;
//        }
        ?>

        <?php include view("contacts", "izq_index"); ?>                  
    </div>

    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">

        <?php include view("contacts", "top"); ?>


        <?php
        if ($_REQUEST && $a) {
            foreach ($error as $key => $value) {
                message("warning", "$value");
            }
        }

        if (contacts_list_errors_tva()) {
            message('danger', '<a href="index.php?c=contacts&a=check_tva">It seems that there are errors, click here to correct them</a>');
        }
        ?>
        <?php
        if ((isset($smst) && $smst != false ) && (isset($smst) && $smst != false)) {
            message($smst, $smsm);
        }
        ?>
        <?php
//        include "nav.php";
        include "nav2.php";
        ?>  


        <?php
        if ($contacts) {
            include "part_network.php";
        } else {
            message('info', 'No contacts found');
        }
        ?>



    </div>
</div>
<?php include view("home", "footer"); ?>  
