<?php
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-22 12:08:14 
//vardump($arg);
//
//vardump($arg["redi"]); 
//vardump($arg["redi"]['redi']); 
?>

<form class="form-horizontal" action="index.php" method="post" >

    <input type="hidden" name="c" value="banks_transactions">
    <input type="hidden" name="a" value="ok_add">

    <input type="hidden" name="client_id" value="<?php echo $arg["client_id"]; ?>">
    <input type="hidden" name="document" value="<?php echo $arg["document"]; ?>">
    <input type="hidden" name="document_id" value="<?php echo $arg["document_id"]; ?>">

    <input type="hidden" name="type" value="<?php echo $arg["type"]; ?>">
    <input type="hidden" name="code" value="<?php echo $arg["code"]; ?>">
    <input type="hidden" name="canceled" value="<?php echo $arg["canceled"]; ?>">
    <input type="hidden" name="canceled_code" value="<?php echo $arg["canceled_code"]; ?>">
    <input type="hidden" name="ce" value="<?php echo $arg["ce"]; ?>">




    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]['redi']; ?>">
    <input type="hidden" name="redi[c]" value="<?php echo $arg["redi"]['c']; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo $arg["redi"]['a']; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo $arg["redi"]['params']; ?>">


    <?php # account_number    ?>
    <div class="form-group">
        <label class="control-label col-sm-4" for="account_number"><?php _t("Account_number"); ?></label>
        <div class="col-sm-8">


            <select class="form-control" name="account_number" id="account_number">
                <?php
                // solo bancos con status 1
                // solo bancos con status 1

                foreach (banks_list_by_contact_id_status($u_owner_id, 1) as $key => $bank) {
                    echo '<option value="' . $bank['account_number'] . '">' . $bank['bank'] . ' : ' . $bank['account_number'] . '</option>';
                }
                ?>
            </select>

        </div>	
    </div>
<?php # /account_number    ?>

    <?php # total    ?>
    <div class="form-group">
        <label class="control-label col-sm-4" for="total"><?php _t("Total"); ?> *</label>
        <div class="col-sm-8">
            <input 
                type="number" 
                step="any" 
                name="total" 
                class="form-control" 
                id="total" 
                placeholder="" 
                value="" 

                >
        </div>	
    </div>
<?php # /total    ?>

    <?php # operation_number    ?>
    <div class="form-group">
        <label class="control-label col-sm-4" for="operation_number"><?php _t("Operation number"); ?> *</label>
        <div class="col-sm-8">
            <input type="text" name="operation_number" class="form-control" id="operation_number" placeholder="" value="" >

            <p class="help-block">
<?php _t("According to your bank statements"); ?>
            </p>




        </div>	
    </div>
<?php # /operation_number    ?>

    <?php # ref    ?>
    <div class="form-group">
        <label class="control-label col-sm-4" for="ref"><?php _t("Ref"); ?></label>
        <div class="col-sm-8">
            <textarea name="ref" class="form-control" id="ref" placeholder="" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.ref.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
<?php # /ref    ?>

    <?php # description    ?>
    <div class="form-group">
        <label class="control-label col-sm-4" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.description.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
<?php # /description    ?>




<?php # details    ?>
    <div class="form-group">
        <label class="control-label col-sm-4" for="details"><?php _t("Details"); ?></label>
        <div class="col-sm-8">
            <textarea name="details" class="form-control" id="details" placeholder="" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.details.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
<?php # /details    ?>

    <?php # message    ?>
    <div class="form-group">
        <label class="control-label col-sm-4" for="message"><?php _t("Message"); ?></label>
        <div class="col-sm-8">
            <textarea name="message" class="form-control" id="message" placeholder="" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.message.''))
                        .catch(error => {
                        console.error(error);
                        });
            </script>
        </div>	
    </div>
<?php # /message    ?>

    <?php # date    ?>
    <div class="form-group">
        <label class="control-label col-sm-4" for="date"><?php _t("Date"); ?> *</label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date" value=""  >
        </div>	
    </div>
<?php # /date    ?>

    <?php # date_registre   ?>






<?php # /status    ?>


    <div class="form-group">
        <label class="control-label col-sm-4" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>
