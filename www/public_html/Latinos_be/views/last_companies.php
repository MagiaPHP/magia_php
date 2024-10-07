<div class="container marketing">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <h2><?php _t("Last companies"); ?></h2>

        <div class="row">
            <?php
            $i = 0;
            foreach ($contacts as $key => $contact) {
                if ($i++ == 4) {
                    break;
                }
                ?>
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">


                        <?php
                        $logo = (user_options('contacts_picture', $contact['id'])) ? "www/gallery/img/_web_93/users/" . user_options('contacts_picture', $contact['id']) :
                                "https://picsum.photos/320/200";
                        ?>
                        <img src="<?php echo $logo; ?>">




                        <div class="caption">
                            <h4><?php echo $contact['name']; ?></h4>
                            <h5><?php echo "Discoteca"; ?></h5>
                            <p>
                                2, Av de la liberte<br>
                                1020 - Bruselas
                                Belgica
                            </p>
                            <p>
                                <a href="index.php?c=public_html&a=details&id=<?php echo $contact['id']; ?>" class="btn btn-primary" role="button">
                                    <?php _t("Details"); ?>
                                </a> 
                                <a href="#" class="btn btn-default" role="button">Button</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</div>