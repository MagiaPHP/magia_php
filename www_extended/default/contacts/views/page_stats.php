<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">        
        <?php include view("contacts", 'izq_details'); ?>
    </div>

    
    
    <div class="col-sm-9 col-md-9 col-lg-9">

        <?php //include view("contacts" , "nav_system") ; ?>  

        <h1>Stats</h1>

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
        <div>  

            <h3><?php _t("Contacts"); ?></h3>     

            <ul class="list-group">

                <li class="list-group-item">
                    <span class="badge"><?php echo $contacts['1'] ?></span>
                    <?php _t("Companies"); ?>
                </li>


                <li class="list-group-item">
                    <span class="badge"><?php echo $contacts['0'] ?></span>
                    <?php _t("otros"); ?>
                </li>


                <li class="list-group-item">
                    <span class="badge"><?php echo $contacts['all'] ?></span>
                    <?php _t("Total"); ?>
                </li>
            </ul>




            <h3><?php _t("By title"); ?></h3>     
            <ul class="list-group">                                               
                <?php
                foreach (contacts_title_list() as $key => $value) {
                    echo '<li class="list-group-item">
                                    <span class="badge">' . contacts_total_by_title($value[0]) . '</span>
                                    : ' . $value[0] . '
                                </li> ';
                }
                ?>                                
            </ul>            







            <h3><?php _t("Tva"); ?></h3>     

            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge"><?php echo $contacts['totals']['by_tva']; ?></span>
                    <?php _t("Total tva numbers"); ?>
                </li>              
            </ul>


            <h3><?php _t("By discounts"); ?></h3>     
            <ul class="list-group">                                               
                <?php
                foreach (contacts_discounts_list() as $key => $value) {
                    echo '<li class="list-group-item">
                                    <span class="badge">' . contacts_total_by_discount($value[0]) . '</span>
                                    ' . $value[0] . ' %
                                </li> ';
                }
                ?>                                
            </ul>




        </div>


    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">        
        <?php
        // include "der_system.php" ;
        ?>                    
    </div>

</div>
<?php include view("home", "footer"); ?>  
