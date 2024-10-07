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
            <th><?php _t("Id"); ?></th>                    
            <th><?php _t("Office"); ?></th>


            <th><?php _t("Salutation"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>
            <th><?php _t("Orders"); ?></th>                                                        
            <th><?php _t("Birthdate"); ?></th>                                                        
            <th><?php _t("Age"); ?></th>                                                        
            <th><?php _t("Action"); ?></th>                    
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>                    
            <th><?php _t("Office"); ?></th>


            <th><?php _t("Salutation"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>
            <th><?php _t("Orders"); ?></th>                                                        
            <th><?php _t("Birthdate"); ?></th>                                                        
            <th><?php _t("Age"); ?></th>                                                        
            <th><?php _t("Action"); ?></th>                    
        </tr>
    </tfoot>

    <tbody>
        <?php
        foreach ($patients as $key => $patient) {
            ?>                                  

            <tr>
                <td><?php echo $patient["id"]; ?></td>  
                <td><?php echo contacts_formated($patient["company_id"]); ?></td>  


                <td><?php echo $patient["title"]; ?></td>  
                <td>
                    <a href="index.php?c=shop&a=contacts_details&id=<?php echo "$patient[id]"; ?>">
                        <?php echo contacts_formated_name($patient["name"]); ?>
                    </a>
                </td>                                  
                <td>
                    <a href="index.php?c=shop&a=contacts_details&id=<?php echo "$patient[id]"; ?>">
                        <?php echo contacts_formated_name($patient["lastname"]); ?>
                    </a>
                </td>                                                                                  
                <?php /* <td><?php echo $patient["birthdate"] ; ?></td> */ ?>                          
                <td><?php echo (orders_total_by_patient_id($patient["id"])); ?></td>     


                <td>
                    <?php echo ($patient["birthdate"]); ?> 
                    <?php // echo calculaedad($patient["birthdate"]); ?>
                </td> 


                <td>
                    <?php // echo ($patient["birthdate"]);  ?> 
                    <?php echo calculaedad($patient["birthdate"]); ?>
                </td> 


                <td>
                    <?php /* <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <?php _t("Actions"); ?>
                      <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="index.php?c=shop&a=order_choose_date&contact_id=<?php echo "$patient[id]"; ?>"><?php _t("New order"); ?></a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="index.php?c=shop&a=contacts_details&id=<?php echo "$patient[id]"; ?>"><?php _t("Details"); ?></a></li>
                      <li><a href="index.php?c=shop&a=contacts_update&id=<?php echo "$patient[id]"; ?>"><i class="fas fa-edit"></i> <?php _t("Edit"); ?></a></li>

                      </ul>
                      </div> */ ?>

                    <?php
                    /* <a href="index.php?c=shop&a=contacts_details&id=<?php echo "$patient[id]"; ?>" class="btn btn-default btn-sm"><?php _t("Details"); ?></a>
                      <a href="index.php?c=shop&a=contacts_update&id=<?php echo "$patient[id]"; ?>" class="btn btn-default btn-sm"><?php _t("Edit"); ?></a>
                     * 
                      <a href="index.php?c=shop&a=order_choose_date&contact_id=<?php echo "$patient[id]" ; ?>" class="btn btn-primary btn-sm">
                      <?php _t("New order") ; ?>
                      </a>

                     */
                    ?>



                    <?php if ($patient["company_id"] == contacts_work_at($u_id) && $patient['type'] == 0) { ?>
                        <a href="index.php?c=shop&a=ok_order_new_chosse_contact&contact_id=<?php echo "$patient[id]"; ?>" class="btn btn-primary btn-sm">
                            <?php //echo $contact["owner_id"];  ?> <?php _t("New order"); ?> <?php //echo contacts_work_at($u_id);  ?>
                        </a>
                    <?php } ?>



                </td>

            </tr>
        <?php } ?>                                               
    </tbody>                                               
</table>
<?php
$pagination->createHtml();
?>