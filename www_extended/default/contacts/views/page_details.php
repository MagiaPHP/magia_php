<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-sm- col-md-2 col-lg-2">
        <?php
        include "izq.php";
        ?>
    </div>
    
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

        <?php //include view("contacts" , "nav") ;   ?>    

        <h3>
            <?php _t("Details"); ?> : 
            <?php echo contacts_formated($id); ?>    
        </h3>


    </div>


    <div class="col-sm-3 col-md-3 col-lg-3"> 
        <?php include "izq.php"; ?>
    </div>



</div>




<?php include view("home", "footer"); ?>  
