        
<table class="table table-striped">           
    <thead>
        <tr>                    
            <th><?php _t("#"); ?></th>    
            <th><?php _t("Office"); ?></th>   
            <th class="text-right"><?php _t("Total orders"); ?></th>   
            <th class="text-right"><?php _t("Total remakes"); ?></th>    
            <th class="text-right"><?php _t("Remakes in %"); ?></th>                          
        </tr>
    </thead>
    <tfoot>

    </tfoot>

    <tbody>
        <?php
        $i = 1;

        if (offices_is_headoffice($office_id)) {
            $remakes = offices_list_by_headoffice($office_id);
        } else {
            $remakes = array(array("id" => $office_id));
        }



        foreach ($remakes as $key => $value) {

            $total_orders = orders_total_by_company_year_month($value['id'], $year, $month);

            $total_remakes = orders_total_remakes_by_company_year_month($value['id'], $year, $month);

            $remakes_in_p = ($total_orders == 0 || $total_remakes == 00 ) ? 0 : ($total_remakes * 100) / $total_orders;
            ?>                                  

            <tr>
                <td>
                    <?php echo $i; ?>
                </td>

                <td>
                    <?php echo $value['id'] . " " . contacts_formated($value['id']); ?>
                </td>



                <td class="text-right">
                    <?php echo $total_orders; ?>
                </td> 



                <td class="text-right">
                    <?php echo $total_remakes; ?>
                </td> 



                <td class="text-right">
                    <?php echo number_format($remakes_in_p, 1); ?>%
                </td> 





            </tr>
            <?php
            $i++;
        }
        ?>                                               
    </tbody>                                               
</table>