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
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="cv_motivation_letter">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start sender_name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="sender_name"><?php _t(ucfirst("sender_name")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="sender_name" class="form-control" id="sender_name" placeholder="sender_name"  value="" >
</div>
    </div>
    <!-- mg_end sender_name -->

    <!-- mg_start sender_email -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="sender_email"><?php _t(ucfirst("sender_email")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="sender_email" class="form-control" id="sender_email" placeholder="sender_email"  value="" >
</div>
    </div>
    <!-- mg_end sender_email -->

    <!-- mg_start sender_phone -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="sender_phone"><?php _t(ucfirst("sender_phone")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="sender_phone" class="form-control" id="sender_phone" placeholder="sender_phone"  value="" >
</div>
    </div>
    <!-- mg_end sender_phone -->

    <!-- mg_start sender_address -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="sender_address"><?php _t(ucfirst("sender_address")); ?> </label>
        <div class="col-sm-8">            <textarea name="sender_address" class="form-control" id="sender_address" placeholder="sender_address - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . sender_address . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end sender_address -->

    <!-- mg_start letter_date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="letter_date"><?php _t(ucfirst("letter_date")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="letter_date" class="form-control" id="letter_date" placeholder="letter_date"  value="" >
</div>
    </div>
    <!-- mg_end letter_date -->

    <!-- mg_start recipient_name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="recipient_name"><?php _t(ucfirst("recipient_name")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="recipient_name" class="form-control" id="recipient_name" placeholder="recipient_name"  value="" >
</div>
    </div>
    <!-- mg_end recipient_name -->

    <!-- mg_start recipient_position -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="recipient_position"><?php _t(ucfirst("recipient_position")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="recipient_position" class="form-control" id="recipient_position" placeholder="recipient_position"  value="" >
</div>
    </div>
    <!-- mg_end recipient_position -->

    <!-- mg_start recipient_company -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="recipient_company"><?php _t(ucfirst("recipient_company")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="recipient_company" class="form-control" id="recipient_company" placeholder="recipient_company"  value="" >
</div>
    </div>
    <!-- mg_end recipient_company -->

    <!-- mg_start recipient_address -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="recipient_address"><?php _t(ucfirst("recipient_address")); ?> </label>
        <div class="col-sm-8">            <textarea name="recipient_address" class="form-control" id="recipient_address" placeholder="recipient_address - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . recipient_address . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end recipient_address -->

    <!-- mg_start greeting -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="greeting"><?php _t(ucfirst("greeting")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="greeting" class="form-control" id="greeting" placeholder="greeting"  value="" >
</div>
    </div>
    <!-- mg_end greeting -->

    <!-- mg_start introduction -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="introduction"><?php _t(ucfirst("introduction")); ?> </label>
        <div class="col-sm-8">            <textarea name="introduction" class="form-control" id="introduction" placeholder="introduction - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . introduction . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end introduction -->

    <!-- mg_start body_experience -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="body_experience"><?php _t(ucfirst("body_experience")); ?> </label>
        <div class="col-sm-8">            <textarea name="body_experience" class="form-control" id="body_experience" placeholder="body_experience - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . body_experience . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end body_experience -->

    <!-- mg_start body_achievements -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="body_achievements"><?php _t(ucfirst("body_achievements")); ?> </label>
        <div class="col-sm-8">            <textarea name="body_achievements" class="form-control" id="body_achievements" placeholder="body_achievements - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . body_achievements . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end body_achievements -->

    <!-- mg_start motivation -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="motivation"><?php _t(ucfirst("motivation")); ?> </label>
        <div class="col-sm-8">            <textarea name="motivation" class="form-control" id="motivation" placeholder="motivation - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . motivation . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end motivation -->

    <!-- mg_start closing -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="closing"><?php _t(ucfirst("closing")); ?> </label>
        <div class="col-sm-8">            <textarea name="closing" class="form-control" id="closing" placeholder="closing - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . closing . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end closing -->

    <!-- mg_start farewell -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="farewell"><?php _t(ucfirst("farewell")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="farewell" class="form-control" id="farewell" placeholder="farewell"  value="" >
</div>
    </div>
    <!-- mg_end farewell -->

    <!-- mg_start signature -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="signature"><?php _t(ucfirst("signature")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="signature" class="form-control" id="signature" placeholder="signature"  value="" >
</div>
    </div>
    <!-- mg_end signature -->

    <!-- mg_start order_by -->
    <!-- mg_start status -->
  
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus");  ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>   

<p>* <?php _t("Required"); ?></p>

</form>
