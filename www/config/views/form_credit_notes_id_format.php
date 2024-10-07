<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="config">
    <input type="hidden" name="a" value="ok_credit_notes_id_format"> 

    <input type="hidden" name="redi[redi]" value="<?php echo $arg['redi']; ?>">
    <input type="hidden" name="redi[c]" value="<?php echo $arg['c']; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo $arg['a']; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo $arg['params']; ?>">

    <textarea class="form-control" name="data" id="" rows="5" cols="100"><?php echo _options_option('config_credit_notes_id_format'); ?></textarea>


    <br>
    <br>


    <button type="submit" class="btn btn-primary"><?php _t("Update"); ?></button>
</form>

