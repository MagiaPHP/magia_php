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



<?php
if (modules_field_module('status', 'panels')) {

    foreach (panels_search_controller_action_status($c, 'index', 1) as $key => $pscas) {
        $panel = new Panels();
        $panel->setPanels($pscas['id']);
        include $panel->getPanel() . '.php';
    }
}
?>



<?php if (permissions_has_permission($u_rol, 'config', 'update') && modules_field_module('status', 'panels')) { ?>
    <div class="panel panel-default ">
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



<?php include view("accounting", "izq"); ?>




<?php if (IS_MULTI_VAT) { ?>
    <div class="list-group ">
        <a href="#" class="list-group-item active">
            <?php _t("Offices"); ?>
        </a>    

        <a href="index.php?c=credit_notes" class="list-group-item"><?php _t("All"); ?></a>

        <?php
        foreach (offices_list_by_headoffice($u_owner_id)as $key => $office) {
            echo '<a href="index.php?c=credit_notes&a=search&w=by_office_id&office_id=' . $office['id'] . '" class="list-group-item">' . contacts_formated($office['id']) . '</a>';
        }
        ?>            
    </div>
<?php } ?>


<div class="panel panel-default shadow-container">
    <div class="panel-heading">
        <?php _t('Search'); ?>
    </div>
    <div class="panel-body">


        <form method="get" action="index.php">

            <input type="hidden" name="c" value="credit_notes">
            <input type="hidden" name="a" value="search">
            <input type="hidden" name="w" value="by_from_to_office_id">
           

            <div class="form-group">
                <label for="from"><?php _t("From"); ?></label>
                <input type="date" class="form-control" name="from" id="from">
            </div>

            <div class="form-group">
                <label for="to"><?php _t("Tos"); ?></label>
                <input type="date" class="form-control" name="to" id="to">
            </div>

            <div class="form-group">
                <label for="to"><?php _t("To"); ?></label>
                <select class="form-control" name="office_id" id="office_id">
                    <?php
                    foreach (offices_list_by_headoffice($u_owner_id)as $key => $office) {
                        echo '<option value="' . $office['id'] . '">' . contacts_formated($office['id']) . '</option>';
                    }
                    ?>   
                </select>
            </div>

            <button type="submit" class="btn btn-default">
                <?php echo icon("ok"); ?> 
                <?php _t("Submit"); ?>
            </button>
        </form>

    </div>
</div>

