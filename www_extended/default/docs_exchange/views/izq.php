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

<div class="panel panel-default">
    <div class="panel-heading">
        Documentos recibidos
    </div>
    <div class="panel-body">

        <form method="get" action="index.php">
            <input type="hidden" name="c" value="docs_exchange">


            <div class="form-group">
                <label for="exampleInputEmail1">Sender</label>
                <select class="form-control">
                    <option>Robinson</option>
                </select>
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">Typo d cocumento</label>
                <select class="form-control">
                    <option>factura</option>
                </select>
            </div>



            <div class="form-group">
                <label for="exampleInputEmail1">Ano</label>
                <select class="form-control">
                    <option>2023</option>
                </select>
            </div>



            <div class="form-group">
                <label for="exampleInputEmail1">Mes</label>
                <select class="form-control">
                    <option>Feb</option>
                </select>
            </div>






            <button type="submit" class="btn btn-default">Submit</button>
        </form>

    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Panel title</h3>
    </div>
    <div class="panel-body">
        Panel content
    </div>
</div>






<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'docs_exchange'); ?>
        <?php echo _t("Docs_exchange"); ?>
    </a>
    <a href="index.php?c=docs_exchange" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=docs_exchange&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>


<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docs_exchange"); ?>
        <?php echo _t("By sender_name"); ?>
    </a>
    <?php
    foreach (docs_exchange_unique_from_col("sender_name") as $sender_name) {
        if ($sender_name['sender_name'] != "") {
            echo '<a href="index.php?c=docs_exchange&a=search&w=by_sender_name&sender_name=' . $sender_name['sender_name'] . '" class="list-group-item">' . $sender_name['sender_name'] . '</a>';
        }
    }
    ?>
</div>





<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docs_exchange"); ?>
        <?php echo _t("By doc_type"); ?>
    </a>
    <?php
    foreach (docs_exchange_unique_from_col("doc_type") as $doc_type) {
        if ($doc_type['doc_type'] != "") {
            echo '<a href="index.php?c=docs_exchange&a=search&w=by_doc_type&doc_type=' . $doc_type['doc_type'] . '" class="list-group-item">' . $doc_type['doc_type'] . '</a>';
        }
    }
    ?>
</div>


<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docs_exchange"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (docs_exchange_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=docs_exchange&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

