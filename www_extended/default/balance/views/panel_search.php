<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _menu_icon("top", "balance"); ?>                
            <?php _t("Search"); ?>
        </h3>
    </div>
    <div class="panel-body">
        <form action="index.php" method="get">
            <input type="hidden" name="c" value="balance">
            <input type="hidden" name="a" value="search">
            <input type="hidden" name="w" value="client_id">


            <div class="form-group">
                <label for="client_id"><?php _t("Clients"); ?></label>
                <select class="form-control selectpicker" data-live-search="true" name="client_id">
                    <option value="all"><?php _t("All"); ?></option>

                    <?php
                    foreach (contacts_headoffice_list() as $key => $headoffice) {
                        $selected_contact = ($client_id == $headoffice['id'] ) ? " selected " : "";
                        //
                        //
                        //
                        ?>
                        <option
                            value="<?php echo "$headoffice[id]"; ?>"
                            <?php echo $selected_contact; ?>
                            >
                                <?php echo $headoffice['id'] . ",  " . contacts_formated($headoffice['id']); ?>
                        </option>
                    <?php } ?>



                </select>
            </div>




            <div class="form-group">
                <label for="status"><?php _t("Year"); ?></label>
                <select class="form-control selectpicker" data-live-search="true" name="year">
                    <?php
                    for ($i = budgets_get_year_1_budget(); $i <= date("Y"); $i++) {
                        $selected = ($i == date("Y") ) ? " selected " : "";
                        ?>
                        <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>



            <div class="form-group">
                <label for="status"><?php _t("Month"); ?></label>
                <select class="form-control selectpicker" data-live-search="true" name="month">
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        $selected = ($i == date("n") ) ? " selected " : "";
                        ?>
                        <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?> <?php echo _t(magia_dates_month($i)); ?></option>
                    <?php } ?>
                </select>
            </div>




            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
                <?php _t("Search"); ?>
            </button>
        </form>

        <br>

        <a href="index.php?c=panels&a=ok_hidden&id=<?php echo $panel->getId(); ?>&redi=1"><?php echo icon("eye-close"); ?></a>




    </div>
</div>

