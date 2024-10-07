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
                    message('info', 'At the moment there are no registered comments');
                }
                ?>



                <h1><?php _t("Comments"); ?></h1>
                <p><?php _t("These comments will be printed on the budget (PDF)"); ?></p>
                <?php
                include "form_comments_update.php";
                ?>






                <?php
                /**
                 * 

                  <div>
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php _t("Add comment"); ?></a></li>
                  <li role="presentation"><a href="#save" aria-controls="save" role="tab" data-toggle="tab"><?php _t("Save comment"); ?></a></li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="home">
                  <h1><?php _t("Comments"); ?></h1>
                  <p><?php _t("These comments will be printed on the invoice (PDF)"); ?></p>
                  <?php
                  include "form_comments_update.php";
                  ?>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="save">
                  <h1><?php _t("Comments list"); ?></h1>
                  <p>
                  <?php _t("List of registered comments"); ?>
                  <?php if (permissions_has_permission($u_rol, 'docs_comments', "update")) { ?>
                  <a href="index.php?c=docs_comments"><?php _t("edit"); ?></a>
                  <?php } ?>
                  </p>
                  <?php
                  //   vardump($c);

                  if (docs_comments_search_by_controller($c)) {
                  include "table_comments_list.php";
                  } else {
                  message('info', 'At the moment there are no registered comments');
                  }
                  ?>
                  </div>
                  </div>
                  </div>


                 */
                ?>

            </div>


        </div>
    </div>
</div>