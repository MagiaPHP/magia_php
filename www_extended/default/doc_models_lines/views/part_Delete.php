<div class="panel panel-danger">
    <div class="panel-heading">
        <?php _t("Delete"); ?>
    </div>
    <div class="panel-body">

        <p>
            <?php _t("Delete this element from the document"); ?>
        </p>



        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteItem">
            <span class="glyphicon glyphicon-trash"></span>
            <?php _t("Delete"); ?>
        </button>


        <div class="modal fade" id="deleteItem" tabindex="-1" role="dialog" aria-labelledby="deleteItemLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="deleteItemLabel">
                            <?php _t("Delete item"); ?>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <h3>
                            <?php _t("Attention"); ?>
                        </h3>

                        <p>
                            <?php _t("Are you sure you want to delete this item?"); ?>
                        </p>

                    </div>
                    <div class="modal-footer">

                        <a class="btn btn-danger"


                           <?php //  ex.php?c=doc_models_lines&a=ok_delete&id=2913             &redi[redi]=4&redi[c]=doc_models&redi[a]=search&redi[modele]=a                            &redi[doc]=invoices ?>
                           href="index.php?c=doc_models_lines&a=ok_delete&ids[]=<?php echo $id; ?>&redi[redi]=4&redi[c]=doc_models&redi[a]=search&redi[modele]=<?php echo $modele['name']; ?>&redi[doc]=<?php echo $doc; ?>">
                            <span class="glyphicon glyphicon-trash"></span>
                            <?php _t("Delete"); ?>
                        </a>



                    </div>
                </div>
            </div>
        </div>




    </div>
</div>
