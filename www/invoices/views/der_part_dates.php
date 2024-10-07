<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, 'dates', array('c' => $c, 'a' => $a, 'id' => $id));
            }
            ?>
            <?php _t("Dates"); ?>
        </h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped">


            <tr>
                <td>

                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'date', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>


                    <?php _t("Invoice date"); ?></td>
                <td><?php echo $invoices["date"]; ?></td>
            </tr>
            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'date_expiration', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>


                    <?php _t("Expiration date"); ?></td>
                <td>
                    <?php
                    if ($invoices['date_expiration']) {
                        echo $invoices['date_expiration'];
                        if (permissions_has_permission($u_rol, 'invoices', "update")) {
//                            modal(uniqid(), _tr("Edit expiration date"),
//                                    array("btn" => 'default', "label" => 'Edit'),
//                                    array("c" => 'invoices', "a" => 'form_date_expiration_update'),
//                                    $params = array(
//                                "id" => $id,
//                                "date" => $invoices['date_expiration']
//                                    ), '$rename');
                        } // fin de permisos 
                    } else {
                        if (permissions_has_permission($u_rol, 'invoices', "update")) {
//                            modal(uniqid(), _tr("Add expiration date"),
//                                    array("btn" => 'default', "label" => 'Add'),
//                                    array("c" => 'invoices', "a" => 'form_date_expiration_update'),
//                                    $params = array("id" => $id), '$rename');
                        }
                    }
                    ?>                                      
                </td>        
            </tr>
            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'date_registre', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>


                    <?php _t("Registre date"); ?></td>
                <td><?php echo $invoices["date_registre"]; ?></td>
            </tr>



        </table>
    </div>
</div>