<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                <?php _t("Express (24h)"); ?>
            </a></li>
        <li role="presentation">
            <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                <?php _t("Normal (3-4 days"); ?>
            </a>
        </li>
        <li role="presentation">
            <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">
                <?php _t("Other date"); ?>
            </a>
        </li>

    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <h3><?php _t("Express"); ?></h3>
            <p><?php _t("Your order will be delivered in 24, a surcharge on your invoice will possibly be added"); ?></p>            
            <?php include "form_express_update.php"; ?>

        </div>
        <div role="tabpanel" class="tab-pane" id="profile">
            <h3><?php _t("Normal way"); ?></h3>
            <p><?php _t("In a normal delivery, this takes 3 to 4 business days"); ?></p>
            <?php include "form_express_update.php"; ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="messages">
            <p><?php _t("You can also schedule a delivery on another date after"); ?>: xxx-xx-xx</p>
            <?php include "form_express_update.php"; ?>
        </div>

    </div>

</div>