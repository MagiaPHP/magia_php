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
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="addresses">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
               <select name="contact_id" class="form-control selectpicker" id="contact_id" data-live-search="true" >
                        
                <?php contacts_select("id", array("name", "lastname"), $addresses->getContact_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="name" class="form-control" id="name" placeholder="name"  required=""  value="" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # address ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="address"><?php _t("Address"); ?></label>
        <div class="col-sm-8">
            <textarea name="address" class="form-control" id="address" placeholder="address - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . address . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /address ?>

    <?php # number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="number"><?php _t("Number"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="number" class="form-control" id="number" placeholder="number"  required=""  value="" >
        </div>	
    </div>
    <?php # /number ?>

    <?php # postcode ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="postcode"><?php _t("Postcode"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="postcode" class="form-control" id="postcode" placeholder="postcode"  required=""  value="" >
        </div>	
    </div>
    <?php # /postcode ?>

    <?php # barrio ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="barrio"><?php _t("Barrio"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="barrio" class="form-control" id="barrio" placeholder="barrio"  required=""  value="" >
        </div>	
    </div>
    <?php # /barrio ?>

    <?php # sector ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="sector"><?php _t("Sector"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="sector" class="form-control" id="sector" placeholder="sector"  value="" >
        </div>	
    </div>
    <?php # /sector ?>

    <?php # ref ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref"><?php _t("Ref"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref" class="form-control" id="ref" placeholder="ref - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . ref . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /ref ?>

    <?php # city ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="city"><?php _t("City"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="city" class="form-control" id="city" placeholder="city"  required=""  value="" >
        </div>	
    </div>
    <?php # /city ?>

    <?php # province ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="province"><?php _t("Province"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="province" class="form-control" id="province" placeholder="province"  value="" >
        </div>	
    </div>
    <?php # /province ?>

    <?php # region ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="region"><?php _t("Region"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="region" class="form-control" id="region" placeholder="region"  value="" >
        </div>	
    </div>
    <?php # /region ?>

    <?php # country ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="country"><?php _t("Country"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="country" class="form-control" id="country" placeholder="country"  required=""  value="" >
        </div>	
    </div>
    <?php # /country ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code"  value="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
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
