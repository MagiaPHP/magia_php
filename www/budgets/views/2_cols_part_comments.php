<div class="panel panel-primary">

    <div class="panel-body">

        <h3><?php _t("Comments"); ?></h3>
        <p><?php echo $budget->getComments(); ?></p>


        <?php
//
        if ($budget->getComments()) {


            //Editar
            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_comments_update">
                    <span class="glyphicon glyphicon-pencil"></span> ' . _tr("Edit comments") . '
                </button>';
            //include "modal_form_comments_update.php";
        } else {



            // Agregar
            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_comments_update">
                    <span class="glyphicon glyphicon-plus"></span> ' . _tr("Add comments") . '
                </button>';
            //include "modal_form_comments_update.php";
        }



        include "2_cols_modal_form_comments_update.php";
        ?>




    </div>
</div>