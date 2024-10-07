<div class="container marketing">
    <div class="col-sm-12 col-md-12 col-lg-12">

        <h2><?php _t("Next events"); ?></h2>
        <div class="row">
            <?php
            $i = 0;
            foreach ($next_events as $key => $event) {
                if ($i++ == 4) {
                    break;
                }
                ?>
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="https://picsum.photos/320/200" alt="...">
                        <div class="caption">
                            <h4><?php echo $event['title']; ?></h4>
                            <h5>Sabado 2 de junio a 20h30</h5>

                            <h5><?php echo agenda_categories_field_id("category", $event['category_id']); ?></h5>

                            <p>Lugar del evento</p>

                            <p>
                                vip: 15 euros <br>
                                entradas: 5 euros <br>
                                preventa: 2 euros
                            </p>
                            <p>
                                <a href="index.php?c=public_html&a=event&id=<?php echo $event['id']; ?>" class="btn btn-primary" role="button">
                                    <?php _t("Compara"); ?>
                                </a> 
                                <a href="#" class="btn btn-default" role="button">
                                    <?php _t("Details event"); ?>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</div>