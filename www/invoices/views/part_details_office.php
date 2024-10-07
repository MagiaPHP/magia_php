
<?php
if ($a == "edit") {
    include "modal_contacts_update.php";
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        
        <h3 class="panel-title">
            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, 'part_details_office', array('c' => $c, 'a' => $a, 'id' => $id));
            }
            ?>
            <?php _t("Office"); ?>: <?php echo contacts_formated($inv->getOffice_id()); ?>
        </h3>        
        
    </div>
    <?php if ($inv->getOffice_id() != null) { ?>

        <div class="panel-body">
            <ul class="list-group">                            


                <li class="list-group-item">
                    <a href="index.php?c=contacts&a=details&id=<?php echo $inv->getOffice_id(); ?>">
                        <b>
                            <?php echo contacts_formated($inv->getOffice_id()) ?>
                        </b>                
                    </a>                    
                </li>



                <li class="list-group-item">
                    <b><?php _t("Tva"); ?>: </b>   
                    <?php echo contacts_field_id("tva", $inv->getOffice_id()); ?>
                </li>    
                

                <li class="list-group-item">
                    <b><?php _t("Counter"); ?>: </b>   
                    <?php echo ($inv->getCounter()); ?>
                </li>    
                
                
            </ul>
            
            
        </div>
    <?php } else { ?>
        <div class="panel-body">
            <?php message("info", "This budget has no recipient, add one") ?>

            <?php
            if ($a == "edit") {
                // include "modal_update_details_billing_address.php" ;
            }
            ?>

        </div>

    <?php } ?>


</div>

