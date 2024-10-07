
<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#part_remake_this_order_disabled">
    <?php _t("Remake this order"); ?>
</button>


<div class="modal fade" id="part_remake_this_order_disabled" tabindex="-1" role="dialog" aria-labelledby="part_remake_this_order_disabledLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="part_remake_this_order_disabledLabel">
                    <?php echo _t("Remake disabled"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h1><?php _t("Remake"); ?></h1>

                <p>
                    <?php _t("This order is a copy"); ?>
                </p>
                <p>
                    <?php _t("You can make a copy only of original orders, please choose an original order"); ?>
                </p>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php _t("Close"); ?></button>
            </div>
        </div>
    </div>
</div>