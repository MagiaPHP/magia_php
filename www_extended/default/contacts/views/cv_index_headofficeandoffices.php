<div class="row">

    <?php
    // 
    foreach ($contacts as $key => $contact) {
        //
        ?>

        <div class="col-sm-6 col-md-2 ">
            <div class="thumbnail">
                <?php _t("Office"); ?>

                <a href="index.php?c=contacts&a=details&id=<?php echo $contact['id']; ?>">
                    <img src="<?php echo contacts_picture_src($contact['id']); ?>" alt="...">
                </a>
                <div class="caption">
                    <p>-</p>
                    <p>
                        <span class="glyphicon glyphicon-home"></span>
                        <b>
                            <?php echo contacts_formated_name(contacts_field_id('name', $contact['owner_id'])); ?>
                        </b>
                    </p>

                    <p>
                        <span class="glyphicon glyphicon-briefcase"></span>
                        <a href="index.php?c=contacts&a=details&id=<?php echo $contact['id']; ?>">
                            <?php echo contacts_formated_name(contacts_field_id('name', $contact['id'])); ?>
                        </a>
                    </p>

                </div>
            </div>
        </div>
    <?php } ?>



</div>