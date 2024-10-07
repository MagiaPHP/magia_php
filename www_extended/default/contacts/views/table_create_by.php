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
            <th>#</th>
            <th></th>
            <th><?php _t("Order"); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Client ref"); ?></th>
            <th><?php _t("Patient"); ?></th>                                              
            <th><?php _t("Bac"); ?></th>                                            
            <th><?php _t("Status"); ?></th>
        </tr>
    </thead>            


    <tbody>

        <?php
        $i = 1;
        // foreach (orders_list_create_by($id) as $orders_list_by_company_id) {
        foreach ($orders as $orders_list_by_company_id) {
            ?>
            <tr>  

                <td>
                    <?php echo $i++; ?>
                </td>



                <?php ### / SELECT ALL ########################################################  ?>                                                

                <td>
                    <?php
                    /* <div class="checkbox">
                      <label>
                      <input
                      name="order_id[]"
                      type="checkbox"
                      id="<?php echo "$orders_list_by_company_id[id]"; ?>"
                      value="<?php echo "$orders_list_by_company_id[id]"; ?>"
                      checked=""
                      >
                      </label>
                      </div> */
                    ?>
                </td>



                <?php ### SELECT ALL #########################################################  ?>                     

                <td>
                    <a 
                        href="index.php?c=orders&a=details&id=<?php echo $orders_list_by_company_id['id']; ?>"

                        ><?php echo $orders_list_by_company_id["id"]; ?></a>

                </td>

                <td><?php echo $orders_list_by_company_id["date"]; ?></td>
                <td><?php echo $orders_list_by_company_id["client_ref"]; ?></td>


                <td>
                    <a 
                        href="index.php?c=contacts&a=details&id=<?php echo $orders_list_by_company_id['patient_id'] ?>"
                        ><?php echo contacts_formated($orders_list_by_company_id["patient_id"]); ?>
                    </a>
                </td>




                <td><?php echo $orders_list_by_company_id["bac"]; ?></td>                    

                <td>
                    <a 
                        href="index.php?c=orders&a=details&id=<?php echo $orders_list_by_company_id['id']; ?>"
                        class="btn btn-default btn-xs"
                        ><?php echo _t(orders_status_field_code("status", $orders_list_by_company_id['status'])); ?>
                    </a>


                </td>        
            </tr>
        <?php }
        ?>
    </tbody>  
</table>

