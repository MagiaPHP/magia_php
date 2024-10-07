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
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"] ?? 1 ; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start owner_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="owner_id"><?php _t(ucfirst("owner_id")); ?> </label>
        <div class="col-sm-8">               <select name="owner_id" class="form-control selectpicker" id="owner_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                contacts_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end owner_id -->

    <!-- mg_start office_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="office_id"><?php _t(ucfirst("office_id")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="office_id" class="form-control" id="office_id" placeholder="office_id"   value="" >
</div>
    </div>
    <!-- mg_end office_id -->

    <!-- mg_start type -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t(ucfirst("type")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="type" class="form-control" id="type" placeholder="type"   value="" >
</div>
    </div>
    <!-- mg_end type -->

    <!-- mg_start title -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t(ucfirst("title")); ?> </label>
        <div class="col-sm-8">               <select name="title" class="form-control selectpicker" id="title" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                contacts_titles_select("title", array("title"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end title -->

    <!-- mg_start name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t(ucfirst("name")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="name" class="form-control" id="name" placeholder="name"  value="" >
</div>
    </div>
    <!-- mg_end name -->

    <!-- mg_start lastname -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="lastname"><?php _t(ucfirst("lastname")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="lastname"  value="" >
</div>
    </div>
    <!-- mg_end lastname -->

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

    <!-- mg_start birthdate -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="birthdate"><?php _t(ucfirst("birthdate")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="birthdate" class="form-control" id="birthdate" placeholder="birthdate"  value="" >
</div>
    </div>
    <!-- mg_end birthdate -->

    <!-- mg_start tva -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="tva"><?php _t(ucfirst("tva")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="tva" class="form-control" id="tva" placeholder="tva"  value="" >
</div>
    </div>
    <!-- mg_end tva -->

    <!-- mg_start billing_method -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="billing_method"><?php _t(ucfirst("billing_method")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="billing_method" class="form-control" id="billing_method" placeholder="billing_method"  value="" >
</div>
    </div>
    <!-- mg_end billing_method -->

    <!-- mg_start discounts -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="discounts"><?php _t(ucfirst("discounts")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="discounts" class="form-control" id="discounts" placeholder="discounts"   value="" >
</div>
    </div>
    <!-- mg_end discounts -->

    <!-- mg_start code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t(ucfirst("code")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="code" class="form-control" id="code" placeholder="code"  value="" >
</div>
    </div>
    <!-- mg_end code -->

    <!-- mg_start language -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="language"><?php _t(ucfirst("language")); ?> </label>
        <div class="col-sm-8">               <select name="language" class="form-control selectpicker" id="language" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                _languages_select("language", array("language"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end language -->

    <!-- mg_start registre_date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="registre_date"><?php _t(ucfirst("registre_date")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="registre_date" class="form-control" id="registre_date" placeholder="registre_date"  required=""  value="current_timestamp()" >
</div>
    </div>
    <!-- mg_end registre_date -->

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
