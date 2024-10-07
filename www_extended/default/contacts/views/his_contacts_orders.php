<?php include view("home", "header"); ?>  





<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php include "izq_details.php"; ?>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">

        <?php
        //include "nav_details.php"; 
        ?>





        <?php
        if ($_POST && $a == "add") {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h3> <?php echo contacts_field_id("name", $id); ?>, <?php echo strtoupper(contacts_field_id("lastname", $id)); ?>' 



            <?php _t("orders list"); ?></h3>





        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php _t("Order N°"); ?></th>
                    <th><?php _t("Centre auditif"); ?></th>
                    <th><?php _t("Paciente"); ?></th>
                    <?php /* <th><?php _t("Bac"); ?></th> <th><?php _t("Total €"); ?></th> */ ?>
                    <th><?php _t("Date"); ?></th>

                    <th><?php _t("Details"); ?></th>		 					
                    <th><?php _t("Status"); ?></th>		 					

                </tr>
            </thead>
            <tbody>
                <?php
                $order_list = orders_list_by_client_id($id);
                if ($order_list != null) {
                    foreach ($order_list as $orders) {

                        $name = contacts_field_id("name", $orders['client_id']);
                        $lastname = contacts_field_id("lastname", $orders['client_id']);

                        $baccolor = bacs_field_name('color', $orders['bac']);
                        $status = orders_status_field_code("status", $orders['status']);

                        $bgcolor = ($baccolor) ? " $baccolor " : " #FFF ";

                        //$name = users_field_id("name", $orders['client_id']);
                        //$lastname = users_field_id("lastname", $orders['client_id']);

                        echo '<tr>';
                        echo '<td align="left">' . $orders['id'] . '</td>';
                        echo '<td align="left">' . contacts_field_id("name", $orders['client_id']) . '</td>';
                        echo "<td align=\"left\">$name $lastname</td>";
                        // echo "<td align=\"left\" bgcolor=\"$baccolor\">$orders[bac]  </td>";
                        echo '<td align="left" ">' . $orders['date'] . '</td>';

                        // echo '<td align="left">' . $orders['price'] . '</td>';
                        echo '<td align="left"><a href="index.php?c=orders&a=details&id=' . $orders['id'] . '"' . '>Details</td>';
                        echo '<td align="left" ">' . $status . '</td>';
                        //echo '<td align="left" ">' . $orders['status'] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo _tr("You do not have any bought items");
                }
                ?>
            </tbody>
        </table>	    			




    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">

        <?php include "der_details.php"; ?>
    </div>
</div>


<?php include view("home", "footer"); ?>  



