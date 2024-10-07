<div class="modal fade" id="modal_form_comments_update" tabindex="-1" role="dialog" aria-labelledby="modal_form_comments_updateLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_form_comments_updateLabel"><?php _t("Comments"); ?></h4>
            </div>
            <div class="modal-body">

                <?php
                if (docs_comments_search_by_controller($c)) {
                    include "table_comments_list.php";
                } else {
                    // message('info', 'At the moment there are no registered comments');
                }
                ?>

                <h4><?php _t("Add a comment"); ?></h4>
                <p><?php _t("These comments will be printed on the invoice (PDF)"); ?></p>
                <?php
                include "form_comments_update.php";
                ?>
            </div>
        </div>
    </div>
</div>