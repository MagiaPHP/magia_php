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
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start client_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="client_id"><?php _t(ucfirst("client_id")); ?> </label>
        <div class="col-sm-8">               <select name="client_id" class="form-control selectpicker" id="client_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                contacts_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end client_id -->

    <!-- mg_start document -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="document"><?php _t(ucfirst("document")); ?> </label>
        <div class="col-sm-8">               <select name="document" class="form-control selectpicker" id="document" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                controllers_select("controller", array("controller"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end document -->

    <!-- mg_start document_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="document_id"><?php _t(ucfirst("document_id")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="document_id" class="form-control" id="document_id" placeholder="document_id"   value="" >
</div>
    </div>
    <!-- mg_end document_id -->

    <!-- mg_start type -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t(ucfirst("type")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="type" class="form-control" id="type" placeholder="type"   value="" >
</div>
    </div>
    <!-- mg_end type -->

    <!-- mg_start account_number -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="account_number"><?php _t(ucfirst("account_number")); ?> </label>
        <div class="col-sm-8">               <select name="account_number" class="form-control selectpicker" id="account_number" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                banks_select("account_number", array("account_number"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end account_number -->

    <!-- mg_start total -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t(ucfirst("total")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="total" class="form-control" id="total" placeholder="total"   required=""  value="" >
</div>
    </div>
    <!-- mg_end total -->

    <!-- mg_start operation_number -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="operation_number"><?php _t(ucfirst("operation_number")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="operation_number" class="form-control" id="operation_number" placeholder="operation_number"  required=""  value="" >
</div>
    </div>
    <!-- mg_end operation_number -->

    <!-- mg_start date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t(ucfirst("date")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="" >
</div>
    </div>
    <!-- mg_end date -->

    <!-- mg_start ref -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref"><?php _t(ucfirst("ref")); ?> </label>
        <div class="col-sm-8">            <textarea name="ref" class="form-control" id="ref" placeholder="ref - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . ref . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end ref -->

    <!-- mg_start description -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t(ucfirst("description")); ?> </label>
        <div class="col-sm-8">            <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . description . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end description -->

    <!-- mg_start ce -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="ce"><?php _t(ucfirst("ce")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="ce" class="form-control" id="ce" placeholder="ce"  value="" >
</div>
    </div>
    <!-- mg_end ce -->

    <!-- mg_start details -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="details"><?php _t(ucfirst("details")); ?> </label>
        <div class="col-sm-8">            <textarea name="details" class="form-control" id="details" placeholder="details - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . details . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end details -->

    <!-- mg_start message -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="message"><?php _t(ucfirst("message")); ?> </label>
        <div class="col-sm-8">            <textarea name="message" class="form-control" id="message" placeholder="message - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . message . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end message -->

    <!-- mg_start currency -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="currency"><?php _t(ucfirst("currency")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="currency" class="form-control" id="currency" placeholder="currency"  value="" >
</div>
    </div>
    <!-- mg_end currency -->

    <!-- mg_start code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t(ucfirst("code")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="code" class="form-control" id="code" placeholder="code"  value="" >
</div>
    </div>
    <!-- mg_end code -->

    <!-- mg_start registre_date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="registre_date"><?php _t(ucfirst("registre_date")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="registre_date" class="form-control" id="registre_date" placeholder="registre_date"  required=""  value="current_timestamp()" >
</div>
    </div>
    <!-- mg_end registre_date -->

    <!-- mg_start created_date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="created_date"><?php _t(ucfirst("created_date")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="created_date" class="form-control" id="created_date" placeholder="created_date"  required=""  value="current_timestamp()" >
</div>
    </div>
    <!-- mg_end created_date -->

    <!-- mg_start updated_date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="updated_date"><?php _t(ucfirst("updated_date")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="updated_date" class="form-control" id="updated_date" placeholder="updated_date"  value="current_timestamp()" >
</div>
    </div>
    <!-- mg_end updated_date -->

    <!-- mg_start canceled_code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="canceled_code"><?php _t(ucfirst("canceled_code")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="canceled_code" class="form-control" id="canceled_code" placeholder="canceled_code"   value="" >
</div>
    </div>
    <!-- mg_end canceled_code -->

    <!-- mg_start order_by -->
    <!-- mg_start status -->
  
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus");  ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>   

<p>* <?php _t("Required"); ?></p>

</form>
