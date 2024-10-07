<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-lg-2">
        <?php include view("export", "izq"); ?>
    </div>

    <div class="col-lg-2">
        <?php include view("export", "izq_invoices"); ?>
    </div>

    <div class="col-lg-8">
        <?php include view("export", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _menu_icon('top', "invoices") ?>  <?php _t("Invoices lines"); ?></h1>

        <form class="form-horizontal"  target="new" action="index.php" method="get">
            <input type="hidden" name="c" value="invoice_lines">
            <input type="hidden" name="a" value="export_all_lines_pdf">


            <div class="form-group">
                <label for="year" class="col-sm-2 control-label">
                    <?php _t("Year"); ?>
                </label>
                <div class="col-sm-10">
                    <select class="form-control" name="year">                                                                      
                        <?php
                        for ($i = 2021; $i < date('Y') + 1; $i++) {
                            // selecciono el año presente
                            $selected = ($i == date('Y')) ? " selected " : "";
                            echo '<option value="' . $i . '"  ' . $selected . '  >' . $i . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="trimester" class="col-sm-2 control-label">
                    <?php _t("Trimester"); ?>
                </label>
                <div class="col-sm-10">
                    <?php
                    $selected_1 = false;
                    $selected_2 = false;
                    $selected_3 = false;
                    $selected_4 = false;

                    switch (date("m")) {
                        case "01":
                        case "02":
                        case "03":
                            $selected_1 = " selected ";
                            break;

                        case "04":
                        case "05":
                        case "06":
                            $selected_2 = " selected ";
                            break;

                        case "07":
                        case "08":
                        case "09":
                            $selected_3 = " selected ";
                            break;

                        case "10":
                        case "11":
                        case "12":
                            $selected_4 = " selected ";
                            break;

                        default:
                            break;
                    }
                    ?>


                    <select class="form-control" name="m"> 

                        <?php
                        for ($i = 1; $i < 13; $i++) {

                            $selected = ($i == date('n')) ? " selected " : "";
                            ?> 
                            <option value="<?php echo $i; ?>"   <?php // echo $selected;     ?>   ><?php echo _tr(magia_dates_month($i)); ?></option>
                        <?php } ?>

                        <option value="null" disabled=""><?php _t("By Trimester"); ?></option>

                        <option value="t1" <?php echo $selected_1 ?>>
                            <?php _t("January"); ?>, 
                            <?php _t("February"); ?>, 
                            <?php _t("March"); ?>
                        </option>
                        <option value="t2" <?php echo $selected_2 ?>>
                            <?php _t("April"); ?>, 
                            <?php _t("May"); ?>, 
                            <?php _t("June"); ?>
                        </option>
                        <option value="t3" <?php echo $selected_3 ?>>
                            <?php _t("July"); ?>, 
                            <?php _t("August"); ?>, 
                            <?php _t("September"); ?>
                        </option>
                        <option value="t4" <?php echo $selected_4 ?>>
                            <?php _t("October"); ?>, 
                            <?php _t("November"); ?>, 
                            <?php _t("December"); ?>
                        </option>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label for="format" class="col-sm-2 control-label">
                    <?php _t("Format"); ?>
                </label>
                <div class="col-sm-10">
                    <select class="form-control" name="format">                                                                                             
                        <?php /* <option value="xml">XML</option> */ ?>
                        <option value="pdf"><?php echo _t("Pdf"); ?> - <?php _t("List"); ?></option>
                        <option value="csv"><?php echo _t("CSV"); ?> - <?php _t("List"); ?></option>

                        <option value="export_all_pdf_1_p_page"><?php echo _t("Pdf"); ?> - <?php echo _t("1 invoice by page"); ?></option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">
                        <?php _t("Export"); ?>
                    </button>
                </div>
            </div>
        </form>


        <?php
        /*
          Export:
          <a href="index.php?c=addresses&a=export_json">JSON</a>
          <a href="index.php?c=addresses&a=export_pdf">pdf</a>
         */
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

