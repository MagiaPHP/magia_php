<form action="index.php" method="get">
    <input type="hidden" name="c" value="credit_notes">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="byClient">


    <div class="form-group">
        <label for="client_id"><?php _t("Clients"); ?></label>
        <select class="form-control selectpicker" data-live-search="true" name="client_id">
            <?php //foreach ( contacts_list_by_type(1) as $key => $contacts_list ) { ?>
            <?php
            foreach (contacts_headoffice_list() as $key => $headoffice) {
                $selected = (isset($client_id) && $client_id == $headoffice['id'] ) ? " selected " : "";
                ?>

                <option 
                    value="<?php echo "$headoffice[id]"; ?> <?php echo $selected; ?>"
                    >
                        <?php echo $headoffice['id'] . ",  " . contacts_formated($headoffice['id']); ?>
                </option> 
            <?php } ?>

        </select>









        <?php
        /**
         *  <select class="form-control selectpicker" data-live-search="true" name="client_id">
          <?php //foreach ( contacts_list_by_type(1) as $key => $contacts_list ) { ?>
          <?php foreach ( contacts_headoffice_list() as $key => $headoffice ) { ?>
          <optgroup label="<?php echo contacts_formated($headoffice['id']) ; ?>">
          <?php foreach ( contacts_list_according_company_and_type($headoffice['id'] , 1) as $key => $contacts_list ) { ?>
          <option
          value="<?php echo "$contacts_list[id]" ; ?>"
          >
          <?php echo $contacts_list['id'] . ",  " . contacts_formated($contacts_list['id']) ; ?>
          </option>
          <?php } ?>
          </optgroup>
          <?php } ?>
          </select>
         */
        ?>




    </div>








    <div class="form-group">
        <label for="status"><?php _t("Budget status"); ?></label>
        <select class="form-control selectpicker" data-live-search="true" name="status">            
            <?php //foreach ( contacts_list_by_type(1) as $key => $contacts_list) { ?>
            <?php
            foreach (credit_notes_status_list() as $key => $cnst) {
                ?>
                <option 
                    value="<?php echo "$cnst[code]"; ?>">
                        <?php echo _t($cnst['status']); ?>
                </option>
            <?php } ?>
        </select>
    </div>



    <div class="form-group">
        <label for="status"><?php _t("Year"); ?></label>
        <select class="form-control selectpicker" data-live-search="true" name="year">            
            <?php
            for ($i = credit_notes_get_year_1_credit_note(); $i <= date("Y"); $i++) {
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

    <?php
    /**
     * 
      <div class="form-group">
      <label for="status"><?php _t("Invoiced"); ?>?</label>
      <div class="checkbox">
      <label>
      <input type="checkbox" name="unbilled"> <?php _t("Unbilled only"); ?>
      </label>
      </div>
      </div>
     */
    ?>
    <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
</form>

<br>
<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, 'form_search_by_office');
}
?>

