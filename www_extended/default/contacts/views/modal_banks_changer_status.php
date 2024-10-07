



<?php if ($banks_list_by_contact_id['status']) { ?>
    <a href="#" data-toggle="modal" data-target="#changerStatus_<?php echo "$banks_list_by_contact_id[id]"; ?>">
        <?php echo icon("eye-open"); ?>
    </a><?php } else { ?>
    <a href="#" data-toggle="modal" data-target="#changerStatus_<?php echo "$banks_list_by_contact_id[id]"; ?>">
        <?php echo icon("eye-close"); ?>

    </a><?php }
    ?>


<div class="modal fade" id="changerStatus_<?php echo "$banks_list_by_contact_id[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="changerStatus_Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="changerStatus_Label">
                    <?php _t("Changer status"); ?>                                        
                </h4>

            </div>

            <div class="modal-body">


                <p>
                    <?php _t("Change status"); ?>
                </p>

                <?php if ($banks_list_by_contact_id['status']) { ?>
                    <a href="index.php?c=banks&a=ok_change_status&id=<?php echo $banks_list_by_contact_id['id']; ?>&status=0&redi[redi]=5&redi[c]=contacts&redi[a]=banks&redi[params]=id=<?php echo $id; ?>&#" class="btn btn-danger"><?php echo icon("eye-close"); ?> <?php _t("Deactivate"); ?></a>
                <?php } else { ?>
                    <a href="index.php?c=banks&a=ok_change_status&id=<?php echo $banks_list_by_contact_id['id']; ?>&status=1&redi[redi]=5&redi[c]=contacts&redi[a]=banks&redi[params]=id=<?php echo $id; ?>&#" class="btn btn-primary"><?php echo icon("eye-open"); ?> <?php _t("Activate"); ?></a>
                <?php }
                ?>

            </div>


        </div>
    </div>
</div>