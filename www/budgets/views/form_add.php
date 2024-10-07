<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="budgets">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="budget_id" value="null">

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="id"><?php _t("Document number"); ?></label>
        <div class="col-sm-8">
            <input value="<?php echo budgets_next_number(); ?>" type="number" name="id" class="form-control" id="id" placeholder="<?php echo budgets_next_number(); ?>">
        </div>
    </div>
    <?php # /title ?>




    <?php # cliente_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="client_id"><?php _t("Client"); ?></label>
        <div class="col-sm-8">

            <select class="form-control selectpicker" data-live-search="true" name="client_id" required="">                
                <?php foreach (contacts_headoffice_list() as $key => $headoffice) { ?>
                    <optgroup label="<?php echo contacts_formated($headoffice['id']); ?>">                    
                        <?php
                        foreach (contacts_list_according_company_and_type($headoffice['id'], 1) as $key => $contacts_list) {
                            $selected = (isset($id) && $contacts_list['id'] == $id ) ? " selected " : "";

                            if ($contacts_list['id'] != _options_option('default_id_company')) {
                                ?>                                                  
                                <option value="<?php echo "$contacts_list[id]"; ?>" <?php echo $selected; ?>>
                                    <?php echo $contacts_list['id'] . ",  " . contacts_formated($contacts_list['id']); ?>
                                </option>   
                                <?php
                            }
                        }
                        ?>                    
                    </optgroup>                    
                <?php } ?>
            </select>



        </div>	
    </div>
    <?php # /cliente_id   ?>



    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="title" class="form-control" id="title" placeholder="<?php _t("No title"); ?>">
        </div>
    </div>
    <?php # /title ?>



    <?php /*
     * 
     *     
      <?php # sellers_id ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="sellers_id"><?php _t("Sellers_id"); ?></label>
      <div class="col-sm-8">
      <select class="form-control selectpicker"  data-live-search="true" name="sellers_id">
      <option value="xxxx"></option>
      <?php foreach (employees_list_by_company($u_owner_id) as $key => $employees_list) { ?>
      <option value="<?php echo "$employees_list[contact_id]"; ?>"><?php echo $employees_list['contact_id'] . ",  " .  contacts_formated($employees_list['contact_id']); ?></option>
      <?php } ?>
      </select>
      </div>
      </div>
      <?php # /sellers_id ?>

      <?php # date ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
      <div class="col-sm-8">
      <input type="date"  name="date" class="form-control" id="date" placeholder=" - date">
      </div>
      </div>
      <?php # /date ?>
     * 
     * 
      <?php # date_registre ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="date_registre"><?php _t("Date_registre"); ?></label>
      <div class="col-sm-8">
      <input type="date"  name="date_registre" class="form-control" id="date_registre" placeholder=" - date">
      </div>
      </div>
      <?php # /date_registre ?>

      <?php # total ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="total"><?php _t("Total"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="total" class="form-control" id="total" placeholder=" - defecto">
      </div>
      </div>
      <?php # /total ?>

      <?php # tax ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="tax"><?php _t("Tax"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="tax" class="form-control" id="tax" placeholder=" - defecto">
      </div>
      </div>
      <?php # /tax ?>

      <?php # advance ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="advance"><?php _t("Advance"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="advance" class="form-control" id="advance" placeholder=" - defecto">
      </div>
      </div>
      <?php # /advance ?>

      <?php # balance ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="balance"><?php _t("Balance"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="balance" class="form-control" id="balance" placeholder=" - defecto">
      </div>
      </div>
      <?php # /balance ?>

     * 
     * 
     *     <?php # comments ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="comments"><?php _t("Comments"); ?></label>
      <div class="col-sm-8">
      <textarea class="form-control" name="comments"></textarea>


      </div>
      </div>
      <?php # /comments  ?>

      <?php # comments_private  ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="comments_private"><?php _t("Comments_private"); ?></label>
      <div class="col-sm-8">
      <textarea class="form-control" name="comments_private"></textarea>

      </div>
      </div>
      <?php # /comments_private  ?>
     * 
     * 
     *  */ ?>



    <?php /* <?php # r1 ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="r1"><?php _t("R1"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="r1" class="form-control" id="r1" placeholder=" - defecto">
      </div>
      </div>
      <?php # /r1 ?>

      <?php # r2 ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="r2"><?php _t("R2"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="r2" class="form-control" id="r2" placeholder=" - defecto">
      </div>
      </div>
      <?php # /r2 ?>

      <?php # r3 ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="r3"><?php _t("R3"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="r3" class="form-control" id="r3" placeholder=" - defecto">
      </div>
      </div>
      <?php # /r3 ?>

      <?php # fc ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="fc"><?php _t("Fc"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="fc" class="form-control" id="fc" placeholder=" - defecto">
      </div>
      </div>
      <?php # /fc ?>

      <?php # date_update ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="date_update"><?php _t("Date_update"); ?></label>
      <div class="col-sm-8">
      <input type="date"  name="date_update" class="form-control" id="date_update" placeholder=" - date">
      </div>
      </div>
      <?php # /date_update ?>
     * 
     * 
     * 
     *     <?php # days ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="days"><?php _t("Days"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="days" class="form-control" id="days" placeholder=" - defecto">
      </div>
      </div>
      <?php # /days  ?>
     * 
     * 
     */ ?>


    <?php
    /*   <?php # ce ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="ce"><?php _t("Ce"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="ce" class="form-control" id="ce" placeholder=" - defecto">
      </div>
      </div>
      <?php # /ce ?>

      <?php # key ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="key"><?php _t("Key"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="key" class="form-control" id="key" placeholder=" - defecto">
      </div>
      </div>
      <?php # /key ?>

      <?php # status ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="status" class="form-control" id="status" placeholder=" - defecto">
      </div>
      </div>
      <?php # /status ?>

     */
    ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Next"); ?>">
        </div>      							
    </div>      							

</form>
