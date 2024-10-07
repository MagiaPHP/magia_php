<form action="index.php" method="get">
    <input type="hidden" name="c" value="budgets">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="byClient">


    <div class="form-group">
        <label for="client_id"><?php _t("Headoffices"); ?></label>
        <select class="form-control selectpicker" data-live-search="true" name="client_id">

            <?php //foreach ( contacts_list_by_type(1) as $key => $contacts_list) { ?>
            <?php foreach (contacts_headoffice_list() as $key => $contacts_list) { ?>
                <option 
                    value="<?php echo "$contacts_list[id]"; ?>">
                        <?php echo $contacts_list['id'] . ",  " . contacts_formated($contacts_list['id']); ?>
                </option>
            <?php } ?>
        </select>
    </div>



    <div class="form-group">
        <label for="status"><?php _t("Budget status"); ?></label>
        <select class="form-control selectpicker" data-live-search="true" name="status">
            <option value="all"><?php _t("All"); ?></option>
            <?php //foreach ( contacts_list_by_type(1) as $key => $contacts_list) { ?>
            <?php foreach (budget_status_list_extended() as $key => $status) { ?>
                <option 
                    value="<?php echo "$status[code]"; ?>">
                        <?php echo $status['status']; ?>
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



    <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
</form>