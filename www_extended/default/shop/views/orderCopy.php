<?php include view("home", "header"); ?>
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php include view("orders", 'izq_remake_copy'); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">

    </div>



    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"> 


        <?php
        if ($error) {
            foreach ($error as $key => $value) {
                message("info", $value);
            }
        }
        ?>
        <?php
        if ($mensajes) {
            foreach ($mensajes as $key => $value) {
                message("info", $value);
            }
        }
        ?>    


        <a class="btn btn-primary btn-lg active" href="index.php?c=shop&a=orderCopy&id=<?php echo "$id"; ?>">
            <span class="glyphicon glyphicon-ok"></span>
            <?php _t("Copy"); ?>
        </a>



        <?php
        if (shop_why_cannot_make_remake_from_order($id)) {
            ?>


            <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#why_cannot_make_remake_from_order">
                <?php _t("Remake"); ?>
            </button>

            <div class="modal fade" id="why_cannot_make_remake_from_order" tabindex="-1" role="dialog" aria-labelledby="why_cannot_make_remake_from_orderLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="why_cannot_make_remake_from_orderLabel">
                                <?php _t('Info'); ?>
                            </h4>
                        </div>
                        <div class="modal-body">

                            <h2>
                                <?php _t("Reasons why you can't remake"); ?>
                            </h2>

                            <?php
                            foreach (shop_why_cannot_make_remake_from_order($id) as $key => $error) {
                                message('info', $error);
                            }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                <?php _t("Close"); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        } else {
            ?>
            <a class="btn btn-default btn-lg" href="index.php?c=shop&a=orderRemake&id=<?php echo "$id"; ?>">
                <?php _t("Remake"); ?>
            </a>
        <?php }
        ?>

        <h2><?php _t("Make a copy from order"); ?>: <?php echo "$id"; ?></h2>

        <h3><?php _t("Please chosse the delivery option"); ?></h3>
        <?php //include 'formOrderDetails.php'; ?>      

        <?php
        include 'tabCopy.php';
        ?>    


    </div>
    <div class="col-md-3">


        <?php //include "der_orderDetails.php"; ?>
    </div>
</div>
<?php include view("home", "footer"); ?>