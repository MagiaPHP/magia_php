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
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'comments'); ?>
        <?php echo _t("Comments"); ?>
    </a>
    <a href="index.php?c=comments" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=comments&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>


<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'comments'); ?>
        <?php echo _t("List"); ?>
    </a>
    <a href="index.php?c=comments&a=search&w=doc_id&doc=orders&doc_id=302855" class="list-group-item">302855</a>
    <a href="index.php?c=comments&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

