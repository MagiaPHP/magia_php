<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="banks_lines">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


    <?php # my_account ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="my_account"><?php _t("My_account"); ?></label>
        <div class="col-sm-8">

            <select name="my_account" class="form-control selectpicker" id="my_account" data-live-search="true" >
                <option value="all"><?php _t("All"); ?></option>                
                <?php banks_select("account_number", "account_number", null, array()); ?>                                                                      
            </select>


        </div>	
    </div>
    <?php # /my_account ?>

    <?php # operation ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="operation"><?php _t("Operation"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="operation" class="form-control" id="operation" placeholder="operation" value="" >
        </div>	
    </div>
    <?php # /operation ?>

    <?php # date_operation ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_operation"><?php _t("Date_operation"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_operation" class="form-control" id="date_operation" placeholder="date_operation" value="" >
        </div>	
    </div>
    <?php # /date_operation ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ></textarea>
        </div>	
    </div>
    <?php # /description ?>

    <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t("Type"); ?></label>
        <div class="col-sm-8">
            <select name="type" class="form-control selectpicker" id="type" data-live-search="true" >
                <option value="all"><?php _t("All"); ?></option>                
                <option value="in"><?php _t("Money in"); ?></option>                                                            
                <option value="out"><?php _t("Money out"); ?></option>                                                            
            </select>
        </div>	
    </div>
    <?php # /type ?>

    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t("Total"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="total" class="form-control" id="total" placeholder="total" value="" >
        </div>	
    </div>
    <?php # /total ?>

    <?php # currency ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="currency"><?php _t("Currency"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="currency" class="form-control" id="currency" placeholder="currency" value="" >
        </div>	
    </div>
    <?php # /currency ?>

    <?php # date_val ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_val"><?php _t("Date_val"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_val" class="form-control" id="date_val" placeholder="date_val" value="" >
        </div>	
    </div>
    <?php # /date_val ?>

    <?php # account ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="account"><?php _t("Account"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="account" class="form-control" id="account" placeholder="account" value="" >
        </div>	
    </div>
    <?php # /account ?>

    <?php # sender ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="sender"><?php _t("Sender"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="sender" class="form-control" id="sender" placeholder="sender" value="" >
        </div>	
    </div>
    <?php # /sender ?>

    <?php # comunication ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="comunication"><?php _t("Comunication"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="comunication" class="form-control" id="comunication" placeholder="comunication" value="" >
        </div>	
    </div>
    <?php # /comunication ?>

    <?php # ce ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ce"><?php _t("Ce"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="ce" class="form-control" id="ce" placeholder="ce" value="" >
        </div>	
    </div>
    <?php # /ce ?>

    <?php # ref ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref"><?php _t("Ref"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="ref" class="form-control" id="ref" placeholder="ref" value="" >
        </div>	
    </div>
    <?php # /ref ?>

    <?php # ref2 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref2"><?php _t("Ref2"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="ref2" class="form-control" id="ref2" placeholder="ref2" value="" >
        </div>	
    </div>
    <?php # /ref2 ?>

    <?php # ref3 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref3"><?php _t("Ref3"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="ref3" class="form-control" id="ref3" placeholder="ref3" value="" >
        </div>	
    </div>
    <?php # /ref3 ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_registre"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_registre" class="form-control" id="date_registre" placeholder="date_registre" value="" >
        </div>	
    </div>
    <?php # /date_registre ?>

    <?php # status_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status_code"><?php _t("Status_code"); ?></label>
        <div class="col-sm-8">
            <select name="status_code" class="form-control selectpicker" id="status_code" data-live-search="true" >
                <option value="all"><?php _t("All"); ?></option>                
                <?php //  banks_lines_status_select("code", "name", $banks_lines->getStatus_code(), array()); ?>                        
                <?php banks_lines_status_select("code", "name", null, array()); ?>                                                                      
            </select>
        </div>	
    </div>
    <?php # /status_code ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >   
                <option value="all"><?php _t("All"); ?></option>                

                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Search"); ?>">
        </div>      							
    </div>      							

</form>
