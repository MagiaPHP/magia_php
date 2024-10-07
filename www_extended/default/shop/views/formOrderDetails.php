<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">                
    <div class="panel panel-default">

        <div class="panel-heading" role="tab" id="headingTwo">

            <h4 class="panel-title">
                <?php echo $order['patient_id']; ?>
                <a 
                    class="collapsed" 
                    role="button" 
                    data-toggle="collapse" 
                    data-parent="#accordion" 
                    href="#collapseTwo" 
                    aria-expanded="false" 
                    aria-controls="collapseTwo">

                    <span class="glyphicon glyphicon-user"></span> 

                    <?php _t("Pacient"); ?>: 

                    <?php echo contacts_field_id("name", $order['patient_id']); ?> 
                    <?php echo contacts_field_id("lastname", $order['patient_id']); ?>
                    <span class="caret"></span>
                </a>
            </h4>

        </div>

        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">

                <table class="table">
                    <tr>
                        <td><b><?php _t("ID"); ?></b></td><td><?php echo ($order['patient_id']); ?></td>
                    </tr>

                    <tr>
                        <td><b><?php _t("Name"); ?></b></td><td><?php echo contacts_field_id("name", $order['patient_id']); ?></td>
                    </tr>

                    <tr>
                        <td><b><?php _t("Lastname"); ?></b></td><td><?php echo contacts_field_id("lastname", $order['patient_id']); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php _t("Birthdate"); ?></b></td><td><?php echo contacts_field_id("birthdate", $order['patient_id']); ?></td>
                    </tr>                                

                    <?php foreach (directory_list_by_contact_id($order['patient_id']) as $key => $value) { ?>

                        <tr>
                            <td><b><?php _t($value["name"]); ?></b></td><td><?php echo ($value['data']); ?></td>
                        </tr>

                    <?php } ?>

                </table>

                <form action="index.php" method="get">
                    <input type="hidden" name="c" value="shop">
                    <input type="hidden" name="a" value="contacts_details">
                    <input type="hidden" name="id" value="<?php echo $order['patient_id']; ?>">


                    <button type="submit" class="btn btn-primary"><?php _t("More details"); ?></button>
                </form>

            </div>
        </div>
    </div>                
</div>

<?php
/*
  <div class="form-group">
  <label for="client_ref"><?php echo _t("My reference"); ?></label>
  <input type="text" name="client_ref" class="form-control" id="client_ref" placeholder="" value="<?php echo $order['client_ref']; ?>" readonly="">
  </div>
 */
?>

<div class="row">
    <?php //shop_orders_side_list_by_order_id($id);  ?>

    <div class="col-sm-12 col-md-6 col-lg-6">

        <?php
        if (orders_lines_field_id_by_side("id", $id, "R")) {
            $s = "R";
            include "formOrejaDetails.php";
        } else {
            $s = "R";
            include 'formOrejaDetailsEnpty.php';
        }
        ?>                     
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6">

        <?php
        if (orders_lines_field_id_by_side("id", $id, "L")) {
            $s = "L";

            include "formOrejaDetails.php";
            //include "formOrejaDetails2.php";
        } else {
            $s = 'L';
            include 'formOrejaDetailsEnpty.php';
        }
        ?>                                   
    </div>
</div>


<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <?php
        if (orders_lines_field_id_by_side("id", $id, "S")) {
            $s = "S";
            include "formOrejaDetails.php";
        }
        ?>
    </div>        
</div>        


<?php
//vardump($id);
//include "part_scan_files.php";
//include "part_scan_files.php";
//include "part_scan_files.php";
//include "part_scan_files.php";
//include "part_scan_files.php";
//include "part_scan_files.php";
//include "part_scan_files.php";
//include "part_scan_files.php";
//include "part_scan_files.php";
//include "part_scan_files.php";
?>




<div class="row">
    <?php //shop_orders_side_list_by_order_id($id);  ?>
    <div class="col-sm-12 col-md-6 col-lg-6">
        <?php
        addresses_show_panel($order['address_billing']);
        ?>
    </div>            
    <div class="col-sm-12 col-md-6 col-lg-6">
        <?php
        addresses_show_panel($order['address_delivery']);
        ?>
    </div>
</div>




<h3><?php _t("Comments"); ?></h3>

<div class="form-group">
    <input type="text"  class="form-control"  value="<?php echo $order['comments']; ?>" readonly="">
</div>


