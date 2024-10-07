
<div class="col-sm-6 col-md-2 ">
    <div class="thumbnail">
        <?php _t("Patient"); ?>
        <a href="index.php?c=contacts&a=details&id=<?php echo $contact['id']; ?>">
            <img src="<?php echo contacts_picture_src($contact['id']); ?>" alt="...">
        </a>

        <div class="caption">
            <p>
                <span class="glyphicon glyphicon-briefcase"></span>
                <b>
                    <?php echo contacts_formated(patients_field_by_contact_id('company_id', $contact['id'])); ?>
                </b>
            </p>
            <p>
                <span class="glyphicon glyphicon-user"></span>
                <?php echo contacts_formated($contact['id']); ?>
            </p>
            <p>
                <?php echo _menu_icon('top', "orders"); ?>
                <a href="index.php?c=contacts&a=orders_by_patient&id=<?php echo $contact['id']; ?>"><?php _t("Orders list"); ?></a>
            </p>
        </div>

    </div>
</div>
