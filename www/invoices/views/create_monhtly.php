<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-md-3 col-lg-2">
        <?php include view("invoices", "izq"); ?>
    </div>

    <div class="col-md-9 col-lg-10">

        <?php include view("invoices", "nav"); ?>

        <?php
        if ($_REQUEST && $error) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include view("invoices", "top"); ?>


        <h3><?php _t("Monhtly invoices"); ?>: <?php echo "$year"; ?> - <?php echo _tr(magia_dates_month($month)); ?></h3>

        <p>
            <?php //_t("List of companies that have budgets or shipping notes not invoiced"); ?>
        </p>


        <form class="form-inline" method="get" action="index.php">
            <input type="hidden" name="c" value="invoices">
            <input type="hidden" name="a" value="create_monhtly">
            <input type="hidden" name="redi" value="1">

            <div class="form-group">
                <label class="sr-only" for="year"><?php _t("Year"); ?></label>
                <select class="form-control selectpicker" data-live-search="true" name="year">            
                    <?php
                    // selecciona el mes del presupuesto mas antiguo
                    for ($i = budgets_get_year_1_budget(); $i <= date("Y"); $i++) {
                        $selected = ( $i == $year ) ? " selected " : "";
                        ?>
                        <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>



            <div class="form-group">
                <label class="sr-only" for="month"><?php _t("month"); ?></label>
                <select class="form-control selectpicker" data-live-search="true" name="month">            
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        $selected = ($i == $month ) ? " selected " : "";
                        ?>
                        <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?> <?php echo _t(magia_dates_month($i)); ?></option>
                    <?php } ?>
                </select>
            </div>


            <button type="submit" class="btn btn-default">
                <?php _t('Search'); ?>
            </button>
        </form>     

        <br>

        <ol>
            <li><?php _t("Find uninvoiced shipping notes for the month of "); ?> : <?php echo _tr(magia_dates_month($month)); ?></li>

            <li><?php _t("Find monthly invoices for the month of "); ?>:  <?php echo _tr(magia_dates_month($month)); ?></li>
        </ol>


        <?php include "table_create_monhtly.php"; ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 




