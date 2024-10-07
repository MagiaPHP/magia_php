Stock




<?php foreach (offices_list_by_headoffice($u_owner_id) as $key => $office) { ?>




    <?php
    $stock = products_stock_search_by_office($id, $office['id']);

    if ($stock) {
        ?>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <?php echo $office['name']; ?>
            </div>

            <!-- List group -->
            <ul class="list-group">
                <li class="list-group-item">
                    <?php include "modal_stock_update.php"; ?>
                    <?php _t("Srock actual"); ?> : <?php echo $stock['stock']; ?>


                </li>

                <li class="list-group-item">
                    <?php include "modal_stock_max_update.php"; ?>

                    <?php _t("Srock MAX"); ?>: <?php echo $stock['stock_max']; ?>
                </li>

                <li class="list-group-item">
                    <?php include "modal_stock_min_update.php"; ?>
                    <?php _t("Srock MIN"); ?>: <?php echo $stock['stock_min']; ?>
                </li>



            </ul>
        </div>



    <?php } else {
        ?>




        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $office['name']; ?>
            </div>
            <div class="panel-body">
                <?php include "modal_product_stock_add.php"; ?>
            </div>
        </div>





        <?php
    }
}
?>








