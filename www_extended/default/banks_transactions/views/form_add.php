<?php
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-22 12:08:14 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="banks_transactions">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    <?php # client_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="client_id"><?php _t("Client_id"); ?></label>
        <div class="col-sm-8">
            <select name="client_id" class="form-control selectpicker" id="client_id" data-live-search="true" >

                <?php
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                contacts_select("id", array("id"), "", array());
                ?>                        
            </select>
        </div>	
    </div>
    <?php # /client_id  ?>

<?php # document  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="document"><?php _t("Document"); ?></label>
        <div class="col-sm-8">
            <select name="document" class="form-control selectpicker" id="document" data-live-search="true" >

                <?php
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                controllers_select("controller", array("controller"), "", array());
                
                
                ?>       

            </select>
        </div>	
    </div>
    <?php # /document ?>

    <?php # document_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="document_id"><?php _t("Document_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="document_id" class="form-control" id="document_id" placeholder="document_id" value="" >
        </div>	
    </div>
    <?php # /document_id ?>

    <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t("Type"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="type" class="form-control" id="type" placeholder="type" value="" >
        </div>	
    </div>
    <?php # /type ?>

    <?php # account_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="account_number"><?php _t("Account_number"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="account_number" class="form-control" id="account_number" placeholder="account_number" value="" >
        </div>	
    </div>
    <?php # /account_number ?>

    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t("Total"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="total" class="form-control" id="total" placeholder="total" value="" >
        </div>	
    </div>
    <?php # /total ?>

    <?php # operation_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="operation_number"><?php _t("Operation_number"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="operation_number" class="form-control" id="operation_number" placeholder="operation_number" value="" >
        </div>	
    </div>
    <?php # /operation_number ?>

    <?php # ref ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref"><?php _t("Ref"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref" class="form-control" id="ref" placeholder="ref - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.ref.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /ref ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.description.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /description ?>

    <?php # ce ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ce"><?php _t("Ce"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="ce" class="form-control" id="ce" placeholder="ce" value="" >
        </div>	
    </div>
    <?php # /ce ?>

    <?php # details ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="details"><?php _t("Details"); ?></label>
        <div class="col-sm-8">
            <textarea name="details" class="form-control" id="details" placeholder="details - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.details.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /details ?>

    <?php # message ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="message"><?php _t("Message"); ?></label>
        <div class="col-sm-8">
            <textarea name="message" class="form-control" id="message" placeholder="message - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.message.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /message ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date" value="" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # date_registre ?>
    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code" value="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # canceled ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="canceled"><?php _t("Canceled"); ?></label>
        <div class="col-sm-8">
            <select name="canceled" class="form-control" id="canceled" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /canceled ?>

    <?php # canceled_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="canceled_code"><?php _t("Canceled_code"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="canceled_code" class="form-control" id="canceled_code" placeholder="canceled_code" value="" >
        </div>	
    </div>
    <?php # /canceled_code ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>
