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
# Fecha de creacion del documento: 2024-09-26 08:09:54 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="messages">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $messages->getId(); ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t("Type"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="type" class="form-control" id="type" placeholder="type"  value="<?php echo $messages->getType(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /type ?>

    <?php # message ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="message"><?php _t("Message"); ?></label>
        <div class="col-sm-8">
            <textarea name="message" class="form-control" id="message" placeholder="message - textarea"  disabled="" ><?php echo $messages->getMessage(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . message . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /message ?>

    <?php # url_action ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="url_action"><?php _t("Url_action"); ?></label>
        <div class="col-sm-8">
            <textarea name="url_action" class="form-control" id="url_action" placeholder="url_action - textarea"  disabled="" ><?php echo $messages->getUrl_action(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . url_action . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /url_action ?>

    <?php # url_label ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="url_label"><?php _t("Url_label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="url_label" class="form-control" id="url_label" placeholder="url_label"  value="<?php echo $messages->getUrl_label(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /url_label ?>

    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="controller" class="form-control" id="controller" placeholder="controller"  value="<?php echo $messages->getController(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /controller ?>

    <?php # doc_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="doc_id"><?php _t("Doc_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="doc_id" class="form-control" id="doc_id" placeholder="doc_id"   value="<?php echo $messages->getDoc_id(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /doc_id ?>

    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="contact_id" class="form-control" id="contact_id" placeholder="contact_id"   value="<?php echo $messages->getContact_id(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # rol ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="rol"><?php _t("Rol"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="rol" class="form-control" id="rol" placeholder="rol"  value="<?php echo $messages->getRol(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /rol ?>

    <?php # date_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t("Date_start"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start"  value="<?php echo $messages->getDate_start(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date_start ?>

    <?php # date_end ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t("Date_end"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_end" class="form-control" id="date_end" placeholder="date_end"  value="<?php echo $messages->getDate_end(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date_end ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_registre"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_registre" class="form-control" id="date_registre" placeholder="date_registre"  required=""  value="<?php echo $messages->getDate_registre(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date_registre ?>

    <?php # read_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="read_by"><?php _t("Read_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="read_by" class="form-control" id="read_by" placeholder="read_by"   value="<?php echo $messages->getRead_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /read_by ?>

    <?php # is_logued ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="is_logued"><?php _t("Is_logued"); ?></label>
        <div class="col-sm-8">
            <select name="is_logued" class="form-control" id="is_logued"  disabled="" >                
                <option value="1" <?php echo ($messages->getIs_logued() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($messages->getIs_logued() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /is_logued ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $messages->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($messages->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($messages->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

