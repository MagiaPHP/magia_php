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
# Fecha de creacion del documento: 2024-09-26 17:09:07 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="tasks">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # category_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="category_id"><?php _t("Category_id"); ?></label>
        <div class="col-sm-8">
               <select name="category_id" class="form-control selectpicker" id="category_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                tasks_categories_select("id", array("id"), $tasks->getCategory_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /category_id ?>

    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
               <select name="contact_id" class="form-control selectpicker" id="contact_id" data-live-search="true" >
                        
                <?php contacts_select("id", array("name", "lastname"), $tasks->getContact_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="title" class="form-control" id="title" placeholder="title"  required=""  value="" >
        </div>	
    </div>
    <?php # /title ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . description . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /description ?>

    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">
               <select name="controller" class="form-control selectpicker" id="controller" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                controllers_select("controller", array("controller"), $tasks->getController() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /controller ?>

    <?php # doc_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="doc_id"><?php _t("Doc_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="doc_id" class="form-control" id="doc_id" placeholder="doc_id"   value="" >
        </div>	
    </div>
    <?php # /doc_id ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_registre"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_registre" class="form-control" id="date_registre" placeholder="date_registre"  required=""  value="" >
        </div>	
    </div>
    <?php # /date_registre ?>

    <?php # date_update ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_update"><?php _t("Date_update"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_update" class="form-control" id="date_update" placeholder="date_update"  value="" >
        </div>	
    </div>
    <?php # /date_update ?>

    <?php # color ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="color"><?php _t("Color"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="color" class="form-control" id="color" placeholder="color"  value="" >
        </div>	
    </div>
    <?php # /color ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
               <select name="status" class="form-control selectpicker" id="status" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                tasks_status_select("code", array("code"), $tasks->getStatus() , array()); ?>                        
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
