
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#_delete_along_">
    <span class="glyphicon glyphicon-trash"></span>
    <?php _t("Delete"); ?>
</button>


<div class="modal fade" id="_delete_along_" tabindex="-1" role="dialog" aria-labelledby="_delete_along_Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="_delete_along_Label">
                    <?php _t("Delete item"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <h3>
                    <?php _t("Attention"); ?>
                </h3>

                <p>
                    <?php
                    _t("Are you sure you want to delete this item?");

//                    vardump($modele);
//                    vardump($doc);
//                    vardump($id);
                    ?>
                </p>

            </div>
            <div class="modal-footer">



                <a class="btn btn-danger"


                   <?php
//  ex.php?c=doc_models_lines&a=ok_delete&id=2913             &redi[redi]=4&redi[c]=doc_models&redi[a]=search&redi[modele]=a                            &redi[doc]=invoices 
                   // http://localhost/factuz/index.php?c=doc_models&a=search&modele=K&doc=payroll
                   // http://localhost/factuz/index.php?c=doc_models&a=edit&id=543
                   // index.php?c=&a= &doc=budgets 
                   ?>
                   href="index.php?c=doc_models_lines&a=ok_delete&ids[]=<?php echo $id; ?>&redi[redi]=5&redi[c]=doc_models_lines&redi[a]=details_by_modele_doc&redi[params]=<?php echo urlencode("doc=$doc"); ?>">
                    <span class="glyphicon glyphicon-trash"></span>
                    <?php _t("Delete"); ?>
                </a>


            </div>
        </div>
    </div>
</div>


