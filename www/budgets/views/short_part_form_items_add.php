<form class="form-inline" action="index.php">
    <input type="hidden" name="c" value="budgets">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="23">



    <div class="form-group">
        <label class="sr-only" for="exampleInputEmail3">Email address</label>
        <select class="form-control">
            <option value="1"><?php _t("TOITURE"); ?></option>
            <option value="1"><?php _t("FAÇADE"); ?></option>
            <option value="1"><?php _t("CONTAINERS"); ?></option>
        </select>
    </div>




    <div class="checkbox">
        <label>
            <input type="checkbox"> Remember me
        </label>
    </div>


    <button type="submit" class="btn btn-default">
        <?php _t("Update"); ?>
    </button>
</form>



<table class="table">
    <tr>
        <td width="50%"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <?php
    $products = [
        "Fourniture, pose et enlèvement d'un échafaudage" => 1480,
        "Enlèvement de la toiture existante(tuile, boiserie, chevrons et gites aussi)" => 2150,
        "Fourniture et pose des nouvelles gites" => 140,
        "Confection d'un toit, chevrons et lattes comprises" => 360,
        "Fourniture et pose d'une isolation Eurothan 14 cm ép." => 20,
        "Fourniture et pose d'un sous toiture et contre-lattage" => 5800,
        "Fourniture et pose des tuiles en terre cuite-voir le choix" => 300,
        "Fourniture et pose d'une nouvelle décharge de l'eau de pluie vers la rue et arrière(crochets compris)" => 5800
    ];

    foreach ($products as $key => $value) {
        ?>


        <tr>
            <td>
                <div class="form-group">
                    <textarea 
                        class="form-control" 
                        name='description' 
                        id="description"
                        placeholder="<?php _t("Description"); ?> (Max: <?php echo _options_option("config_budgets_description_maxlength"); ?> <?php _t("characters"); ?>)" 
                        autofocus=""
                        value="" 
                        required=""
                        rows='2'
                        <?php
                        // limita los caracteres a x cuando esta activado audio 
                        // config/controllers/invoices_description_maxlength.php
                        if (modules_field_module('status', 'audio')) {
                            ?>
                            maxlength="<?php echo _options_option("config_budgets_description_maxlength"); ?>"
                        <?php } ?>            
                        ><?php
                            echo $key;
                            ?></textarea>
                </div>
            </td>

            <td>
                <div class="form-group">
                    <select class="form-control">
                        <option value="1">M. Metre</option>
                        <option value="1">M2. Metre carre</option>
                        <option value="1">M3. Metre cube</option>
                        <option value="1">FF. Forfait</option>
                    </select>
                </div>
            </td>


            <td>
                <div class="form-group">
                    <input 
                        type="number"
                        min="1"
                        name="quantity" 
                        class="form-control" 
                        placeholder="<?php _t("Quantity"); ?>"
                        size="25"
                        value="1"
                        > 
                </div>
            </td>


            <td>

                <div class="form-group">
                    <input  
                        type="number" 
                        name="price" 
                        required=""
                        min="0" 
                        value="<?php echo $value; ?>" 
                        step=.01
                        class="form-control" 
                        placeholder="<?php _t("Price"); ?>">
                </div>

            </td>
            <td>


                <div class="form-group">

                    <?php
                    // RC
                    //  vardump($orders['id']);
                    //  vardump($orders['company_id']);
                    //  vardump(country_tax_list_by_country(addresses_billing_by_contact_id($orders['company_id'])['country']));
                    $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);
                    ?>


                    <select class="form-control" name="tax">
                        <?php if ($tax_by_country) { ?>
                            <?php foreach ($tax_by_country as $tax) { ?>                                                                
                                <?php $selected = ($tax['tax'] == $budget_items['tax']) ? " selected " : " "; ?>                                                                
                                <option 
                                    value="<?php echo $tax['tax']; ?>" 
                                    <?php echo "$selected"; ?>>
                                    <?php echo $tax['tax']; ?>%
                                </option>
                            <?php } ?>
                        <?php } else { ?> 
                            <option value="0">0%</option>                              
                        <?php } ?>
                    </select>
                </div>



            </td>


            <?php
            /**
             * 
              <td>

              <label for="discounts"><?php _t("Discounts"); ?></label>
              <div class="row form-group">
              <div class="col-xs-6">
              <input
              type="number"
              name="discounts"
              id="discounts"
              class="form-control"
              min="0"
              max=""
              placeholder="<?php _t("Discount"); ?>"
              value="<?php echo contacts_field_id('discounts', budgets_field_id("client_id", $id)) ?>"
              >
              </div>


              <div class="col-xs-6">
              <select class="form-control" name="discounts_mode">
              <?php foreach (discounts_mode_list() as $key => $value) { ?>
              <option value="<?php echo $value['discount']; ?>"><?php echo $value['discount']; ?></option>
              <?php } ?>
              </select>
              </div>
              </div>



              </td>


             * 
             */
            ?>
            <td>
                <div class="form-group">

                    <button type="submit" class="btn btn-danger " >
                        <span class="glyphicon glyphicon-plus"></span> 
                        <?php //_t("Add");  ?>
                    </button>
                </div>
            </td>
        </tr>
    <?php }
    ?>
</table>


<div class="well well-sm">
    <?php include view("budgets", "short_form_items_add"); ?>
</div>


