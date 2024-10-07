
<div class="container marketing">
    <div class="col-sm-12 col-md-12 col-lg-12">

        <h2>Top sell</h2>
        <div class="row">
            <?php
            $i = 0;
            foreach ($products as $key => $product) {
                if ($i++ == 4) {
                    break;
                }
                ?>
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="https://picsum.photos/320/200" alt="...">
                        <div class="caption">
                            <h4><?php echo $product['name']; ?></h4>
                            <h4> 
                                <del><?php echo moneda(($product['price'] * (($product['tax'] / 100) + 1)) * 1.25); ?></del>

                                <span class="label label-warning">
                                    <?php echo moneda($product['price'] * (($product['tax'] / 100) + 1)); ?>
                                    EUR </span>

                            </h4>




                            <p>
                                <a href="index.php?c=public_html&a=details&id=<?php echo $contact['id']; ?>" class="btn btn-primary" role="button">

                                    <span class="glyphicon glyphicon-shopping-cart"></span>
                                    <?php _t("Comprar"); ?>
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