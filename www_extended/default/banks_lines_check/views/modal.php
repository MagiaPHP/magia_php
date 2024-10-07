


<div class="modal fade" id="myModal_<?php echo $line['id']; ?>_<?php echo $col; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_<?php echo $line['id']; ?>_<?php echo $col; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_<?php echo $line['id']; ?>_<?php echo $col; ?>Label">
                    <?php _t("Update"); ?> ; <?php echo $line['id']; ?>_<?php echo $col; ?>
                </h4>
            </div>
            <div class="modal-body">


                <p>
                    <?php
                    _t("You are going to change this information, are you sure?");

                    //var_dump($line[$col]); 
                    ?>
                </p>

                <form method="get" action="index.php">

                    <input type="hidden" name="c" value="banks_lines_check">
                    <input type="hidden" name="a" value="ok_fields_update">
                    <input type="hidden" name="field" value="<?php echo $col; ?>">

                    <input type="hidden" name="id[]" value="<?php echo $line['id']; ?>">

                    <input type="hidden" name="redi[redi]" value="2">
                    <input type="hidden" name="redi[account_number]" value="<?php echo $account_number; ?>">


                    <div class="form-group">
                        <label for="value"><?php _t("New data for"); ?>: <?php echo $col; ?></label>

                        <textarea class="form-control" name="new_data" required="" rows="5"><?php echo $line[$col]; ?></textarea>

                    </div>


                    <button type="submit" class="btn btn-default">
                        <?php echo icon("ok"); ?> 
                        <?php _t("Update"); ?>
                    </button>
                </form>



            </div>

            <div class="modal-footer">
                <a class="btn btn-danger" href="index.php?c=banks_lines_check&a=ok_fields_update&id[]=<?php echo $line['id']; ?>&field=<?php echo $col; ?>&new_data=null&redi[redi]=2&redi[account_number]=<?php echo $account_number; ?>"><?php _t("Delete"); ?></a>
            </div>


        </div>
    </div>
</div>