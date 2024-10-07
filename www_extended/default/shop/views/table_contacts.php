<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>


<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">
            <th><?php //_t("Id");      ?></th>                    
            <th><?php _t("Id"); ?></th>                    
            <th><?php _t("Office"); ?></th>
            <th><?php _t("Title"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>                                                     
            <th><?php _t("Orders"); ?></th>                                                                                                               
            <th><?php _t("Birthdate"); ?> </th>                                                                                                               
            <th><?php _t("Age"); ?></th>                                                                                                               
            <th><?php _t("Action"); ?></th>                    
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php //_t("Id");      ?></th>                    
            <th><?php _t("Id"); ?></th>                    
            <th><?php _t("Office"); ?></th>
            <th><?php _t("Title"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>                                                     
            <th><?php _t("Orders"); ?></th>                                                                                                               
            <th><?php _t("Birthdate"); ?> </th>                                                                                                               
            <th><?php _t("Age"); ?></th>                                                                                                               
            <th><?php _t("Action"); ?></th>                    
        </tr>
    </tfoot>

    <tbody>
        <?php
        if (!$contacts) {
            message('info', "Not data");
        }

        foreach ($contacts as $key => $contact) {

            $age = 120;
            ?>                                  

            <tr>
                <td><?php echo contacts_picture($contact["id"]); ?></td>                                  
                <td><?php echo ($contact["id"]); ?></td>                                  
                <td>
                    <a href="index.php?c=shop&a=offices_details&id=<?php echo $contact["owner_id"]; ?>">
                        <?php echo contacts_formated($contact["owner_id"]); ?>
                    </a>
                </td>   

                <td><?php echo $contact["title"]; ?></td>  
                <td>
                    <a href="index.php?c=shop&a=contacts_details&id=<?php echo "$contact[id]"; ?>">
                        <?php echo contacts_formated_name($contact["name"]); ?>
                    </a>
                </td>                                  
                <td>
                    <a href="index.php?c=shop&a=contacts_details&id=<?php echo "$contact[id]"; ?>">
                        <?php echo contacts_formated_name($contact["lastname"]); ?>
                    </a>
                </td>                                                                                  

                <td>
                    <?php
                    $total_orders = orders_total_by_patient_id($contact["id"]);

                    echo ($total_orders) ? $total_orders : "";
                    ?>
                </td> 

                <td>
                    <?php echo ($contact["birthdate"]); ?> 
                    <?php //echo calculaedad($contact["birthdate"]);  ?>
                </td>   

                <td>
                    <?php //echo ($contact["birthdate"]);  ?> 
                    <?php echo calculaedad($contact["birthdate"]); ?>
                </td>   

                <td>
                    <?php /* <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <?php _t("Actions"); ?>
                      <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="index.php?c=shop&a=order_choose_date&contact_id=<?php echo "$contact[id]"; ?>"><?php _t("New order"); ?></a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="index.php?c=shop&a=contacts_details&id=<?php echo "$contact[id]"; ?>"><?php _t("Details"); ?></a></li>
                      <li><a href="index.php?c=shop&a=contacts_update&id=<?php echo "$contact[id]"; ?>"><i class="fas fa-edit"></i> <?php _t("Edit"); ?></a></li>

                      </ul>
                      </div> */ ?>

                    <?php
                    /* <a href="index.php?c=shop&a=contacts_details&id=<?php echo "$contact[id]"; ?>" class="btn btn-default btn-sm"><?php _t("Details"); ?></a>
                      <a href="index.php?c=shop&a=contacts_update&id=<?php echo "$contact[id]"; ?>" class="btn btn-default btn-sm"><?php _t("Edit"); ?></a>

                     */
                    ?>
                    <?php if ($contact["owner_id"] == contacts_work_at($u_id) && $contact['type'] == 0) { ?>
                        <a href="index.php?c=shop&a=ok_order_new_chosse_contact&contact_id=<?php echo "$contact[id]"; ?>" class="btn btn-primary btn-sm">
                            <?php //echo $contact["owner_id"]; ?> <?php _t("New order"); ?> <?php //echo contacts_work_at($u_id); ?>
                        </a>
                    <?php } else { ?>
                        <?php
                        if ($contact['type'] == 1) {
                            _t("Is a office");
                        }

                        if ($contact['type'] == 0) {
                            _t("This contact is not in my office");
                        }
                        ?>
                    <?php } ?>
                </td>



            </tr>
        <?php } ?>                                               
    </tbody>                                               
</table>

<?php
$pagination->createHtml();
?>