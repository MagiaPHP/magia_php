<?php
// crea html 
if (modules_field_module("status", "tasks") && permissions_has_permission($u_rol, "tasks", "read")) {
    $args = array(
        "c" => $c,
        "name" => 'robinson',
        "id" => null,
        "form" => array(
            "category_id" => null,
            "contact_id" => $u_id,
            "controller" => $c,
            "doc_id" => null,
            "redi" => array(
                "redi" => "30",
                "c" => $c,
                "id" => null 
            )
        ),
    );

    tasks_create_html('tmp_izq_index', $args);
}
?>

    
    <?php include view('accounting', 'izq'); ?>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php echo _tr("Banks"); ?>
    </a>

    <a href="index.php?c=balance" class="list-group-item">
        <?php echo icon("list"); ?>    
        <?php _t("All"); ?>
    </a>


    <?php
    foreach (banks_list_by_contact_id($u_owner_id) as $key => $blbci) {

        $bank = new Banks();
        $bank->setBanks($blbci['id']);

        echo '<a href="index.php?c=balance&a=search&w=all&txt=' . $bank->getAccount_number() . '" class="list-group-item">' . $bank->getBank() . ' - ' . $bank->getAccount_number() . '</a>';
    }
    ?>

</div>

<?php
foreach (panels_search_controller_action_status($c, 'index', 1) as $key => $pscas) {
    $panel = new Panels();
    $panel->setPanels($pscas['id']);
    include $panel->getPanel() . '.php';
}
?>


<?php if (permissions_has_permission($u_rol, 'config', 'updatexxxxxxxxxxxxxxx')) { ?>
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



