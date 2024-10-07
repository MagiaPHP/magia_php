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
# Fecha de creacion del documento: 2024-09-04 08:09:40 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="cpanel">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start contact_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t(ucfirst("contact_id")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="contact_id" class="form-control" id="contact_id" placeholder="contact_id"   required=""  value="" >
</div>
    </div>
    <!-- mg_end contact_id -->

    <!-- mg_start domain -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="domain"><?php _t(ucfirst("domain")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="domain" class="form-control" id="domain" placeholder="domain"  value="" >
</div>
    </div>
    <!-- mg_end domain -->

    <!-- mg_start subdomain -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="subdomain"><?php _t(ucfirst("subdomain")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="subdomain" class="form-control" id="subdomain" placeholder="subdomain"  value="" >
</div>
    </div>
    <!-- mg_end subdomain -->

    <!-- mg_start db -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="db"><?php _t(ucfirst("db")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="db" class="form-control" id="db" placeholder="db"  value="" >
</div>
    </div>
    <!-- mg_end db -->

    <!-- mg_start user_db -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="user_db"><?php _t(ucfirst("user_db")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="user_db" class="form-control" id="user_db" placeholder="user_db"  value="" >
</div>
    </div>
    <!-- mg_end user_db -->

    <!-- mg_start user_db_pass -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="user_db_pass"><?php _t(ucfirst("user_db_pass")); ?>  * </label>
        <div class="col-sm-8">            <textarea name="user_db_pass" class="form-control" id="user_db_pass" placeholder="user_db_pass - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . user_db_pass . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end user_db_pass -->

    <!-- mg_start email -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="email"><?php _t(ucfirst("email")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="email" class="form-control" id="email" placeholder="email"  value="" >
</div>
    </div>
    <!-- mg_end email -->

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
