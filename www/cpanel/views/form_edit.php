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
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $cpanel->getId(); ?>">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="contact_id" class="form-control" id="contact_id" placeholder="contact_id"   required=""  value="<?php echo $cpanel->getContact_id(); ?>" >
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # domain ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="domain"><?php _t("Domain"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="domain" class="form-control" id="domain" placeholder="domain"  value="<?php echo $cpanel->getDomain(); ?>" >
        </div>	
    </div>
    <?php # /domain ?>

    <?php # subdomain ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="subdomain"><?php _t("Subdomain"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="subdomain" class="form-control" id="subdomain" placeholder="subdomain"  value="<?php echo $cpanel->getSubdomain(); ?>" >
        </div>	
    </div>
    <?php # /subdomain ?>

    <?php # db ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="db"><?php _t("Db"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="db" class="form-control" id="db" placeholder="db"  value="<?php echo $cpanel->getDb(); ?>" >
        </div>	
    </div>
    <?php # /db ?>

    <?php # user_db ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="user_db"><?php _t("User_db"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="user_db" class="form-control" id="user_db" placeholder="user_db"  value="<?php echo $cpanel->getUser_db(); ?>" >
        </div>	
    </div>
    <?php # /user_db ?>

    <?php # user_db_pass ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="user_db_pass"><?php _t("User_db_pass"); ?></label>
        <div class="col-sm-8">
            <textarea name="user_db_pass" class="form-control" id="user_db_pass" placeholder="user_db_pass - textarea" ><?php echo $cpanel->getUser_db_pass(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . user_db_pass . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /user_db_pass ?>

    <?php # email ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="email"><?php _t("Email"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="email" class="form-control" id="email" placeholder="email"  value="<?php echo $cpanel->getEmail(); ?>" >
        </div>	
    </div>
    <?php # /email ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   value="<?php echo $cpanel->getOrder_by(); ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1" <?php echo ($cpanel->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($cpanel->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

