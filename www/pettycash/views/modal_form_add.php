

<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#pettycash_add_">
    <span class="glyphicon glyphicon-plus"></span> 
    <?php _t("Add new"); ?>
</button>


<div class="modal fade" id="pettycash__add_" tabindex="-1" role="dialog" aria-labelledby="pettycash_add_Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="pettycash_add_Label"> <?php _t("Add"); ?></h4>
            </div>
            <div class="modal-body">
                <?php
                $redi = 1;
                include views("pettycash", "form_add", $arg = ["redi" => 1]);
                $redi = "";
                ?>
            </div>



        </div>
    </div>
</div>


