<form action="index.php" method="post" class="form-horizontal" >
    <input type="hidden" name="c" value="budgets"> 
    <input type="hidden" name="a" value="ok_add_budget_to_invoice"> 
    <input type="hidden" name="budget_id" value="<?php echo "$id"; ?>"> 


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><?php _t("Invoice id"); ?></th>
                        <th><?php _t("Date"); ?></th>

                        <th><?php _t("Status"); ?></th>
                    </tr>
                </thead>

                <?php
                // lista de facturas por sede, mensual, status xxx, 
                foreach ($montly_invoices as $key => $invoice) {
                    ?>

                    <tr>
                        <td> 
                            <div class="radio">
                                <label>
                                    <input type="radio" name="invoice_id" id="invoice_id" value="<?php echo "$invoice[id]"; ?> ">
                                    <?php echo "$invoice[id]"; ?>                                     
                                </label>
                            </div>
                        </td>

                        <td><?php echo "$invoice[date_registre] "; ?> </td>

                        <td><?php echo invoice_status_by_status($invoice['status']); ?></td>

                    </tr>



                <?php } ?>


            </table>
        </div>
    </div>

    <button type="submit" class="btn btn-primary"><?php _t("Yes, add in this invoice"); ?></button>

</form>