<form class="form-inline" method="post">
    <input type="hidden" name="c" value="budgets">
    <input type="hidden" name="a" value="ok_contact_update">
    <input type="hidden" name="id" value="<?php echo $budgets['id']; ?>">
    <input type="hidden" name="redi" value="1">



    <div class="form-group">
        <label 
            class="sr-only" 
            for="new_client_id">
                <?php _t("Contact"); ?>
        </label>
        <input 
            type="text" 
            class="form-control" 
            id="new_client_id"
            name="new_client_id"
            placeholder=""
            value="<?php echo contacts_formated($budgets['client_id']) ?>"
            required=""
            readonly=""
            >

        <select class="form-control selectpicker" data-live-search="true" name="new_client_id" required="">                
            <?php foreach (contacts_headoffice_list() as $key => $headoffice) { ?>
                <optgroup label="<?php echo contacts_formated($headoffice['id']); ?>">                    
                    <?php
                    foreach (contacts_list_according_company_and_type($headoffice['id'], 1) as $key => $offices_list) {

                        $selected = ($offices_list['id'] == $budgets['client_id'] ) ? " selected " : "";

                        if ($offices_list['id'] != _options_option('default_id_company')) {
                            ?>                                                  
                            <option value="<?php echo "$offices_list[id]"; ?>" <?php echo $selected; ?>>
                                <?php echo $offices_list['id'] . ",  " . contacts_formated($offices_list['id']); ?>
                            </option>   
                            <?php
                        }
                    }
                    ?>                    
                </optgroup>                    
            <?php } ?>
        </select>

    </div>

    <button 
        type="submit" 
        class="btn btn-primary">
            <?php _t("Change"); ?>
    </button>
</form>