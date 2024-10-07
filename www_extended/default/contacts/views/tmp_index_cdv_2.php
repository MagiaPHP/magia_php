
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
    <div class="thumbnail">
        <img src="<?php echo contacts_picture_src($contact["owner_id"]); ?>" alt="log">
        <div class="caption">
            <h3>
                <?php // echo contacts_formated(contacts_field_id('owner_id', $contact["id"])); ?>
            </h3>


            <p><b><?php echo contacts_formated_name(contacts_field_id('name', $contact["owner_id"])); ?></b></p>

            <p>

                <?php echo icon("earphone"); ?> <?php echo directory_by_contact_name($contact["id"], 'Tel'); ?>
            </p>

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
