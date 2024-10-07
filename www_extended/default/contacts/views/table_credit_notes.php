<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;

    }
</style>

<table class="table table-striped table-condensed table-bordered">
    <thead>
        <tr class="info">         
            <th><?php _t("Id"); ?></th>                              
            <th><?php _t("Registre date"); ?></th>                    
            <th><?php _t("Invoice"); ?></th>                    
            <th><?php _t("Client"); ?></th>                    
            <th class="text-right"><?php _t("Total"); ?></th>                                                                                                                    
            <th class="text-right"><?php _t("Returned"); ?></th>                                                            
            <th class="text-right"><?php _t("To returned"); ?></th>                                                            
            <th><?php _t("Status"); ?></th>                    
            <th><?php _t("Details"); ?></th>
            <?php if (permissions_has_permission($u_rol, "credit_notes", "update")) { ?><th><?php _t("Edit"); ?></th><?php } ?>                                                                                                  
            <th><span class="glyphicon glyphicon-print"></span> <?php // _t("Print");                                            ?></th>                                                                                                                                     
            <th><span class="glyphicon glyphicon-floppy-save"></span> <?php // _t("Save");                                            ?></th>                                                                                                                                                 
        </tr>
    </thead>
    <tfoot>
        <tr>         
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Registre date"); ?></th>  
            <th><?php _t("Invoice"); ?></th>
            <th><?php _t("Client"); ?></th>                    
            <th class="text-right"><?php _t("Total"); ?></th>                                                                                                                    
            <th class="text-right"><?php _t("Returned"); ?></th>                                                            
            <th class="text-right"><?php _t("To returned"); ?></th>                                                            
            <th><?php _t("Status"); ?></th>                    
            <th><?php _t("Details"); ?></th>        
            <?php if (permissions_has_permission($u_rol, "credit_notes", "update")) { ?><th><?php _t("Edit"); ?></th><?php } ?>                               


            <th><span class="glyphicon glyphicon-print"></span> <?php // _t("Print");                                            ?></th>                                                                                                                                     
            <th><span class="glyphicon glyphicon-floppy-save"></span> <?php // _t("Save");                                            ?></th>                             
        </tr>
    </tfoot>
    <tbody>





        <?php
        if (!isset($credit_notes)) {
            message("info", "No items");
        } else {
            //foreach ($liste_info as $address) {

            $sumaTotal = 0;
            $sumaTax = 0;
            $month_actual = null;
            $month = null;

            foreach ($credit_notes as $credit_note) {

                $sumaTotal = $sumaTotal + $credit_note['total'];
                $sumaTax = $sumaTax + $credit_note['tax'];

                //$invoice_id = credit_notes_invoices_search_invoice_by_credit_note_id($credit_note['id']) ;

                $month_actual = magia_dates_get_month_from_date($credit_note['date_registre']);
                ?>

                <?php
                if ($month_actual != $month) {
                    $month = $month_actual;
                    ?>            
                    <tr>
                        <td colspan="14"><b>
                                <?php echo _tr(magia_dates_month($month_actual)); ?></b></td>
                    </tr>
                <?php } ?>              
                <tr>

                    <td><a href="index.php?c=credit_notes&a=details&id=<?php echo "$credit_note[id]"; ?>"><?php echo "$credit_note[id]"; ?></a></td>



                    <td><?php echo "$credit_note[date_registre]"; ?></td>


                    <td><a href="index.php?c=invoices&a=details&id=<?php echo "$credit_note[invoice_id]"; ?>"><?php echo "$credit_note[invoice_id]"; ?></a></td>



                    <td>
                        <a href="index.php?c=contacts&a=details&id=<?php echo $credit_note['client_id']; ?>">
                            <?php echo contacts_formated($credit_note['client_id']); ?>
                        </a>
                    </td>

                    <td class="text-right"><?php echo moneda($credit_note['total'] + $credit_note['tax']); ?></td>
                    <td class="text-right"><?php echo moneda($credit_note['returned']); ?></td>
                    <td class="text-right"><?php echo moneda(($credit_note['total'] + $credit_note['tax']) - $credit_note['returned']); ?></td>

                    <td><?php echo _tr(credit_notes_status_by_status(($credit_note['status']))); ?></td>




                    <td>
                        <a class="btn btn-primary btn-sm" href="index.php?c=credit_notes&a=details&id=<?php echo "$credit_note[id]"; ?>">
                            <span class="glyphicon glyphicon-file"></span>
                            <?php _t("Details"); ?>
                        </a>
                    </td>

                    <?php if (permissions_has_permission($u_rol, "credit_notes", "update")) { ?>
                        <td>
                            <a 
                                class="btn btn-danger btn-sm" 
                                href="index.php?c=credit_notes&a=edit&id=<?php echo "$credit_note[id]"; ?>"
                                <?php echo (!credit_notes_can_be_edit($credit_note["id"])) ? " disabled " : ""; ?>
                                >
                                <span class="glyphicon glyphicon-edit"></span>
                                <?php _t("Edit"); ?>
                            </a>
                        </td>

                    <?php } ?>

                    <td>

                        <?php
                        print_dropdown("index.php?c=credit_notes&a=export_pdf&id=$credit_note[id]", credit_notes_field_id('client_id', $credit_note['id']), false);
                        ?>
                    </td>

                    <td>

                        <?php
                        print_dropdown("index.php?c=credit_notes&a=export_pdf&way=pdf&id=$credit_note[id]", credit_notes_field_id('client_id', $credit_note['id']), false, 'glyphicon glyphicon-floppy-save');
                        ?>
                    </td>

                </tr>

                <?php
            }
        }
        ?>	



    </tbody>


</table>