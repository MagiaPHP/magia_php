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
# Fecha de creacion del documento: 2024-09-04 10:09:08 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="banks_lines">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start my_account -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="my_account"><?php _t(ucfirst("my_account")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="my_account" class="form-control" id="my_account" placeholder="my_account"  value="" >
</div>
    </div>
    <!-- mg_end my_account -->

    <!-- mg_start operation -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="operation"><?php _t(ucfirst("operation")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="operation" class="form-control" id="operation" placeholder="operation"  value="" >
</div>
    </div>
    <!-- mg_end operation -->

    <!-- mg_start date_operation -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_operation"><?php _t(ucfirst("date_operation")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="date_operation" class="form-control" id="date_operation" placeholder="date_operation"  value="" >
</div>
    </div>
    <!-- mg_end date_operation -->

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

    <!-- mg_start type -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t(ucfirst("type")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="type" class="form-control" id="type" placeholder="type"  value="" >
</div>
    </div>
    <!-- mg_end type -->

    <!-- mg_start total -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t(ucfirst("total")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="total" class="form-control" id="total" placeholder="total"   value="" >
</div>
    </div>
    <!-- mg_end total -->

    <!-- mg_start currency -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="currency"><?php _t(ucfirst("currency")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="currency" class="form-control" id="currency" placeholder="currency"  value="" >
</div>
    </div>
    <!-- mg_end currency -->

    <!-- mg_start date_value -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_value"><?php _t(ucfirst("date_value")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="date_value" class="form-control" id="date_value" placeholder="date_value"  value="" >
</div>
    </div>
    <!-- mg_end date_value -->

    <!-- mg_start account_sender -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="account_sender"><?php _t(ucfirst("account_sender")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="account_sender" class="form-control" id="account_sender" placeholder="account_sender"  value="" >
</div>
    </div>
    <!-- mg_end account_sender -->

    <!-- mg_start sender -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="sender"><?php _t(ucfirst("sender")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="sender" class="form-control" id="sender" placeholder="sender"  value="" >
</div>
    </div>
    <!-- mg_end sender -->

    <!-- mg_start comunication -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="comunication"><?php _t(ucfirst("comunication")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="comunication" class="form-control" id="comunication" placeholder="comunication"  value="" >
</div>
    </div>
    <!-- mg_end comunication -->

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

    <!-- mg_start id_office -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="id_office"><?php _t(ucfirst("id_office")); ?> </label>
        <div class="col-sm-8">            <textarea name="id_office" class="form-control" id="id_office" placeholder="id_office - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . id_office . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end id_office -->

    <!-- mg_start office_name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="office_name"><?php _t(ucfirst("office_name")); ?> </label>
        <div class="col-sm-8">            <textarea name="office_name" class="form-control" id="office_name" placeholder="office_name - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . office_name . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end office_name -->

    <!-- mg_start value_bankCheck_transaction -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="value_bankCheck_transaction"><?php _t(ucfirst("value_bankCheck_transaction")); ?> </label>
        <div class="col-sm-8">            <textarea name="value_bankCheck_transaction" class="form-control" id="value_bankCheck_transaction" placeholder="value_bankCheck_transaction - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . value_bankCheck_transaction . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end value_bankCheck_transaction -->

    <!-- mg_start countable_balance -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="countable_balance"><?php _t(ucfirst("countable_balance")); ?> </label>
        <div class="col-sm-8">            <textarea name="countable_balance" class="form-control" id="countable_balance" placeholder="countable_balance - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . countable_balance . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end countable_balance -->

    <!-- mg_start suffix_account -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="suffix_account"><?php _t(ucfirst("suffix_account")); ?> </label>
        <div class="col-sm-8">            <textarea name="suffix_account" class="form-control" id="suffix_account" placeholder="suffix_account - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . suffix_account . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end suffix_account -->

    <!-- mg_start sequential -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="sequential"><?php _t(ucfirst("sequential")); ?> </label>
        <div class="col-sm-8">            <textarea name="sequential" class="form-control" id="sequential" placeholder="sequential - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . sequential . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end sequential -->

    <!-- mg_start available_balance -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="available_balance"><?php _t(ucfirst("available_balance")); ?> </label>
        <div class="col-sm-8">            <textarea name="available_balance" class="form-control" id="available_balance" placeholder="available_balance - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . available_balance . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end available_balance -->

    <!-- mg_start debit -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="debit"><?php _t(ucfirst("debit")); ?> </label>
        <div class="col-sm-8">            <textarea name="debit" class="form-control" id="debit" placeholder="debit - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . debit . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end debit -->

    <!-- mg_start credit -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="credit"><?php _t(ucfirst("credit")); ?> </label>
        <div class="col-sm-8">            <textarea name="credit" class="form-control" id="credit" placeholder="credit - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . credit . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end credit -->

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

    <!-- mg_start ref2 -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref2"><?php _t(ucfirst("ref2")); ?> </label>
        <div class="col-sm-8">            <textarea name="ref2" class="form-control" id="ref2" placeholder="ref2 - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . ref2 . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end ref2 -->

    <!-- mg_start ref3 -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref3"><?php _t(ucfirst("ref3")); ?> </label>
        <div class="col-sm-8">            <textarea name="ref3" class="form-control" id="ref3" placeholder="ref3 - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . ref3 . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end ref3 -->

    <!-- mg_start ref4 -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref4"><?php _t(ucfirst("ref4")); ?> </label>
        <div class="col-sm-8">            <textarea name="ref4" class="form-control" id="ref4" placeholder="ref4 - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . ref4 . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end ref4 -->

    <!-- mg_start ref5 -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref5"><?php _t(ucfirst("ref5")); ?> </label>
        <div class="col-sm-8">            <textarea name="ref5" class="form-control" id="ref5" placeholder="ref5 - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . ref5 . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end ref5 -->

    <!-- mg_start ref6 -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref6"><?php _t(ucfirst("ref6")); ?> </label>
        <div class="col-sm-8">            <textarea name="ref6" class="form-control" id="ref6" placeholder="ref6 - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . ref6 . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end ref6 -->

    <!-- mg_start ref7 -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref7"><?php _t(ucfirst("ref7")); ?> </label>
        <div class="col-sm-8">            <textarea name="ref7" class="form-control" id="ref7" placeholder="ref7 - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . ref7 . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end ref7 -->

    <!-- mg_start ref8 -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref8"><?php _t(ucfirst("ref8")); ?> </label>
        <div class="col-sm-8">            <textarea name="ref8" class="form-control" id="ref8" placeholder="ref8 - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . ref8 . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end ref8 -->

    <!-- mg_start ref9 -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref9"><?php _t(ucfirst("ref9")); ?> </label>
        <div class="col-sm-8">            <textarea name="ref9" class="form-control" id="ref9" placeholder="ref9 - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . ref9 . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end ref9 -->

    <!-- mg_start ref10 -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref10"><?php _t(ucfirst("ref10")); ?> </label>
        <div class="col-sm-8">            <textarea name="ref10" class="form-control" id="ref10" placeholder="ref10 - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . ref10 . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end ref10 -->

    <!-- mg_start date_registre -->
    <!-- mg_start code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t(ucfirst("code")); ?>  * </label>
        <div class="col-sm-8">            <textarea name="code" class="form-control" id="code" placeholder="code - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . code . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end code -->

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
