<div class="col-sm-6 col-md-2 ">
    <div class="thumbnail">
        <?php _t("Headoffice"); ?>

        <a href="index.php?c=contacts&a=details&id=<?php echo $contact['id']; ?>">
            <img 
                src="<?php echo contacts_picture_src($contact['id']); ?>" 
                class="img img-responsive">
        </a>

        <div class="caption">

            <p>
                <span class="glyphicon glyphicon-home"></span>

                <a href="index.php?c=contacts&a=details&id=<?php echo $contact['id']; ?>">
                    <b><?php echo contacts_formated_name(contacts_field_id('name', $contact['id'])); ?></b>
                </a>
            </p>

            <p>
                <?php echo $contact['tva']; ?>
            </p>

            <p>
                <?php _menu_icon('top', 'invoices'); ?>
                <a href="index.php?c=contacts&a=invoices&id=<?php echo $contact['id']; ?>"><?php _t('Invoices'); ?></a>
            </p>

        </div>



    </div>
</div>