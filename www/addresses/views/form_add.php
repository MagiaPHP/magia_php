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
# Fecha de creacion del documento: 2024-10-02 17:10:10 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="addresses">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"] ?? 1 ; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start contact_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t(ucfirst("contact_id")); ?>  * </label>
        <div class="col-sm-8">               <select name="contact_id" class="form-control selectpicker" id="contact_id" data-live-search="true" >
                        
                <?php contacts_select("id", array("name", "lastname"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end contact_id -->

    <!-- mg_start name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t(ucfirst("name")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="name" class="form-control" id="name" placeholder="name"  required=""  value="" >
</div>
    </div>
    <!-- mg_end name -->

    <!-- mg_start address -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="address"><?php _t(ucfirst("address")); ?>  * </label>
        <div class="col-sm-8">            <textarea name="address" class="form-control" id="address" placeholder="address - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . address . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end address -->

    <!-- mg_start number -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="number"><?php _t(ucfirst("number")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="number" class="form-control" id="number" placeholder="number"  required=""  value="" >
</div>
    </div>
    <!-- mg_end number -->

    <!-- mg_start postcode -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="postcode"><?php _t(ucfirst("postcode")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="postcode" class="form-control" id="postcode" placeholder="postcode"  required=""  value="" >
</div>
    </div>
    <!-- mg_end postcode -->

    <!-- mg_start barrio -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="barrio"><?php _t(ucfirst("barrio")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="barrio" class="form-control" id="barrio" placeholder="barrio"  required=""  value="" >
</div>
    </div>
    <!-- mg_end barrio -->

    <!-- mg_start sector -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="sector"><?php _t(ucfirst("sector")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="sector" class="form-control" id="sector" placeholder="sector"  value="" >
</div>
    </div>
    <!-- mg_end sector -->

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

    <!-- mg_start city -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="city"><?php _t(ucfirst("city")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="city" class="form-control" id="city" placeholder="city"  required=""  value="" >
</div>
    </div>
    <!-- mg_end city -->

    <!-- mg_start province -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="province"><?php _t(ucfirst("province")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="province" class="form-control" id="province" placeholder="province"  value="" >
</div>
    </div>
    <!-- mg_end province -->

    <!-- mg_start region -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="region"><?php _t(ucfirst("region")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="region" class="form-control" id="region" placeholder="region"  value="" >
</div>
    </div>
    <!-- mg_end region -->

    <!-- mg_start country -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="country"><?php _t(ucfirst("country")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="country" class="form-control" id="country" placeholder="country"  required=""  value="" >
</div>
    </div>
    <!-- mg_end country -->

    <!-- mg_start code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t(ucfirst("code")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="code" class="form-control" id="code" placeholder="code"  value="" >
</div>
    </div>
    <!-- mg_end code -->

    <!-- mg_start status -->
  
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus");  ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>   

<p>* <?php _t("Required"); ?></p>

</form>
