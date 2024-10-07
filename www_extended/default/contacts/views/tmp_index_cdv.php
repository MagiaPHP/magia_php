
<div class="col-sm-6 col-md-3">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="media">                                
                <div class="media-body">                    

                    <h4 class="media-heading">
                        <?php echo contacts_formated(contacts_field_id('owner_id', $contact["id"])); ?>
                    </h4>

                    <p><b><?php echo contacts_formated_name(contacts_field_id('name', $contact["owner_id"])); ?></b></p>

                    <p><?php echo _t("Vat"); ?> : <?php echo contacts_field_id('tva', contacts_field_id('owner_id', $contact["id"])); ?></p>

                    <p>
                        <a 
                            href="index.php?c=contacts&a=details&id=<?php echo contacts_field_id('owner_id', $contact["id"]); ?>" 
                            class="btn btn-primary" 
                            role="button"><?php _t("Details"); ?>
                        </a> 
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>