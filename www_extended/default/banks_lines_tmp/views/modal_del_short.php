<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_del_short<?php echo $col["id"]; ?>">
    <?php echo icon("trash"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="modal_del_short<?php echo $col["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_del_short<?php echo $col["id"]; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_del_short<?php echo $col["id"]; ?>Label">
                    Modal
                </h4>
            </div>
            <div class="modal-body">


                <p>
                    <a href="index.php?c=banks_lines_tmp&a=ok_delete&id=<?php echo $col['id']; ?>&redi[redi]=5&redi[c]=banks_lines&redi[a]=import_check&redi[params]=file=produ-1.csv&account_number=4587445544#"><?php _t("Delete"); ?></a>
                </p>

                <?php
                vardump($col["template"]);
                vardump($col);
                //include view('banks_lines_tmp', 'form_add_short')
                ?>

            </div>


        </div>
    </div>
</div>