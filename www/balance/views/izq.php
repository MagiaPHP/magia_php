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

/**
 * 
  <div class="panel panel-default">
  <div class="panel-heading">
  <?php _menu_icon("top", "balance"); ?>
  <?php _t("Search"); ?>
  </div>
  <div class="panel-body">
  <?php include view("balance", "form_search"); ?>
  </div>
  </div>
 */
?>