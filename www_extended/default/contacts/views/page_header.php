<?php include view("home", "header"); ?>  

<div class="row">

    <?php
    //include "izq.php"; 

    if (substr(users_field_contact_id('language', $u_id), 0, 2) != "ar") {

        echo '<div class="col-sm-2 col-md-2 col-lg-2"> ';

        include "izq.php";

        echo '</div>';
        //
        //
        //
    } else {
        //   include "izq.php"; 
    }

//        if ( contacts_field_id("type" , $id) == 1 ) { // si es una compani
//            include "izq_details_company.php" ;
//        } else {
//            include "izq_details_contact.php" ;
//        }
    ?>                    





    <div class="col-sm-10 col-md-10 col-lg-10">

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

