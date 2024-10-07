<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_app"); ?>
    </div>

    <div class="col-lg-8">
        <?php //include view("config", "nav"); ?>

        <?php
        if (isset($m)) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("App"); ?> : <?php _t("Invoices"); ?></h1>

        <p>
            <?php _t("Invoices status visible via the app"); ?>
        </p>

        <form method="post" action="index.php">

            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_app_invoices">



            <div class="form-group">                

                <?php
                $app_invoices_status_to_show_json = _options_option('config_app_invoices_status_to_show');

                $app_invoices_status_to_show_array = ($app_invoices_status_to_show_json) ? json_decode($app_invoices_status_to_show_json) : null;

                foreach (invoice_status_list() as $key => $item) {

                    $checked = (isset($app_invoices_status_to_show_array) && in_array($item['code'], $app_invoices_status_to_show_array)) ? ' checked ' : "";

                    echo '<div class="checkbox">
                    <label>
                        <input type="checkbox" value="' . $item['code'] . '" name="data[]" ' . $checked . '> ' . _tr($item['status']) . '
                    </label>
                </div>';
                }
                ?>

            </div>


            <button type="submit" class="btn btn-default">
                <?php echo icon("ok"); ?> 
                <?php _t("Submit"); ?>
            </button>
        </form>


    </div>
</div>

<?php include view("home", "footer"); ?> 

