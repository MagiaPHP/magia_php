<a href="#" 
   data-toggle="modal" 
   data-target="#value_round_<?php echo $prbm->getEmployee_id(); ?>" >
       <?php echo moneda($total_value_round); ?>
</a>

<div class="modal fade" id="value_round_<?php echo $prbm->getEmployee_id(); ?>" tabindex="-1" role="dialog" aria-labelledby="value_round_<?php echo $prbm->getEmployee_id(); ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="value_round_<?php echo $prbm->getEmployee_id(); ?>Label">
                    <?php _t("Update"); ?>
                </h4>
            </div>
            <div class="modal-body">


                <?php
                include 'form_value_round_update.php';
                ?>


                <br>
                <br>

                <?php
//                foreach ($prbm->getTags_list() as $key => $tag) {
//                    echo $tag . '<br>';
//                }
                ?>


            </div>




        </div>
    </div>
</div>