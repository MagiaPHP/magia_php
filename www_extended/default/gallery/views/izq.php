<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'gallery'); ?>
        <?php echo _t("Gallery"); ?>
    </a>
    <a href="index.php?c=gallery" class="list-group-item"><?php _t("List"); ?></a>
    <?php
    /**
     *     <a href="index.php?c=gallery&a=add" class="list-group-item"><?php _t("Add"); ?></a> 

     */
    ?>
</div>

<div class="panel panel-default">
    <div class="panel-body">

        <h3><?php _t("Add image"); ?></h3>

        <form enctype="multipart/form-data" method="post" action="index.php">
            <input type="hidden" name="c" value="gallery">
            <input type="hidden" name="a" value="ok_add">    
            <input type="hidden" name="notes" value="null">
            <input type="hidden" name="redi" value="2">

            <div class="form-group">
                <label for="file">File</label>
                <input type="file" id="file" name="file">
            </div>  
            <button type="submit" class="btn btn-default"><?php _t("Submit"); ?></button>
        </form>

    </div>
</div>


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

