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
# Fecha de creacion del documento: 2024-09-18 03:09:07 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="cv_motivation_letter">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # sender_name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="sender_name"><?php _t("Sender_name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="sender_name" class="form-control" id="sender_name" placeholder="sender_name"  value="" >
        </div>	
    </div>
    <?php # /sender_name ?>

    <?php # sender_email ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="sender_email"><?php _t("Sender_email"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="sender_email" class="form-control" id="sender_email" placeholder="sender_email"  value="" >
        </div>	
    </div>
    <?php # /sender_email ?>

    <?php # sender_phone ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="sender_phone"><?php _t("Sender_phone"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="sender_phone" class="form-control" id="sender_phone" placeholder="sender_phone"  value="" >
        </div>	
    </div>
    <?php # /sender_phone ?>

    <?php # sender_address ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="sender_address"><?php _t("Sender_address"); ?></label>
        <div class="col-sm-8">
            <textarea name="sender_address" class="form-control" id="sender_address" placeholder="sender_address - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . sender_address . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /sender_address ?>

    <?php # letter_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="letter_date"><?php _t("Letter_date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="letter_date" class="form-control" id="letter_date" placeholder="letter_date"  value="" >
        </div>	
    </div>
    <?php # /letter_date ?>

    <?php # recipient_name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="recipient_name"><?php _t("Recipient_name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="recipient_name" class="form-control" id="recipient_name" placeholder="recipient_name"  value="" >
        </div>	
    </div>
    <?php # /recipient_name ?>

    <?php # recipient_position ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="recipient_position"><?php _t("Recipient_position"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="recipient_position" class="form-control" id="recipient_position" placeholder="recipient_position"  value="" >
        </div>	
    </div>
    <?php # /recipient_position ?>

    <?php # recipient_company ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="recipient_company"><?php _t("Recipient_company"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="recipient_company" class="form-control" id="recipient_company" placeholder="recipient_company"  value="" >
        </div>	
    </div>
    <?php # /recipient_company ?>

    <?php # recipient_address ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="recipient_address"><?php _t("Recipient_address"); ?></label>
        <div class="col-sm-8">
            <textarea name="recipient_address" class="form-control" id="recipient_address" placeholder="recipient_address - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . recipient_address . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /recipient_address ?>

    <?php # greeting ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="greeting"><?php _t("Greeting"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="greeting" class="form-control" id="greeting" placeholder="greeting"  value="" >
        </div>	
    </div>
    <?php # /greeting ?>

    <?php # introduction ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="introduction"><?php _t("Introduction"); ?></label>
        <div class="col-sm-8">
            <textarea name="introduction" class="form-control" id="introduction" placeholder="introduction - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . introduction . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /introduction ?>

    <?php # body_experience ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="body_experience"><?php _t("Body_experience"); ?></label>
        <div class="col-sm-8">
            <textarea name="body_experience" class="form-control" id="body_experience" placeholder="body_experience - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . body_experience . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /body_experience ?>

    <?php # body_achievements ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="body_achievements"><?php _t("Body_achievements"); ?></label>
        <div class="col-sm-8">
            <textarea name="body_achievements" class="form-control" id="body_achievements" placeholder="body_achievements - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . body_achievements . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /body_achievements ?>

    <?php # motivation ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="motivation"><?php _t("Motivation"); ?></label>
        <div class="col-sm-8">
            <textarea name="motivation" class="form-control" id="motivation" placeholder="motivation - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . motivation . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /motivation ?>

    <?php # closing ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="closing"><?php _t("Closing"); ?></label>
        <div class="col-sm-8">
            <textarea name="closing" class="form-control" id="closing" placeholder="closing - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . closing . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /closing ?>

    <?php # farewell ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="farewell"><?php _t("Farewell"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="farewell" class="form-control" id="farewell" placeholder="farewell"  value="" >
        </div>	
    </div>
    <?php # /farewell ?>

    <?php # signature ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="signature"><?php _t("Signature"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="signature" class="form-control" id="signature" placeholder="signature"  value="" >
        </div>	
    </div>
    <?php # /signature ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   value="" >
        </div>	
    </div>
    <?php # /order_by ?>

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
