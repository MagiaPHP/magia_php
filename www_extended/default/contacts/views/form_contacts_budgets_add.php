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

            <input type="hidden" name="client_id" value="<?php echo $id; ?>">

            <?php echo contacts_formated_name(contacts_field_id('name', $id)); ?>

            <?php
            /**
             *             <select class="form-control selectpicker" data-live-search="true" name="client_id" required="">                
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
             */
            ?>



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



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
