<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#products_search">
    <span class="glyphicon glyphicon-search"></span>
    <?php _t("Search"); ?>

</button>

<!-- Modal -->
<div class="modal fade" id="products_search" tabindex="-1" role="dialog" aria-labelledby="products_searchLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="products_searchLabel">
                    <?php _t("Products list"); ?>
                </h4>
            </div>

            <div class="modal-body">
                <?php // include "tabs_products_search.php"; ?>
                <?php include "nav_modal_products_search.php"; ?>
                <?php // include "table_products_list.php"; ?>
            </div>

        </div>
    </div>
</div>