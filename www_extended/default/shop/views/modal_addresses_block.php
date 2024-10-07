<button 
    type="button" 
    class="btn btn-primary btn-sm" 
    data-toggle="modal" 
    data-target="#addresses_block_<?php echo $address['id']; ?>">
    <span class="glyphicon glyphicon-lock"></span>
    <?php _t("Block"); ?>
</button>


<div 
    class="modal fade" 
    id="addresses_block_<?php echo $address['id']; ?>" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="addresses_block_<?php echo $address['id']; ?>Label"
    >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="addresses_block_<?php echo $address['id']; ?>Label">
                    <?php _t("Block"); ?> <?php echo $address['id']; ?>
                </h4>
            </div>
            <div class="modal-body">
                <h3><?php _t("Block address"); ?></h3>
                <p>
                    <?php _t("block from the list of addresses available for package delivery"); ?>
                </p>

                <?php
                include "form_address_block.php";
                ?>        
            </div>        
        </div>
    </div>
</div>

