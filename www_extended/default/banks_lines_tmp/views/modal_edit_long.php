<!-- Button trigger modal -->
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_update_long<?php echo $col["id"]; ?>">
    <?php echo icon("refresh"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="modal_update_long<?php echo $col["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_update_long<?php echo $col["id"]; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_update_long<?php echo $col["id"]; ?>Label">
                    <?php _t("Data types"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <p>
                    <?php _t("The current value of this column is"); ?>: <b><?php echo $col['template'] ?></b><br>                    
                </p>

                <?php
//                vardump($col["template"]);
//                vardump($col);
                include view('banks_lines_tmp', 'form_edit_long')
                ?>

            </div>

            <div class="modal-footer">
                <a 
                    class="btn btn-danger" 
                    href="index.php?c=banks_lines_tmp&a=ok_delete&id=<?php echo $col['id']; ?>&redi[redi]=5&redi[c]=banks_lines&redi[a]=import_check&redi[params]=<?php echo urlencode("file=$file&account_number=$account_number") ?>#"><?php _t("Delete"); ?></a>                
            </div>

        </div>
    </div>
</div>