<div class="row">

    <?php
    // 
    foreach ($contacts_list as $key => $contact) {
        //
        ?>

        <div class="col-sm-6 col-md-2 ">
            <div class="thumbnail">
                <a href="index.php?c=contacts&a=details&id=<?php echo $contact['id']; ?>">
                    <img src="<?php echo contacts_picture_src($contact['id']); ?>" alt="..." width="200" height="200">
                </a>
                <div class="caption">

                    <p>
                        <span class="glyphicon glyphicon-home"></span>

                        <b><?php echo contacts_formated_name(contacts_field_id('name', $contact['id'])); ?></b>

                    </p>

                    <p>
                        <?php echo $contact['tva']; ?>
                    </p>



                    <p>
                        Ver sus oficinas
                    </p>




                </div>
            </div>
        </div>
    <?php } ?>

</div>