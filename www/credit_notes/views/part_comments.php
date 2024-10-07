<div class="panel panel-primary">
    <div class="panel-body">

        <h3>





            <?php _t("Comments"); ?>
        </h3>
        <p>
            <?php echo $cn->getComments(); ?> 
        </p>

        <?php include "modal_form_comments_update.php"; ?>

        <br>
        <br>

        <?php
        if (modules_field_module('status', "docu")) {
            echo docu_modal_bloc($c, $a, 'comments');
        }
        ?>


    </div>
</div>
