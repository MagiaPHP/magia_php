<?php
//foreach (panels_search_controller_action_status($c, 'index', 1) as $key => $pscas) {
//    $panel = new Panels();
//    $panel->setPanels($pscas['id']);
//    include $panel->getPanel() . '.php';
//}
?>

<?php if (permissions_has_permission($u_rol, 'config', 'updassssssssssssssssssssssssste')) { ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php _t("Admin panels"); ?>
        </div>
        <div class="panel-body">

            <form method="post" action="index.php">
                <input type="hidden" name="c" value="panels">
                <input type="hidden" name="a" value="ok_show">
                <input type="hidden" name="status" value="1">
                <input type="hidden" name="redi" value="1">


                <div class="form-group">
                    <label for="panel">
                        <?php _t("Panel"); ?>
                    </label>

                    <select class="form-control" name="id" required="">
                        <?php
                        foreach (panels_search_controller_action($c, $a) as $key => $psbca) {
                            echo '<option value="' . $psbca["id"] . '">' . $psbca["panel"] . '</option>';
                        }
                        ?>
                    </select>

                </div>

                <div class="form-group">
                    <label for="order_by"><?php _t("Order by"); ?></label>
                    <input type="number" class="form-control" name="order_by" id="order_by" placeholder="" required="" value="1">
                </div>

                <button type="submit" class="btn btn-default">
                    <?php _t("Add"); ?>
                </button>

            </form>

            <br>

            <?php
//            if (modules_field_module('status', "docu")) {
//                echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__) . '_invoices');
//            }
            ?>




        </div>
    </div>

<?php } ?>





<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _t("Contacts"); ?>
    </a>
    <a href="index.php?c=contacts" class="list-group-item"><?php _t("Contacts"); ?></a>

    <?php
    /**
     *     <a href="index.php?c=clients" class="list-group-item"><?php _t("Clients"); ?></a>
    <a href="index.php?c=providers" class="list-group-item"><?php _t("Providers"); ?></a>
    <a href="index.php?c=employees" class="list-group-item"><?php _t("Employees"); ?></a>
    <a href="index.php?c=hr" class="list-group-item"><?php _t("HR"); ?></a>
     */
    ?>

</div>
















