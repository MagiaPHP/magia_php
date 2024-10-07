<div class="col">
    <div class="card shadow-sm">

        <img class="" src="https://picsum.photos/303/15<?php echo $i; ?>">


        <?php
        //   <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        ?>
        <div class="card-body">
            <h3><?php echo $product['name'] ?></h3>
            <p class="card-text">
                <?php // echo $product['description']  ?>    
            </p>

            <p class="card-text">
            <strike><?php echo monedaf(12.50); ?></strike>    
            <b><?php echo monedaf(9.50); ?>  </b> (solo 3 dias) 
            </p>


            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <a href="index.php?c=public_html&a=details&id=<?php echo $product['id'] ?>">
                            <?php _t("More info"); ?>
                        </a>
                    </button>

                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        Edit
                    </button>
                </div>

                <small class="text-muted">

                    <?php include "modal_add_item.php"; ?>

                </small>

            </div>
        </div>


    </div>
</div>