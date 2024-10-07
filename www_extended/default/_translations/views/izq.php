<?php
//if (modules_field_module("status", "tasks") && permissions_has_permission($u_rol, "tasks", "read")) {
//    foreach (panels_search_controller_action_status($c, 'index', 1) as $key => $pscas) {
//        $panel = new Panels();
//        $panel->setPanels($pscas['id']);
//        include $panel->getPanel() . '.php';
//    }
//}
// hidden for magia
?>

<?php if (permissions_has_permission($u_rol, 'config', 'update')) { ?>

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


        </div>
    </div>

<?php } ?>


<hr>

<a href="index.php?c=_translations&a=tr">Export tr</a>