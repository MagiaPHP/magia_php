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
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="banks_transactions">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $banks_transactions->getId(); ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # client_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="client_id"><?php _t("Client_id"); ?></label>
        <div class="col-sm-8">
               <select name="client_id" class="form-control selectpicker" id="client_id" data-live-search="true"  disabled="" >
                    
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
               <select name="document" class="form-control selectpicker" id="document" data-live-search="true"  disabled="" >
                    
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
            <input type="number" step="any" name="document_id" class="form-control" id="document_id" placeholder="document_id"   value="<?php echo $banks_transactions->getDocument_id(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /document_id ?>

    <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t("Type"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="type" class="form-control" id="type" placeholder="type"   value="<?php echo $banks_transactions->getType(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /type ?>

    <?php # account_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="account_number"><?php _t("Account_number"); ?></label>
        <div class="col-sm-8">
               <select name="account_number" class="form-control selectpicker" id="account_number" data-live-search="true"  disabled="" >
                    
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
            <input type="number" step="any" name="total" class="form-control" id="total" placeholder="total"   required=""  value="<?php echo $banks_transactions->getTotal(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /total ?>

    <?php # operation_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="operation_number"><?php _t("Operation_number"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="operation_number" class="form-control" id="operation_number" placeholder="operation_number"  required=""  value="<?php echo $banks_transactions->getOperation_number(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /operation_number ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="<?php echo $banks_transactions->getDate(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # ref ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref"><?php _t("Ref"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref" class="form-control" id="ref" placeholder="ref - textarea"  disabled="" ><?php echo $banks_transactions->getRef(); ?></textarea>    <script>
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
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea"  disabled="" ><?php echo $banks_transactions->getDescription(); ?></textarea>    <script>
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
            <input type="text" name="ce" class="form-control" id="ce" placeholder="ce"  value="<?php echo $banks_transactions->getCe(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /ce ?>

    <?php # details ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="details"><?php _t("Details"); ?></label>
        <div class="col-sm-8">
            <textarea name="details" class="form-control" id="details" placeholder="details - textarea"  disabled="" ><?php echo $banks_transactions->getDetails(); ?></textarea>    <script>
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
            <textarea name="message" class="form-control" id="message" placeholder="message - textarea"  disabled="" ><?php echo $banks_transactions->getMessage(); ?></textarea>    <script>
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
            <input type="text" name="currency" class="form-control" id="currency" placeholder="currency"  value="<?php echo $banks_transactions->getCurrency(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /currency ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code"  value="<?php echo $banks_transactions->getCode(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # registre_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="registre_date"><?php _t("Registre_date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="registre_date" class="form-control" id="registre_date" placeholder="registre_date"  required=""  value="<?php echo $banks_transactions->getRegistre_date(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /registre_date ?>

    <?php # created_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="created_date"><?php _t("Created_date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="created_date" class="form-control" id="created_date" placeholder="created_date"  required=""  value="<?php echo $banks_transactions->getCreated_date(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /created_date ?>

    <?php # updated_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="updated_date"><?php _t("Updated_date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="updated_date" class="form-control" id="updated_date" placeholder="updated_date"  value="<?php echo $banks_transactions->getUpdated_date(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /updated_date ?>

    <?php # canceled_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="canceled_code"><?php _t("Canceled_code"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="canceled_code" class="form-control" id="canceled_code" placeholder="canceled_code"   value="<?php echo $banks_transactions->getCanceled_code(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /canceled_code ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $banks_transactions->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($banks_transactions->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($banks_transactions->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

