<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;

    }
</style>


<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
}
?>




<table class="table table-striped table-condensed table-bordered">
    <thead>
        <tr class="info">      
            <th><?php _t("Invoice"); ?></th>
            <th><?php _t("Budget"); ?></th>
            <th><?php _t("Credit note"); ?></th>
            <th><?php _t("Date registre"); ?></th>                    
            <th><?php _t("Cliente"); ?></th>                    
            <th class="text-right"><?php _t("Total"); ?></th>
            <th class="text-right"><?php _t("Advance"); ?></th>
            <th class="text-right"><?php _t("Solde"); ?></th>                                        
            <th><?php _t("Reminders"); ?></th>
            <th><?php _t("Status"); ?></th>                    
            <th><?php _t("Details"); ?></th>                                                                      
            <th><?php _t("Edit"); ?></th>                                                                      
            <th><span class="glyphicon glyphicon-print"></span> </th>                                                                     
            <th><span class="glyphicon glyphicon-floppy-save"></span> </th>                                                                     
        </tr>
    </thead>
    <tfoot>
        <tr>         
            <th><?php _t("Invoice"); ?></th>
            <th><?php _t("Budget"); ?></th>
            <th><?php _t("Credit note"); ?></th>
            <th><?php _t("Date registre"); ?></th>                    
            <th><?php _t("Cliente"); ?></th>                    
            <th class="text-right"><?php _t("Total"); ?></th>
            <th class="text-right"><?php _t("Advance"); ?></th>
            <th class="text-right"><?php _t("Solde"); ?></th>                                        
            <th><?php _t("Reminders"); ?></th>
            <th><?php _t("Status"); ?></th>                    
            <th><?php _t("Details"); ?></th>                                                                      
            <th><?php _t("Edit"); ?></th>                                                                      
            <th><span class="glyphicon glyphicon-print"></span> </th>                                                                     
            <th><span class="glyphicon glyphicon-floppy-save"></span> </th>                                                                     
        </tr>
    </tfoot>    
    <tbody>

        <?php
        $total_total = 0;
        $total_advance = 0;

        // <strike>Este texto aparece tachado</strike> 
        // tachado
        $del = false;

        foreach ($invoices as $invoices_search_by_client_id) {

            if ($invoices_search_by_client_id['status'] != -10 && $invoices_search_by_client_id['status'] != -20) {

                $total_total = $total_total + ($invoices_search_by_client_id['total'] + $invoices_search_by_client_id['tax']);
                $total_advance = $total_advance + $invoices_search_by_client_id['advance'];
            }




            if ($invoices_search_by_client_id['status'] == -10 || $invoices_search_by_client_id['status'] == -20) {

                $del = true;
            }







            $r1 = ($invoices_search_by_client_id['r1']) ? "<span class=\"glyphicon glyphicon-thumbs-down\"></span>" : "";
            $r2 = ($invoices_search_by_client_id['r2']) ? "<span class=\"glyphicon glyphicon-thumbs-down\"></span>" : "";
            $r3 = ($invoices_search_by_client_id['r3']) ? "<span class=\"glyphicon glyphicon-thumbs-down\"></span>" : "";
            ?>


            <tr>
                <td><?php echo invoices_numberf($invoices_search_by_client_id['id']); ?></td>
                <td><a href="index.php?c=budgets&a=details&id=<?php echo "$invoices_search_by_client_id[budget_id]"; ?>"><?php echo "$invoices_search_by_client_id[budget_id]"; ?></a></td>
                <td><?php echo "$invoices_search_by_client_id[credit_note_id]"; ?></td>
                <td><?php echo "$invoices_search_by_client_id[date_registre]"; ?></td>

                <td>
                    <a href="index.php?c=contacts&a=details&id=<?php echo "$invoices_search_by_client_id[client_id]"; ?>"><?php echo contacts_formated($invoices_search_by_client_id['client_id']); ?></a>
                    <br>
                    <?php echo $invoices_search_by_client_id['title']; ?>
                </td>


                <td class="text-right text-strike">
                    <?php echo ($del) ? "<del>" : ""; ?>
                    <?php echo monedaf($invoices_search_by_client_id['total'] + $invoices_search_by_client_id['tax']); ?>
                    <?php echo ($del) ? "</del>" : ""; ?>
                </td>
                <td class="text-right">
                    <?php echo ($del) ? "<del>" : ""; ?>
                    <?php echo monedaf($invoices_search_by_client_id['advance']); ?>
                    <?php echo ($del) ? "</del>" : ""; ?>
                </td>
                <td class="text-right">
                    <?php echo ($del) ? "<del>" : ""; ?>
                    <?php echo monedaf($invoices_search_by_client_id['total'] + $invoices_search_by_client_id['tax'] - $invoices_search_by_client_id['advance']); ?>
                    <?php echo ($del) ? "<del>" : ""; ?>
                </td>


                <td><?php echo "$r1 $r2 $r3"; ?></td>

                <td><?php echo invoice_status_by_status($invoices_search_by_client_id['status']); ?></td>


                <td>                     
                    <a class="btn btn-sm btn-primary" href="index.php?c=invoices&a=details&id=<?php echo "$invoices_search_by_client_id[id]"; ?>">
                        <span class="glyphicon glyphicon-file"></span> <?php _t("Details"); ?>
                    </a>
                </td>


                <td>                     
                    <a class="btn btn-sm btn-danger" href="index.php?c=invoices&a=edit&id=<?php echo "$invoices_search_by_client_id[id]"; ?>">
                        <span class="glyphicon glyphicon-edit"></span> <?php _t("Edit"); ?>
                    </a>
                </td>


                <td>                                          
                    <div class="dropdown">
                        <button class="btn btn-sm btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span class="glyphicon glyphicon-print"></span>
                            <?php // _t("Print");     ?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <?php
                            foreach (_languages_list_by_status(1) as $key => $lang) {

                                $icon = ($lang['language'] == contacts_field_id('language', $id)) ? '<span class="glyphicon glyphicon-chevron-right"></span>' : '';
                                ?>
                                <li><a href="index.php?c=invoices&a=export_pdf&id=<?php echo $invoices_search_by_client_id['id']; ?>&lang=<?php echo $lang['language']; ?>" target="_print">
                                        <?php echo $icon; ?>
                                        <?php echo _t($lang['name']); ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </td>
                <td>                                          
                    <div class="dropdown">
                        <button class="btn btn-sm btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span class="glyphicon glyphicon-floppy-save"></span>                                
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <?php
                            foreach (_languages_list_by_status(1) as $key => $lang) {
                                $icon = ($lang['language'] == contacts_field_id('language', $id)) ? '<span class="glyphicon glyphicon-chevron-right"></span>' : '';
                                ?>
                                <li><a href="index.php?c=invoices&a=export_pdf&way=pdf&id=<?php echo $invoices_search_by_client_id['id']; ?>&lang=<?php echo $lang['language']; ?>" target="_print">
                                        <?php echo $icon; ?>
                                        <?php echo _t($lang['name']); ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </td>
            </tr>




            <?php
            $del = false;
        }
        ?>

        <tr>         
            <td><?php // _t("Invoice");         ?></td>
            <td><?php // _t("Budget");          ?></td>
            <td><?php // _t("Credit note");          ?></td>
            <td><?php // _t("Date registre");          ?></td>                    
            <td><?php // _t("Cliente");          ?></td>                    
            <td class="text-right"><?php echo moneda($total_total); ?></td>
            <td class="text-right"><?php echo moneda($total_advance); ?></td>
            <td class="text-right"><?php echo moneda($total_total - $total_advance); ?></td>                                        
            <td><?php // _t("Reminders");          ?></td>
            <td><?php // _t("Status");          ?></td>                    
            <td><?php // _t("Details");          ?></td>                                                                      
            <td><?php // _t("Edit");          ?></td>                                                                      
            <td><span class="glyphicon glyphicon-print"></span> </td>                                                                     
            <td><span class="glyphicon glyphicon-floppy-save"></span> </td>                                                                     
        </tr>


    </tbody>  
</table>