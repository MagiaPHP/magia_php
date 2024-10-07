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


<?php include view("accounting", "izq"); ?>




<?php
foreach (panels_search_controller_action_status($c, 'index', 1) as $key => $pscas) {
    $panel = new Panels();
    $panel->setPanels($pscas['id']);
    include $panel->getPanel() . '.php';
}
?>
<?php if (permissions_has_permission($u_rol, 'config', 'update') && modules_field_module('status', "panels")) { ?>

    <?php include view('panels', 'panel_form_ok_show') ?>

<?php } ?>


