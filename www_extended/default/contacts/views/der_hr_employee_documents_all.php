<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("My workers"); ?>
    </div>
    <div class="panel-body">
        <form class="form-inline" action="index.php" method="get">
            <input type="hidden" name="c" value="contacts">
            <input type="hidden" name="a" value="<?php echo $a; ?>">
            <div class="form-group">
                <label for="id" class="sr-only"><?php _t("Employee"); ?></label>
                <select 

                    class="form-control selectpicker" id="id" data-live-search="true"
                    name="id"
                    >
                        <?php
                        foreach (employees_list_by_company($u_owner_id) as $key => $my_employee) {
                            $my_employee_selected = ($my_employee['contact_id'] == $id) ? " selected " : "";
                            echo '<option value="' . $my_employee['contact_id'] . '"  ' . $my_employee_selected . '>' . contacts_formated($my_employee['contact_id']) . '</option>';
                        }
                        ?>
                </select>
            </div>
            <button type="submit" class="btn btn-default">
                <?php echo icon("refresh"); ?> 
                <?php _t("Change"); ?>
            </button>
        </form>
    </div>
</div>

<?php
if ($a == "details") {


// crea html 
    if (modules_field_module("status", "tasks") && permissions_has_permission($u_rol, "tasks", "read")) {
        $args = array(
            "c" => $c,
            "name" => 'robinson',
            "id" => $id,
            "form" => array(
                "category_id" => null,
                "contact_id" => $u_id,
                "controller" => $c,
                "doc_id" => $id,
                "redi" => array(
                    "redi" => "40",
                    "c" => $c,
                    "id" => $id
                )
            ),
        );

        tasks_create_html('tmp_der_details', $args);
    }
}
?>

