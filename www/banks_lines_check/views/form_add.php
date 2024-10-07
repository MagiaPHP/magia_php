<?php
# MagiaPHP 
# file date creation: 2024-05-22 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="banks_lines_check">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    <?php # my_account ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="my_account"><?php _t("My_account"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="my_account" class="form-control" id="my_account" placeholder="my_account" value="" >
        </div>	
    </div>
    <?php # /my_account ?>

    <?php # operation ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="operation"><?php _t("Operation"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="operation" class="form-control" id="operation" placeholder="operation" value="" >
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

    <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t("Type"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="type" class="form-control" id="type" placeholder="type" value="" >
        </div>	
    </div>
    <?php # /type ?>

    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t("Total"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="total" class="form-control" id="total" placeholder="total" value="" >
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

    <?php # date_value ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_value"><?php _t("Date_value"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_value" class="form-control" id="date_value" placeholder="date_value" value="" >
        </div>	
    </div>
    <?php # /date_value ?>

    <?php # account_sender ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="account_sender"><?php _t("Account_sender"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="account_sender" class="form-control" id="account_sender" placeholder="account_sender" value="" >
        </div>	
    </div>
    <?php # /account_sender ?>

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

    <?php # id_office ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="id_office"><?php _t("Id_office"); ?></label>
        <div class="col-sm-8">
            <textarea name="id_office" class="form-control" id="id_office" placeholder="id_office - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.id_office.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /id_office ?>

    <?php # office_name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="office_name"><?php _t("Office_name"); ?></label>
        <div class="col-sm-8">
            <textarea name="office_name" class="form-control" id="office_name" placeholder="office_name - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.office_name.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /office_name ?>

    <?php # value_bankCheck_transaction ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="value_bankCheck_transaction"><?php _t("Value_bankCheck_transaction"); ?></label>
        <div class="col-sm-8">
            <textarea name="value_bankCheck_transaction" class="form-control" id="value_bankCheck_transaction" placeholder="value_bankCheck_transaction - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.value_bankCheck_transaction.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /value_bankCheck_transaction ?>

    <?php # countable_balance ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="countable_balance"><?php _t("Countable_balance"); ?></label>
        <div class="col-sm-8">
            <textarea name="countable_balance" class="form-control" id="countable_balance" placeholder="countable_balance - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.countable_balance.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /countable_balance ?>

    <?php # suffix_account ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="suffix_account"><?php _t("Suffix_account"); ?></label>
        <div class="col-sm-8">
            <textarea name="suffix_account" class="form-control" id="suffix_account" placeholder="suffix_account - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.suffix_account.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /suffix_account ?>

    <?php # sequential ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="sequential"><?php _t("Sequential"); ?></label>
        <div class="col-sm-8">
            <textarea name="sequential" class="form-control" id="sequential" placeholder="sequential - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.sequential.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /sequential ?>

    <?php # available_balance ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="available_balance"><?php _t("Available_balance"); ?></label>
        <div class="col-sm-8">
            <textarea name="available_balance" class="form-control" id="available_balance" placeholder="available_balance - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.available_balance.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /available_balance ?>

    <?php # debit ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="debit"><?php _t("Debit"); ?></label>
        <div class="col-sm-8">
            <textarea name="debit" class="form-control" id="debit" placeholder="debit - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.debit.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /debit ?>

    <?php # credit ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="credit"><?php _t("Credit"); ?></label>
        <div class="col-sm-8">
            <textarea name="credit" class="form-control" id="credit" placeholder="credit - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.credit.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /credit ?>

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

    <?php # ref2 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref2"><?php _t("Ref2"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref2" class="form-control" id="ref2" placeholder="ref2 - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.ref2.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /ref2 ?>

    <?php # ref3 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref3"><?php _t("Ref3"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref3" class="form-control" id="ref3" placeholder="ref3 - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.ref3.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /ref3 ?>

    <?php # ref4 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref4"><?php _t("Ref4"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref4" class="form-control" id="ref4" placeholder="ref4 - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.ref4.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /ref4 ?>

    <?php # ref5 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref5"><?php _t("Ref5"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref5" class="form-control" id="ref5" placeholder="ref5 - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.ref5.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /ref5 ?>

    <?php # ref6 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref6"><?php _t("Ref6"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref6" class="form-control" id="ref6" placeholder="ref6 - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.ref6.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /ref6 ?>

    <?php # ref7 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref7"><?php _t("Ref7"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref7" class="form-control" id="ref7" placeholder="ref7 - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.ref7.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /ref7 ?>

    <?php # ref8 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref8"><?php _t("Ref8"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref8" class="form-control" id="ref8" placeholder="ref8 - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.ref8.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /ref8 ?>

    <?php # ref9 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref9"><?php _t("Ref9"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref9" class="form-control" id="ref9" placeholder="ref9 - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.ref9.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /ref9 ?>

    <?php # ref10 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref10"><?php _t("Ref10"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref10" class="form-control" id="ref10" placeholder="ref10 - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.ref10.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /ref10 ?>

    <?php # date_registre ?>
    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <textarea name="code" class="form-control" id="code" placeholder="code - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.code.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /code ?>

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
