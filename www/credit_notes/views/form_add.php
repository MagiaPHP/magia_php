<form class="form-horizontal" action="index.php" method="post" >

    <input type="hidden" name="c" value="credit_notes">
    <input type="hidden" name="a" value="ok_add_by_client">



    <input type="hidden" name="redi[redi]" value="3">


    <?php
    /**
     * Si es multi tva, debo tener las oficionas 
     */
    if (IS_MULTI_VAT) {
        ?>
        <?php # office_id  ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for="id"><?php _t("Office"); ?></label>
            <div class="col-sm-8">
                <select class="form-control" name="office_id" id="office_id">
                    <?php
                    foreach (offices_list_by_headoffice($u_owner_id) as $key => $office) {
                        echo '<option value="' . $office['id'] . '">' . contacts_formated($office['id']) . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <?php # /office_id   ?>
    <?php }
    ?>


    <?php # cliente_id    ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="client_id"><?php _t("Client"); ?></label>
        <div class="col-sm-8">
            <select class="form-control selectpicker" data-live-search="true" name="client_id" required="">               
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
        </div>	
    </div>
    <?php # /cliente_id       ?>


    <?php # date    ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input class="form-control" type="date" name="date" id="date">
        </div>	
    </div>
    <?php # /cliente_id       ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-primary">
                <?php echo _t("Next"); ?>
                <?php echo icon("chevron-right"); ?>
            </button>
        </div>      							
    </div>      							

</form>
