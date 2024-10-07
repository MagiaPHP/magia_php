<form class="form-horizontal" target="_new"  action="index.php" method="get">
    <input type="hidden" name="c" value="invoices">
    <input type="hidden" name="a" value="export_all_pdf">


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
            <select class="form-control" name="tri">                       
                <option value="1">
                    <?php _t("January"); ?>, 
                    <?php _t("February"); ?>, 
                    <?php _t("March"); ?>
                </option>
                <option value="2">
                    <?php _t("April"); ?>, 
                    <?php _t("May"); ?>, 
                    <?php _t("June"); ?>
                </option>
                <option value="3">
                    <?php _t("July"); ?>, 
                    <?php _t("August"); ?>, 
                    <?php _t("September"); ?>
                </option>
                <option value="4">
                    <?php _t("October"); ?>, 
                    <?php _t("November"); ?>, 
                    <?php _t("December"); ?>
                </option>
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
