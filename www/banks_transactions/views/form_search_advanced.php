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
# Fecha de creacion del documento: 2024-09-16 12:09:23 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="banks_transactions">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # client_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="client_id"><?php _t("Client_id"); ?></label>
        <div class="col-sm-8">
               <select name="client_id" class="form-control selectpicker" id="client_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                contacts_select("id", array("id"), $banks_transactions->getClient_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /client_id ?>

    <?php # document ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="document"><?php _t("Document"); ?></label>
        <div class="col-sm-8">
               <select name="document" class="form-control selectpicker" id="document" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                controllers_select("controller", array("controller"), $banks_transactions->getDocument() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /document ?>

    <?php # document_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="document_id"><?php _t("Document_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="document_id" class="form-control" id="document_id" placeholder="document_id"   value="" >
        </div>	
    </div>
    <?php # /document_id ?>

    <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t("Type"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="type" class="form-control" id="type" placeholder="type"   value="" >
        </div>	
    </div>
    <?php # /type ?>

    <?php # account_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="account_number"><?php _t("Account_number"); ?></label>
        <div class="col-sm-8">
               <select name="account_number" class="form-control selectpicker" id="account_number" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                banks_select("account_number", array("account_number"), $banks_transactions->getAccount_number() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /account_number ?>

    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t("Total"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="total" class="form-control" id="total" placeholder="total"   required=""  value="" >
        </div>	
    </div>
    <?php # /total ?>

    <?php # operation_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="operation_number"><?php _t("Operation_number"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="operation_number" class="form-control" id="operation_number" placeholder="operation_number"  required=""  value="" >
        </div>	
    </div>
    <?php # /operation_number ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # ref ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref"><?php _t("Ref"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref" class="form-control" id="ref" placeholder="ref - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . ref . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /ref ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . description . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /description ?>

    <?php # ce ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ce"><?php _t("Ce"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="ce" class="form-control" id="ce" placeholder="ce"  value="" >
        </div>	
    </div>
    <?php # /ce ?>

    <?php # details ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="details"><?php _t("Details"); ?></label>
        <div class="col-sm-8">
            <textarea name="details" class="form-control" id="details" placeholder="details - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . details . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /details ?>

    <?php # message ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="message"><?php _t("Message"); ?></label>
        <div class="col-sm-8">
            <textarea name="message" class="form-control" id="message" placeholder="message - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . message . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /message ?>

    <?php # currency ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="currency"><?php _t("Currency"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="currency" class="form-control" id="currency" placeholder="currency"  value="" >
        </div>	
    </div>
    <?php # /currency ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code"  value="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # registre_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="registre_date"><?php _t("Registre_date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="registre_date" class="form-control" id="registre_date" placeholder="registre_date"  required=""  value="" >
        </div>	
    </div>
    <?php # /registre_date ?>

    <?php # created_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="created_date"><?php _t("Created_date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="created_date" class="form-control" id="created_date" placeholder="created_date"  required=""  value="" >
        </div>	
    </div>
    <?php # /created_date ?>

    <?php # updated_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="updated_date"><?php _t("Updated_date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="updated_date" class="form-control" id="updated_date" placeholder="updated_date"  value="" >
        </div>	
    </div>
    <?php # /updated_date ?>

    <?php # canceled_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="canceled_code"><?php _t("Canceled_code"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="canceled_code" class="form-control" id="canceled_code" placeholder="canceled_code"   value="" >
        </div>	
    </div>
    <?php # /canceled_code ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
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
