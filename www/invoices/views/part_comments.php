<div class="panel panel-default">
    <div class="panel-body">
        <h3><?php _t("Comments"); ?></h3>

        <p><?php echo $invoices['comments']; ?></p>

        <?php
        if ($invoices['comments']) {
            //Editar
            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_comments_update">
                    <span class="glyphicon glyphicon-edit"></span> ' . _tr("Edit comments") . '
                </button>';

            // include "modal_form_comments_update.php";
            // Borrar un comentario
        } else {
            // Agregar

            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_comments_update">
    <span class="glyphicon glyphicon-plus"></span> ' . _tr("Add comments") . '
</button>';
            // include "modal_form_comments_update.php";
        }

        include "modal_form_comments_update.php";
        ?>

        <br>
        <br>
        <?php
        if (modules_field_module('status', "docu")) {
            echo docu_modal_bloc($c, $a, 'part_comments');
        }
        ?>


    </div>
</div>

