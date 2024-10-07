<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="banks_lines">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo $banks_lines->getId(); ?>">
    <?php # my_account ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="my_account"><?php _t("My_account"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="my_account" class="form-control" id="my_account" placeholder="my_account" value="<?php echo $banks_lines->getMy_account(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /my_account ?>

    <?php # operation ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="operation"><?php _t("Operation"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="operation" class="form-control" id="operation" placeholder="operation" value="<?php echo $banks_lines->getOperation(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /operation ?>

    <?php # date_operation ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_operation"><?php _t("Date_operation"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_operation" class="form-control" id="date_operation" placeholder="date_operation" value="<?php echo $banks_lines->getDate_operation(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date_operation ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea 
                name="description" 
                class="form-control" 
                id="description" 
                placeholder="description - textarea"  
                rows="5"
                disabled="" ><?php echo $banks_lines->getDescription(); ?></textarea>

        </div>	
    </div>
    <?php # /description ?>

    <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t("Type"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="type" class="form-control" id="type" placeholder="type" value="<?php echo $banks_lines->getType(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /type ?>

    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t("Total"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="total" class="form-control" id="total" placeholder="total" value="<?php echo $banks_lines->getTotal(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /total ?>

    <?php # currency ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="currency"><?php _t("Currency"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="currency" class="form-control" id="currency" placeholder="currency" value="<?php echo $banks_lines->getCurrency(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /currency ?>

    <?php # date_value ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_value"><?php _t("Date_value"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_value" class="form-control" id="date_value" placeholder="date_value" value="<?php echo $banks_lines->getDate_value(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date_value ?>

    <?php # account_sender ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="account_sender"><?php _t("Account_sender"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="account_sender" class="form-control" id="account_sender" placeholder="account_sender" value="<?php echo $banks_lines->getAccount_sender(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /account_sender ?>

    <?php # sender ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="sender"><?php _t("Sender"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="sender" class="form-control" id="sender" placeholder="sender" value="<?php echo $banks_lines->getSender(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /sender ?>

    <?php # comunication ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="comunication"><?php _t("Comunication"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="comunication" class="form-control" id="comunication" placeholder="comunication" value="<?php echo $banks_lines->getComunication(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /comunication ?>

    <?php # ce ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ce"><?php _t("Ce"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="ce" class="form-control" id="ce" placeholder="ce" value="<?php echo $banks_lines->getCe(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /ce ?>

    <?php # details ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="details"><?php _t("Details"); ?></label>
        <div class="col-sm-8">
            <textarea 
                name="details" 
                class="form-control" 
                id="details" 
                placeholder="details - textarea"  
                disabled="" 
                rows="5"
                ><?php echo $banks_lines->getDetails(); ?></textarea>
        </div>	
    </div>
    <?php # /details ?>

    <?php # message ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="message"><?php _t("Message"); ?></label>
        <div class="col-sm-8">
            <textarea name="message" class="form-control" id="message" placeholder="message - textarea"  disabled="" ><?php echo $banks_lines->getMessage(); ?></textarea>
        </div>	
    </div>
    <?php # /message ?>

    <?php # ref ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref"><?php _t("Ref"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref" class="form-control" id="ref" placeholder="ref - textarea"  disabled="" ><?php echo $banks_lines->getRef(); ?></textarea>
        </div>	
    </div>
    <?php # /ref ?>

    <?php # ref2 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref2"><?php _t("Ref2"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref2" class="form-control" id="ref2" placeholder="ref2 - textarea"  disabled="" ><?php echo $banks_lines->getRef2(); ?></textarea>
        </div>	
    </div>
    <?php # /ref2 ?>

    <?php # ref3 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref3"><?php _t("Ref3"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref3" class="form-control" id="ref3" placeholder="ref3 - textarea"  disabled="" ><?php echo $banks_lines->getRef3(); ?></textarea>
        </div>	
    </div>
    <?php # /ref3 ?>

    <?php # ref4 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref4"><?php _t("Ref4"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref4" class="form-control" id="ref4" placeholder="ref4 - textarea"  disabled="" ><?php echo $banks_lines->getRef4(); ?></textarea>
        </div>	
    </div>
    <?php # /ref4 ?>

    <?php # ref5 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref5"><?php _t("Ref5"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref5" class="form-control" id="ref5" placeholder="ref5 - textarea"  disabled="" ><?php echo $banks_lines->getRef5(); ?></textarea>
        </div>	
    </div>
    <?php # /ref5 ?>

    <?php # ref6 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref6"><?php _t("Ref6"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref6" class="form-control" id="ref6" placeholder="ref6 - textarea"  disabled="" ><?php echo $banks_lines->getRef6(); ?></textarea>
        </div>	
    </div>
    <?php # /ref6 ?>

    <?php # ref7 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref7"><?php _t("Ref7"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref7" class="form-control" id="ref7" placeholder="ref7 - textarea"  disabled="" ><?php echo $banks_lines->getRef7(); ?></textarea>
        </div>	
    </div>
    <?php # /ref7 ?>

    <?php # ref8 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref8"><?php _t("Ref8"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref8" class="form-control" id="ref8" placeholder="ref8 - textarea"  disabled="" ><?php echo $banks_lines->getRef8(); ?></textarea>
        </div>	
    </div>
    <?php # /ref8 ?>

    <?php # ref9 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref9"><?php _t("Ref9"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref9" class="form-control" id="ref9" placeholder="ref9 - textarea"  disabled="" ><?php echo $banks_lines->getRef9(); ?></textarea>

        </div>	
    </div>
    <?php # /ref9 ?>

    <?php # ref10 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref10"><?php _t("Ref10"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref10" class="form-control" id="ref10" placeholder="ref10 - textarea"  disabled="" ><?php echo $banks_lines->getRef10(); ?></textarea>

        </div>	
    </div>
    <?php # /ref10 ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_registre"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_registre" class="form-control" id="date_registre" placeholder="date_registre" value="<?php echo $banks_lines->getDate_registre(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date_registre ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <textarea name="code" class="form-control" id="code" placeholder="code - textarea"  disabled="" ><?php echo $banks_lines->getCode(); ?></textarea>        
        </div>	
    </div>
    <?php # /code ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $banks_lines->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control selectpicker" id="status" data-live-search="true"  disabled="" >
                <?php // banks_lines_status_select("code", array("code"), $banks_lines->getStatus(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    

            <button type="submit" class="btn btn-default"><?php echo icon("pencil"); ?> <?php _t("Edit"); ?></button>

        </div>      							
    </div>      							

</form>

