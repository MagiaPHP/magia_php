Client_id y sede debe ser el mismo
<?php
// para verificar si las facturas se estan creando con las sedes
?>
<table class="table table-striped">
    <thead>
        <tr> 
            <th>
                <?php _t("Id"); ?>
            </th>
            <th><?php _t("Client_id"); ?></th>
            <th>Sede</th>
            <th>check</th>

        </tr>
    </thead>
    <tfoot>


    </tfoot>
    <tbody>
        <?php
        if (!isset($invoices)) {
            message("info", "No items");
        } else {

            foreach ($invoices as $invoice) {

                if (
                        (int) $invoice['client_id'] != (int) contacts_headoffice_of_contact_id($invoice['client_id'])
                ) {
                    ?>


                    <tr>  
                        <td>
                            <?php echo invoices_numberf($invoice['id']); ?>
                        </td>
                        <td>
                            <?php echo $invoice['client_id'] ?><br>
                            <?php //echo contacts_formated($invoice['client_id']);   ?>
                        </td>
                        <td>
                            <?php echo contacts_headoffice_of_contact_id($invoice['client_id']); ?><br>
                            <?php // echo contacts_formated(contacts_headoffice_of_contact_id($invoice['client_id']));  ?>
                        </td>
                        <td>
                            <?php
                            echo
                            ( (int) $invoice['client_id'] != (int) contacts_headoffice_of_contact_id($invoice['client_id']) ) ?
                                    "Verificar, no concuerda" :
                                    "";
                            ?>
                        </td>
                    </tr>


                    <?php
                }
            }
        }
        ?>

    </tbody>
</table>

