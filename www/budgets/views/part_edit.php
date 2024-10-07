<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">

        <div class="panel panel-default">
            <div class="panel-body text-center" >
                <h1>
                    <?php
                    if (modules_field_module('status', 'audio')) {
                        _t("Delivery note");
                    } else {
                        _t("Budget");
                    }
                    ?>: <?php echo $id; ?>
                </h1>                        
            </div>
        </div>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php # SAVE ##################  ?>


        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
                <?php include "part_details_company.php"; ?>
            </div>

            <div class="col-sm-12 col-md-3 col-lg-3">
                <?php include "part_details_dates_registre.php"; ?>
                <?php // include "part_details_dates_expiration.php"; ?>
            </div>

            <div class="col-sm-12 col-md-3 col-lg-3">
                <?php include "part_details_billing_address.php"; ?>
            </div>

            <div class="col-sm-12 col-md-3 col-lg-3">
                <?php
                if (_options_option('config_address_use_delivery')) {
                    include "part_details_delivery_address.php";
                }
                ?>
            </div>
        </div>

        <?php
        $items = budget_lines_list_by_budget_id_without_transport($id);
        ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <a name="items_details"></a><?php _t("items"); ?>
            </div>
            <div class="panel-body">
                <?php include "table_items.php"; ?>
            </div>
        </div>


        <a name="comments"></a>
        <?php
        include "part_comments.php";
        ?>
    </div>
</div>