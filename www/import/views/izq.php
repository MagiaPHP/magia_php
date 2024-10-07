<?php
// crea html 
if (modules_field_module("status", "tasks") && permissions_has_permission($u_rol, "tasks", "read")) {

    $args = array(
        "c" => $c,
        "name" => 'robinson',
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
//if ($c == 'import') {
//    include view('export', "izq");
//}
?>


<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon('top', "import") ?>
        <?php echo _t("Import"); ?>
    </a>


    <a href="index.php?c=import&a=contacts" class="list-group-item">
        <?php _menu_icon('top', "contacts") ?> 
        <?php _t("Import contacts"); ?>
    </a>

    <a href="index.php?c=import" class="list-group-item">
        <?php _menu_icon('top', "import") ?> 
        <?php _t("Import a document"); ?>
    </a>

    <a href="index.php?c=import&a=invoices" class="list-group-item">
        <?php _menu_icon('top', "import") ?> 
        <?php _t("Import a invoice"); ?>
    </a>

    <a href="index.php?c=import&a=invoices_check_json" class="list-group-item">
        <?php _menu_icon('top', "import") ?> 
        <?php _t("Invoices Check Json"); ?>
    </a>


</div>