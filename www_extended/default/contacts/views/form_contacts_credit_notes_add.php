<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="credit_notes">
    <input type="hidden" name="a" value="ok_add_by_client">



    <?php # id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="id"><?php _t("Credit note number"); ?></label>
        <div class="col-sm-8">
            <input value="<?php echo credit_notes_next_number(); ?>" 
                   type="number"  
                   name="id" 
                   class="form-control" 
                   id="id" 
                   placeholder="<?php echo credit_notes_next_number(); ?>">
        </div>
    </div>
    <?php # /id ?>


    <?php # counter ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="counter"><?php _t("Counter"); ?></label>
        <div class="col-sm-8">
            <input value="<?php echo credit_notes_counter_next_number(date('Y')); ?>" 
                   type="number"  
                   name="id" 
                   class="form-control" 
                   id="id" 
                   placeholder="<?php echo credit_notes_counter_next_number(date('Y')); ?>"
                   disabled=""
                   >
        </div>
    </div>
    <?php # /counter ?>




    <?php # cliente_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="client_id"><?php _t("Client"); ?></label>
        <div class="col-sm-8">

            <input type="hidden" name="client_id" value="<?php echo $id; ?>">

            <?php echo contacts_formated_name(contacts_field_id('name', $id)); ?>


            <?php
            /**
             *             <select class="form-control selectpicker" data-live-search="true" name="client_id" required="">
              <?php //foreach ( contacts_list_by_type(1) as $key => $contacts_list ) { ?>
              <?php foreach (contacts_headoffice_list() as $key => $headoffice) { ?>
              <optgroup label="<?php echo contacts_formated($headoffice['id']); ?>">
              <?php
              foreach (contacts_list_according_company_and_type($headoffice['id'], 1) as $key => $contacts_list) {

              if ($contacts_list['id'] != _options_option('default_id_company')) {
              ?>
              <option value="<?php echo "$contacts_list[id]"; ?>" >
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
    <?php # /cliente_id    ?>




    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
