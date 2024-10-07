<form class="form-horizontal" action ="index.php" method ="post" >

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_edit_company">
    <input type="hidden" name="id" value="<?php echo $contact['id'] ?>">

    <div class="form-group">
        <label class="control-label col-sm-2" for="id"><?php _t("id"); ?></label>	
        <div class="col-sm-8">    		
            <input class="form-control" type ="text " name ="" id=""value="<?php echo "$contact[id]"; ?>" disabled=""/>
        </div>
    </div>	



    <?php
    /*
      <div class="form-group">
      <label class="control-label col-sm-2" for="name"><?php _t("Type") ; ?></label>
      <div class="col-sm-8">
      <input class="form-control" type ="text " name ="name" id="name"value="<?php echo _tr(contacts_type($contact['type'])) ; ?>" disabled=""/>
      </div>
      </div>
     *    <div class="form-group">
      <label class="control-label col-sm-2" for="owner_id"><?php _t("Owner id"); ?></label>
      <div class="col-sm-8">
      <select class="form-control" name="owner_id">
      <option value="null">actual: <?php echo $contact['owner_id']; ?></option>
      <?php
      foreach (contacts_list_by_type(1) as $key => $contacts_list_by_type) {

      $selected = ($contacts_list_by_type['id'] == $contact['owner_id'] ) ? " selected " : "";

      echo '<option value="' . $contacts_list_by_type['id'] . '" ' . $selected . '>' . $contacts_list_by_type['name'] . '</option>';
      }
      ?>
      </select>
      </div>
      </div> */
    ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Office name"); ?></label>	
        <div class="col-sm-8">    		
            <input class="form-control" type ="text " name="name" id="name" value="<?php echo "$contact[name]"; ?>"/>
        </div>
    </div>



    <?php if (offices_is_headoffice($id)) { ?>


        <div class="form-group">
            <label class="control-label col-sm-2" for="name"><?php _t("Tva"); ?></label>	
            <div class="col-sm-8">    		
                <input class="form-control" type ="text " name="tva" id="tva" value="<?php echo "$contact[tva]"; ?>"/>
            </div>
        </div>



        <div class="form-group">
            <label class="control-label col-sm-2" for="discounts"><?php _t("Discounts"); ?></label>	
            <div class="col-sm-8">    

                <div class="input-group">                    
                    <input 
                        type="text" 
                        class="form-control" 
                        name="discounts" 
                        id="discounts" 
                        value="<?php echo "$contact[discounts]"; ?>" 
                        placeholder=""
                        readonly="">
                    <div class="input-group-addon">%</div>
                </div>

                <p class="help-block"><?php _t("This percentage is applied to all purchases made by this customer"); ?></p>


            </div>


        </div>






    <?php } ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Language"); ?></label>
        <div class="col-sm-8">            
            <select class="form-control" name="language">
                <?php
                foreach (_languages_list_by_status(1) as $lang) {
                    $selected = ($lang['language'] == $contact['language']) ? " selected " : "";
                    ?>
                    <option value="<?php echo ($lang['language']); ?>" <?php echo $selected; ?>><?php echo _tr(_languages_field_language('name', $lang['language'])); ?></option>                    
                <?php } ?>
            </select>  

            <span id="status" class="help-block">
                <?php _t("The preferred language for this company"); ?>
            </span>
        </div>
    </div>






    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">            
            <select class="form-control" name="status">
                <?php
                foreach (contacts_status_list() as $status) {
                    $selected = ($status == $contact['status']) ? " selected " : "";
                    ?>
                    <option value="<?php echo ($status); ?>" <?php echo $selected; ?>><?php echo _tr(offices_status($status)); ?></option>                    
                <?php } ?>
            </select>                                                
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-sm-2" for="name"></label>	
        <div class="col-sm-8">    		
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Update"); ?>">
        </div>
    </div>	

</form>

