<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, 'form_add_short');
}
?>

<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_add_largo">
    <input type="hidden" name="redi[redi]" value="2">

    <?php
    //vardump(providers_list()); 
    ?>

    <?php if (IS_MULTI_VAT) { ?>
        <?php # office_id ?>
        <div class="form-group">
            <label class="control-label col-sm-5" for="office_id"><?php _t("Office"); ?></label>
            <div class="col-sm-7">
                <select name="office_id" class="form-control selectpicker" id="office_id" data-live-search="true" >
                    <?php
                    $office_list = offices_list_by_headoffice($u_owner_id);

                    foreach ($office_list as $key => $office) {

                        $office_formated = contacts_formated($office['id']);

                        echo '<option value="' . $office['id'] . '">' . $office_formated . '</option>';
                    }
                    ?>
                </select>
            </div>	
        </div>
        <?php # /provider_id    ?>
    <?php } ?>

    <?php # provider_id  ?>
    <div class="form-group">
        <label class="control-label col-sm-5" for="provider_id"><?php _t("My providers"); ?></label>
        <div class="col-sm-7">
            <select name="provider_id" class="form-control selectpicker" id="provider_id" data-live-search="true" >
                <?php //contacts_select("id","name", "" , array());  ?>      
                <?php
                $filter = null;
//                    foreach (contacts_headoffice_list($filter) as $key => $provider) {
                foreach (providers_list() as $key => $provider) {

                    $provider_vat = contacts_field_id('tva', $provider['company_id']);

                    echo '<option value="' . $provider['company_id'] . '">' . $provider_vat . ' |  ' . contacts_formated($provider['company_id']) . '</option>';
                }
                ?>
            </select>
        </div>	
    </div>
    <?php # /provider_id    ?>

    <?php #    ?>
    <div class="form-group">
        <label class="control-label col-sm-5" for="invoice_number"><?php _t("Provider invoice number"); ?></label>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="invoice_number" id="invoice_number" placeholder="" required="">
        </div>	
    </div>
    <?php # /provider_id    ?>


    <?php #total    ?>
    <div class="form-group">
        <label class="control-label col-sm-5" for="total"><?php _t("Total htva"); ?></label>
        <div class="col-sm-7">
            <input type="number" step="any" class="form-control" name="total" id="total" placeholder="">
        </div>	
    </div>
    <?php # /total    ?>

    <?php #total    ?>
    <div class="form-group">
        <label class="control-label col-sm-5" for="tax"><?php _t("Tva"); ?></label>
        <div class="col-sm-2">
            <?php
            $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);
            ?>


            <select class="form-control" name="tax">
                <?php if ($tax_by_country) { ?>
                    <?php foreach ($tax_by_country as $tax) { ?>                                                                
                        <?php // $selected = ($tax['tax'] == $expense_items['tax']) ? " selected " : " "; ?>                                                                
                        <option 
                            value="<?php echo $tax['tax']; ?>" 
                            <?php // echo "$selected";   ?>>
                            <?php echo $tax['tax']; ?>%
                        </option>
                    <?php } ?>
                <?php } else { ?> 
                    <option value="0">0%</option>                              
                <?php } ?>
            </select>                        
        </div>	



        <script>
            $(document).ready(function () {
                // this will run on every select value change. 
                // if you want it to only run for those specific selects, 
                // add the same class in all of them and change the selector to $('select.yourclass')
                $('select').on('change', function () {

                    $('input[name=tvac]').val(
                            $('input[name=total]').val() * (($('select[name=tax]').val() / 100))
                            );

                });

            });

        </script>

        <div class="col-sm-5">
            <input type="number" step="any" class="form-control" name="tvac" id="tvac" placeholder="" >
        </div>	




        <?php
        /**
         * <div class="col-sm-5">
          <input type="number" step="any" class="form-control" name="tax" id="tax" placeholder="">
          </div>

         */
        ?>
    </div>
    <?php # /total    ?>










    <?php # add lines   ?>
    <div class="form-group">
        <label class="control-label col-sm-5" for="add_lines"><?php _t("Add lines"); ?></label>
        <div class="col-sm-7">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="add_lines" value="1"> <?php _t("Add lines"); ?>
                </label>
            </div>        
        </div>	
    </div>
    <?php # /add lines    ?>


    <div class="form-group">
        <label class="control-label col-sm-5" for=""></label>
        <div class="col-sm-7">    


            <button type="submit" class="btn btn-default">

                <?php _t("Next"); ?>

                <?php echo icon("chevron-right"); ?>

            </button>


        </div>      							
    </div>      							

</form>
