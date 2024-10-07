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
# Fecha de creacion del documento: 2024-09-04 08:09:19 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="currencies">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t(ucfirst("name")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="name" class="form-control" id="name" placeholder="name"  required=""  value="" >
<p class="help-block"><?php echo _tr("Currency Code (ISO 4217)"); ?></p></div>
    </div>
    <!-- mg_end name -->

    <!-- mg_start code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t(ucfirst("code")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="code" class="form-control" id="code" placeholder="code"  required=""  value="" >
<p class="help-block"><?php echo _tr("Currency sign, to be used when printing amounts."); ?></p></div>
    </div>
    <!-- mg_end code -->

    <!-- mg_start rate -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="rate"><?php _t(ucfirst("rate")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="rate" class="form-control" id="rate" placeholder="rate"  required=""  value="" >
<p class="help-block"><?php echo _tr("Current Rate"); ?></p></div>
    </div>
    <!-- mg_end rate -->

    <!-- mg_start rate_silent -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="rate_silent"><?php _t(ucfirst("rate_silent")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="rate_silent" class="form-control" id="rate_silent" placeholder="rate_silent"  required=""  value="" >
</div>
    </div>
    <!-- mg_end rate_silent -->

    <!-- mg_start rate_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="rate_id"><?php _t(ucfirst("rate_id")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="rate_id" class="form-control" id="rate_id" placeholder="rate_id"   required=""  value="" >
</div>
    </div>
    <!-- mg_end rate_id -->

    <!-- mg_start accuracy -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="accuracy"><?php _t(ucfirst("accuracy")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="accuracy" class="form-control" id="accuracy" placeholder="accuracy"   required=""  value="" >
</div>
    </div>
    <!-- mg_end accuracy -->

    <!-- mg_start rounding -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="rounding"><?php _t(ucfirst("rounding")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="rounding" class="form-control" id="rounding" placeholder="rounding"  required=""  value="" >
</div>
    </div>
    <!-- mg_end rounding -->

    <!-- mg_start active -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="active"><?php _t(ucfirst("active")); ?>  * </label>
        <div class="col-sm-8">            <select name="active" class="form-control" id="active" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end active -->

    <!-- mg_start company_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="company_id"><?php _t(ucfirst("company_id")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="company_id" class="form-control" id="company_id" placeholder="company_id"   required=""  value="" >
</div>
    </div>
    <!-- mg_end company_id -->

    <!-- mg_start date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t(ucfirst("date")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="" >
</div>
    </div>
    <!-- mg_end date -->

    <!-- mg_start base -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="base"><?php _t(ucfirst("base")); ?>  * </label>
        <div class="col-sm-8">            <select name="base" class="form-control" id="base" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end base -->

    <!-- mg_start position -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="position"><?php _t(ucfirst("position")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="position" class="form-control" id="position" placeholder="position"  required=""  value="after" >
<p class="help-block"><?php echo _tr("Determines where the currency symbol should be placed after or before the amount."); ?></p></div>
    </div>
    <!-- mg_end position -->

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
