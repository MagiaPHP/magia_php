<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-10-01 09:10:44 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo $contacts->getId(); ?>">
        <?php # owner_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="owner_id"><?php _t("Owner id"); ?></label>
        <div class="col-sm-8">
               <select name="owner_id" class="form-control selectpicker" id="owner_id" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                contacts_select("id", array("id"), $contacts->getOwner_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /owner_id ?>

    <?php # office_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="office_id"><?php _t("Office id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="office_id" class="form-control" id="office_id" placeholder="office_id"   value="<?php echo $contacts->getOffice_id(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /office_id ?>

    <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t("Type"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="type" class="form-control" id="type" placeholder="type"   value="<?php echo $contacts->getType(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /type ?>

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">
               <select name="title" class="form-control selectpicker" id="title" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                contacts_titles_select("title", array("title"), $contacts->getTitle() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /title ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="name" class="form-control" id="name" placeholder="name"  value="<?php echo $contacts->getName(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # lastname ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="lastname"><?php _t("Lastname"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="lastname"  value="<?php echo $contacts->getLastname(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /lastname ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea"  disabled="" ><?php echo $contacts->getDescription(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . description . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /description ?>

    <?php # birthdate ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="birthdate"><?php _t("Birthdate"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="birthdate" class="form-control" id="birthdate" placeholder="birthdate"  value="<?php echo $contacts->getBirthdate(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /birthdate ?>

    <?php # tva ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="tva"><?php _t("Tva"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="tva" class="form-control" id="tva" placeholder="tva"  value="<?php echo $contacts->getTva(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /tva ?>

    <?php # billing_method ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="billing_method"><?php _t("Billing method"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="billing_method" class="form-control" id="billing_method" placeholder="billing_method"  value="<?php echo $contacts->getBilling_method(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /billing_method ?>

    <?php # discounts ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="discounts"><?php _t("Discounts"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="discounts" class="form-control" id="discounts" placeholder="discounts"   value="<?php echo $contacts->getDiscounts(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /discounts ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code"  value="<?php echo $contacts->getCode(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # language ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="language"><?php _t("Language"); ?></label>
        <div class="col-sm-8">
               <select name="language" class="form-control selectpicker" id="language" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                _languages_select("language", array("language"), $contacts->getLanguage() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /language ?>

    <?php # registre_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="registre_date"><?php _t("Registre date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="registre_date" class="form-control" id="registre_date" placeholder="registre_date"  required=""  value="<?php echo $contacts->getRegistre_date(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /registre_date ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   value="<?php echo $contacts->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($contacts->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($contacts->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            
            <button type="submit" class="btn btn-default"><?php echo icon("pencil");  ?> <?php _t("Edit"); ?></button>

        </div>      							
    </div>      							

</form>

