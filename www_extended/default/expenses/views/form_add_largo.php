<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, 'form_add_largo');
}
?>

<form method="post" action="index.php">
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_add_largo">
    <input type="hidden" name="redi[redi]" value="2">





    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label for="office_id"><?php _t("Office"); ?></label>

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
    </div>





    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label for="provider_id"><?php _t("Provider"); ?></label>
                <select name="provider_id" class="form-control selectpicker" id="provider_id" data-live-search="true" >
                    <?php //contacts_select("id","name", "" , array()); ?>      
                    <?php
                    $filter = null;
//                    foreach (contacts_headoffice_list($filter) as $key => $provider) {
                    foreach (providers_list() as $key => $provider) {

                        $provider_vat = contacts_field_id('tva', $provider['company_id']);

                        echo '<option value="' . $provider['company_id'] . '">' . $provider_vat . ' | ' . contacts_formated($provider['company_id']) . '</option>';
                    }
                    ?>
                </select>
            </div>           
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> 
                <label for="invoice_number"><?php _t("Invoice number"); ?> *</label>
                <input 
                    type="text" 
                    class="form-control"  
                    name="invoice_number" 
                    id="invoice_number" 
                    placeholder="<?php _t("Invoice provider number"); ?>"
                    required=""
                    >
            </div>                                                
        </div>
    </div>


    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label for="date"><?php _t("Invoice date"); ?> * </label>

                <input 
                    type="date" 
                    name="date" 
                    id="date" 
                    class="form-control" placeholder=""
                    required=""
                    >
            </div>           
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> 
                <label for="deadline"><?php _t("Due date"); ?></label>
                <input type="date" name="deadline" id="deadline" class="form-control" placeholder="">
            </div>                                                
        </div>
    </div>


    <?php
    /**
     *
     * 
      <div class="form-group">
      <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <label for="total"><?php _t("Total htva"); ?> * </label>
      <input
      type="number"
      step="any"
      name="total"
      id="total"
      class="form-control"
      placeholder=""
      required=""
      >
      </div>
      </div>
      </div>
     */
    ?>


    <?php #total   ?>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label for="total"><?php _t("Total htva"); ?> * </label>
                <input 
                    type="number" 
                    step="any" 
                    name="total" 
                    id="total"  
                    class="form-control" 
                    placeholder=""
                    required=""
                    >
            </div> 

            <div class="col-sm-2">
                <label class="control-label col-sm-5" for="tax"><?php _t("Tva"); ?></label>
                <?php
                $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);
                ?>


                <select class="form-control" name="tax">
                    <?php if ($tax_by_country) { ?>
                        <?php foreach ($tax_by_country as $tax) { ?>                                                                
                            <?php // $selected = ($tax['tax'] == $expense_items['tax']) ? " selected " : " "; ?>                                                                
                            <option 
                                value="<?php echo $tax['tax']; ?>" 
                                <?php // echo "$selected";  ?>>
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

            <div class="col-sm-4">
                <label class="control-label col-sm-5" for="tax">-</label>
                <input type="number" step="any" class="form-control" name="tvac" id="tvac" placeholder="" >
            </div>	




        </div>
    </div>
    <?php # /total   ?>



    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label for="my_ref"><?php _t("My reference"); ?> * </label>

                <input 
                    type="text" 
                    name="my_ref" 
                    id="my_ref" 
                    class="form-control" 
                    placeholder=""
                    required=""
                    >                
                <span id="my_ref" class="help-block"><?php _t("A unique reference of this document in your company"); ?></span>
            </div>                                      
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label for="my_ref"><?php _t("Structured communication"); ?></label>

                <input 
                    type="text" 
                    namecce" 
                    id="ce" 
                    class="form-control" 
                    placeholder="+++123/4567/89012++"
                    
                    >

                <span id="ce" class="help-block"><?php _t(""); ?></span>
            </div>                                      
        </div>
    </div>







    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label for="category_code"><?php _t("Expense categories"); ?></label>
                <select 
                    class="form-control selectpicker" 
                    data-live-search="true"
                    name="category_code"
                    id="category_code"
                    >
                    <option value="null"><?php _t("Without category"); ?></option>
                    <?php
                    $selected = null;
                    foreach (expenses_categories_list2() as $key => $ecl) {
                        // el ultimo categoria registrada
                        //    $selected = ($ecl['code'] == $expense_items['category_code']) ? " selected " : "";
                        $selected = (1 == 2) ? " selected " : "";
                        $has_child = (expenses_categories_childrens_of($ecl['code'])) ? true : false;
                        if (!$has_child) {
                            echo '<option value="' . $ecl['code'] . '"  ' . $selected . '>' . $ecl['code'] . ' ' . $ecl['category'] . '</option>';
                        }
                        $selected = null;
                    }
                    ?>
                </select>
            </div>                                      
        </div>
    </div>





















    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label for="add_lines" class="sr-only"><?php _t("Add lines"); ?></label>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="add_lines" id="add_lines" value="1"> <?php _t("Add lines"); ?>
                    </label>
                </div>     
            </div>                                      
        </div>
    </div>







    <button type="submit" class="btn btn-default">

        <?php _t("Next"); ?>

        <?php echo icon("chevron-right"); ?>

    </button>

</form>

<br>
<br>

<p>
    * <?php _t("Required"); ?>
</p>