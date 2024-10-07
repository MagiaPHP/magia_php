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
# Fecha de creacion del documento: 2024-09-16 19:09:36 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="chat">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $chat->getId(); ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
               <select name="contact_id" class="form-control selectpicker" id="contact_id" data-live-search="true"  disabled="" >
                        
                <?php users_select("id", array("name", "lastname"), $chat->getContact_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # order_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_id"><?php _t("Order_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_id" class="form-control" id="order_id" placeholder="order_id"   required=""  value="<?php echo $chat->getOrder_id(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_id ?>

    <?php # message ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="message"><?php _t("Message"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="message" class="form-control" id="message" placeholder="message"  required=""  value="<?php echo $chat->getMessage(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /message ?>

    <?php # user ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="user"><?php _t("User"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="user" class="form-control" id="user" placeholder="user"  required=""  value="<?php echo $chat->getUser(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /user ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

