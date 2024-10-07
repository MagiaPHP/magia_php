
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buy_item_<?php echo $product['id']; ?>">
    <?php _t("Buy"); ?> <?php echo $product['id']; ?>
</button>

<div class="modal fade" id="buy_item_<?php echo $product['id']; ?>" tabindex="-1" aria-labelledby="buy_item_<?php echo $product['id']; ?>Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buy_item_<?php echo $product['id']; ?>Label">
                    <?php echo $product['id']; ?>
                    <?php echo $product['name']; ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...

                Cuantas unidades?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

