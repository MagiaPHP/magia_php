<a type="button" data-toggle="modal" data-target="#payment_delete_<?php echo $btl->getId(); ?>">
    <?php echo icon("trash"); ?>
</a>


<div class="modal fade" id="payment_delete_<?php echo $btl->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="payment_delete_<?php echo $btl->getId(); ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="payment_delete_<?php echo $btl->getId(); ?>Label"><?php _t("Cancel"); ?></h4>
            </div>
            <div class="modal-body">


                <h3>
                    <?php _t("Cancel this transation"); ?>
                </h3>

                <?php echo $btl->getId(); ?>

            </div>

            <div class="modal-footer">                                
                <a 
                    class="btn btn-danger" 
                    href="index.php?c=banks_transactions&a=ok_cancel&id=<?php echo $btl->getId(); ?>&redi[redi]=5&redi[c]=hr_payroll&redi[a]=payment&redi[params]=<?php echo urlencode("id=$id"); ?>"><?php echo _tr("Cancel"); ?></a>                
            </div>



        </div>
    </div>
</div>