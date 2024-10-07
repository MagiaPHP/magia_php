<script>
    function sellectAll(source) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
</script>


<?php
/**
 * Si es estatus Ready to send, 
 * 
 * 
 * Bloqueamos por el momento para terminar
 */
if ($status == 70 && 1 == 5252525) {
    ?>
    <form class="form-inline" action="index.php" method="post" onsubmit='disableButton()'>
        <input type="hidden" name="c" value="orders">
        <input type="hidden" name="a" value="ok_send_to_make_bill">
        <input type="hidden" name="uniqid" value="<?php echo magia_uniqid(); ?>">


        <?php // include "table_patients_orders.php"; ?>



        <?php message("info", "If you want to change the status of several orders at the same time, the selected ones must have the same delivery address"); ?>



        <input type="hidden" name="redi" value="1">
        <div class="form-group">
            <label class="sr-only" for="all"></label>
            <input 
                type="checkbox" 
                id="all" 
                onclick="sellectAll(this);" 
                checked=""

                />                 
                <?php _t("Select all"); ?>
        </div>



        <div class="form-group">
            <label class="sr-only" for=""></label>
            <select class="form-control" name="add_to">

                <option value="false"><?php _t("Add to delivery note"); ?></option>
                <option value="new"><?php _t("Create a new"); ?></option>


                <?php
                $i = 1;
                foreach (budgets_search_by_client_id_status($id, 10) as $key => $budgets_id) {

                    $date_registre = magia_dates_formated($budgets_id['date_registre']);
                    $total_orders_in_budget = count(orders_budgets_list_orders_by_budget($budgets_id['id']));

                    echo '<option value="' . $budgets_id['id'] . '">' . $budgets_id['id'] . ' - ' . $date_registre . ' (' . $total_orders_in_budget . ')</option>';
                    $i++;
                }
                ?>


            </select>
        </div>

        <?php
        // esto desactiva el boton si se hace clic
        // pongo esto en el footer para desactivar botones en donde sea 
        ?>
        <script>
            //            function disableButton() {
            //              var btn = document.getElementById('btn_send');
            //            btn.disabled = true;
            //          btn.innerText = 'Sending.....'
            }
        </script>

        <button type="submit" id="btn_send" class="btn btn-default"><?php _t("Add"); ?></button>        
        <?php //include "table_contacts_orders.php";   ?>
    </form>
<?php } else { ?>



    <?php //include "table_patients_orders.php";  ?>
    <?php include "table_contacts_orders.php"; ?>



<?php } ?>





<?php
###############################################################################
# Cambia de estatus los pedidos #
# Cambia de estatus los pedidos #
# Cambia de estatus los pedidos #
# Cambia de estatus los pedidos #
# Cambia de estatus los pedidos #
# Cambia de estatus los pedidos #
# Cambia de estatus los pedidos #
# Cambia de estatus los pedidos #
# Cambia de estatus los pedidos #
# Cambia de estatus los pedidos #
# Cambia de estatus los pedidos #
# Cambia de estatus los pedidos #
# Cambia de estatus los pedidos #
# Cambia de estatus los pedidos #
# Cambia de estatus los pedidos #
# Cambia de estatus los pedidos 
# Lo bloqueamos por que solo queremos crar el bon de comande#
if ($status == 70 && 1 == 52020202020202) {
    ?>
    <form class="form-inline" action="index.php" method="post">
        <input type="hidden" name="c" value="orders">
        <input type="hidden" name="a" value="ok_change_status_by_group">
        <input type="hidden" name="redi" value="1">
        <div class="form-group">
            <label class="sr-only" for="all"></label>
            <input 
                type="checkbox" 
                id="all" 
                onclick="sellectAll(this);" />                 
                <?php _t("Select all"); ?>
        </div>

        <div class="form-group">
            <label class="sr-only" for=""></label>
            <select class="form-control" name="new_status">
                <?php
                foreach (orders_status_list() as $key => $status_items) {
                    $selected = ($status_items['code'] == $status) ? " selected " : "";
                    $disabled = ($status_items['code'] == $status) ? " disabled " : "";
                    $total = orders_total_by_company_id_status($id, $status_items['code']);
                    ?>
                    <option value="<?php echo $status_items['code']; ?>" <?php echo $disabled; ?>><?php _t($status_items['status']); ?> <?php //echo ($total) ? "($total)" : "";    ?></option>
                <?php }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-default"><?php _t("Change"); ?></button>        
        <?php // include "table_contacts_orders.php";   ?>
    </form>
<?php } else { ?>
    <?php //include "table_contacts_orders.php";   ?>
<?php } ?>

