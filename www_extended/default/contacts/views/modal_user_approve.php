<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ok_Approve">
    <span class="glyphicon glyphicon-hourglass"></span> 
    <?php echo _tr("Approve"); ?>
</button>


<div class="modal fade" id="ok_Approve" tabindex="-1" role="dialog" aria-labelledby="ok_ApproveLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ok_ApproveLabel">
                    <?php echo _tr("Atention"); ?>
                </h4>
            </div>

            <div class="modal-body">



                <h3>
                    <span class="glyphicon glyphicon-hourglass"></span>
                    <?php _t("User waiting for approval"); ?>
                </h3>

                <p><?php _t("This user has registered in the system and is waiting to be approved"); ?></p>




                <?php
                include "form_user_approve.php";
                ?>
            </div>



        </div>
    </div>
</div>




