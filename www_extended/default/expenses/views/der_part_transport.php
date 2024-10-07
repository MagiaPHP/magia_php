
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">

            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, 'transport', array('c' => $c, 'a' => $a, 'id' => $id));
            }
            ?>


            <?php _menu_icon('top', 'transport'); ?>
            <?php _t("Transport"); ?></h3>
    </div>
    <div class="panel-body">




        <table class="table table-striped">

            <?php if ($code_transport_in_invoice) { ?>
                <tr>
                    <td><?php _t('Transport'); ?></td>
                    <td><?php
                        foreach ($code_transport_in_invoice as $key => $value) {
                            echo "$value ";
                        };
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>





            <?php if (permissions_has_permission($u_rol, 'budgets', "update")) { ?>
                <form class="form-horizontal" action="index.php" method="post" >
                    <input type="hidden" name="c" value="invoices">
                    <input type="hidden" name="a" value="ok_transport_add">
                    <input type="hidden" name="invoice_id" value="<?php echo $id; ?>">
                    <input type="hidden" name="redi" value="5">
                    <tr>
                        <td>
                            <select class="form-control" name="transport_code" id="transport_code">
                                <?php foreach (transport_list() as $key => $transport) { ?>
                                    <option value="<?php echo "$transport[code]" ?>">
                                        <?php echo "$transport[name] - " . monedaf($transport['price']); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Add"); ?>">
                        </td>
                    </tr>
                </form>

                <?php
            }
            ?>




        </table>


    </div>
</div>
