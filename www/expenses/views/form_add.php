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
# Fecha de creacion del documento: 2024-09-23 11:09:25 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start office_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="office_id"><?php _t(ucfirst("office_id")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="office_id" class="form-control" id="office_id" placeholder="office_id"   value="" >
</div>
    </div>
    <!-- mg_end office_id -->

    <!-- mg_start office_id_counter_year_month -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="office_id_counter_year_month"><?php _t(ucfirst("office_id_counter_year_month")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="office_id_counter_year_month" class="form-control" id="office_id_counter_year_month" placeholder="office_id_counter_year_month"   value="" >
</div>
    </div>
    <!-- mg_end office_id_counter_year_month -->

    <!-- mg_start office_id_counter_year_trimestre -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="office_id_counter_year_trimestre"><?php _t(ucfirst("office_id_counter_year_trimestre")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="office_id_counter_year_trimestre" class="form-control" id="office_id_counter_year_trimestre" placeholder="office_id_counter_year_trimestre"   value="" >
</div>
    </div>
    <!-- mg_end office_id_counter_year_trimestre -->

    <!-- mg_start office_id_counter -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="office_id_counter"><?php _t(ucfirst("office_id_counter")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="office_id_counter" class="form-control" id="office_id_counter" placeholder="office_id_counter"   value="" >
</div>
    </div>
    <!-- mg_end office_id_counter -->

    <!-- mg_start my_ref -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="my_ref"><?php _t(ucfirst("my_ref")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="my_ref" class="form-control" id="my_ref" placeholder="my_ref"  value="" >
</div>
    </div>
    <!-- mg_end my_ref -->

    <!-- mg_start father_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="father_id"><?php _t(ucfirst("father_id")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="father_id" class="form-control" id="father_id" placeholder="father_id"   value="" >
</div>
    </div>
    <!-- mg_end father_id -->

    <!-- mg_start category_code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="category_code"><?php _t(ucfirst("category_code")); ?> </label>
        <div class="col-sm-8">               <select name="category_code" class="form-control selectpicker" id="category_code" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                expenses_categories_select("code", array("code"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end category_code -->

    <!-- mg_start invoice_number -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="invoice_number"><?php _t(ucfirst("invoice_number")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="invoice_number" class="form-control" id="invoice_number" placeholder="invoice_number"  value="" >
<p class="help-block"><?php echo _tr("invoice number from client"); ?></p></div>
    </div>
    <!-- mg_end invoice_number -->

    <!-- mg_start budget_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="budget_id"><?php _t(ucfirst("budget_id")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="budget_id" class="form-control" id="budget_id" placeholder="budget_id"   value="" >
</div>
    </div>
    <!-- mg_end budget_id -->

    <!-- mg_start credit_note_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="credit_note_id"><?php _t(ucfirst("credit_note_id")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="credit_note_id" class="form-control" id="credit_note_id" placeholder="credit_note_id"   value="" >
</div>
    </div>
    <!-- mg_end credit_note_id -->

    <!-- mg_start provider_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="provider_id"><?php _t(ucfirst("provider_id")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="provider_id" class="form-control" id="provider_id" placeholder="provider_id"   required=""  value="" >
</div>
    </div>
    <!-- mg_end provider_id -->

    <!-- mg_start seller_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="seller_id"><?php _t(ucfirst("seller_id")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="seller_id" class="form-control" id="seller_id" placeholder="seller_id"   value="" >
</div>
    </div>
    <!-- mg_end seller_id -->

    <!-- mg_start clon_from_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="clon_from_id"><?php _t(ucfirst("clon_from_id")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="clon_from_id" class="form-control" id="clon_from_id" placeholder="clon_from_id"   value="" >
</div>
    </div>
    <!-- mg_end clon_from_id -->

    <!-- mg_start title -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t(ucfirst("title")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="title" class="form-control" id="title" placeholder="title"  value="" >
</div>
    </div>
    <!-- mg_end title -->

    <!-- mg_start addresses_billing -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="addresses_billing"><?php _t(ucfirst("addresses_billing")); ?> </label>
        <div class="col-sm-8">            <textarea name="addresses_billing" class="form-control" id="addresses_billing" placeholder="addresses_billing - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . addresses_billing . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end addresses_billing -->

    <!-- mg_start addresses_delivery -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="addresses_delivery"><?php _t(ucfirst("addresses_delivery")); ?> </label>
        <div class="col-sm-8">            <textarea name="addresses_delivery" class="form-control" id="addresses_delivery" placeholder="addresses_delivery - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . addresses_delivery . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end addresses_delivery -->

    <!-- mg_start date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t(ucfirst("date")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="date" class="form-control" id="date" placeholder="date"  value="" >
</div>
    </div>
    <!-- mg_end date -->

    <!-- mg_start date_registre -->
    <!-- mg_start deadline -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="deadline"><?php _t(ucfirst("deadline")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="deadline" class="form-control" id="deadline" placeholder="deadline"  value="" >
</div>
    </div>
    <!-- mg_end deadline -->

    <!-- mg_start total -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t(ucfirst("total")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="total" class="form-control" id="total" placeholder="total"   value="" >
</div>
    </div>
    <!-- mg_end total -->

    <!-- mg_start tax -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="tax"><?php _t(ucfirst("tax")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="tax" class="form-control" id="tax" placeholder="tax"   value="" >
</div>
    </div>
    <!-- mg_end tax -->

    <!-- mg_start advance -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="advance"><?php _t(ucfirst("advance")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="advance" class="form-control" id="advance" placeholder="advance"   value="" >
</div>
    </div>
    <!-- mg_end advance -->

    <!-- mg_start balance -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="balance"><?php _t(ucfirst("balance")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="balance" class="form-control" id="balance" placeholder="balance"   value="" >
</div>
    </div>
    <!-- mg_end balance -->

    <!-- mg_start comments -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="comments"><?php _t(ucfirst("comments")); ?> </label>
        <div class="col-sm-8">            <textarea name="comments" class="form-control" id="comments" placeholder="comments - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . comments . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end comments -->

    <!-- mg_start comments_private -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="comments_private"><?php _t(ucfirst("comments_private")); ?> </label>
        <div class="col-sm-8">            <textarea name="comments_private" class="form-control" id="comments_private" placeholder="comments_private - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . comments_private . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end comments_private -->

    <!-- mg_start r1 -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="r1"><?php _t(ucfirst("r1")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="r1" class="form-control" id="r1" placeholder="r1"  value="" >
</div>
    </div>
    <!-- mg_end r1 -->

    <!-- mg_start r2 -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="r2"><?php _t(ucfirst("r2")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="r2" class="form-control" id="r2" placeholder="r2"  value="" >
</div>
    </div>
    <!-- mg_end r2 -->

    <!-- mg_start r3 -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="r3"><?php _t(ucfirst("r3")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="r3" class="form-control" id="r3" placeholder="r3"  value="" >
</div>
    </div>
    <!-- mg_end r3 -->

    <!-- mg_start fc -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="fc"><?php _t(ucfirst("fc")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="fc" class="form-control" id="fc" placeholder="fc"  value="" >
</div>
    </div>
    <!-- mg_end fc -->

    <!-- mg_start date_update -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_update"><?php _t(ucfirst("date_update")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="date_update" class="form-control" id="date_update" placeholder="date_update"  value="" >
</div>
    </div>
    <!-- mg_end date_update -->

    <!-- mg_start days -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="days"><?php _t(ucfirst("days")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="days" class="form-control" id="days" placeholder="days"   value="" >
</div>
    </div>
    <!-- mg_end days -->

    <!-- mg_start ce -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="ce"><?php _t(ucfirst("ce")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="ce" class="form-control" id="ce" placeholder="ce"  value="" >
</div>
    </div>
    <!-- mg_end ce -->

    <!-- mg_start code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t(ucfirst("code")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="code" class="form-control" id="code" placeholder="code"  value="" >
</div>
    </div>
    <!-- mg_end code -->

    <!-- mg_start type -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t(ucfirst("type")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="type" class="form-control" id="type" placeholder="type"  value="" >
</div>
    </div>
    <!-- mg_end type -->

    <!-- mg_start every -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="every"><?php _t(ucfirst("every")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="every" class="form-control" id="every" placeholder="every"  value="" >
</div>
    </div>
    <!-- mg_end every -->

    <!-- mg_start times -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="times"><?php _t(ucfirst("times")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="times" class="form-control" id="times" placeholder="times"   value="" >
</div>
    </div>
    <!-- mg_end times -->

    <!-- mg_start date_start -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t(ucfirst("date_start")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start"  value="" >
</div>
    </div>
    <!-- mg_end date_start -->

    <!-- mg_start date_end -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t(ucfirst("date_end")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="date_end" class="form-control" id="date_end" placeholder="date_end"  value="" >
</div>
    </div>
    <!-- mg_end date_end -->

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
