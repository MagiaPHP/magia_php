<?php
//vardump($id); 
//vardump($params['id']); 
//vardump($params); 
?>

<form method="post" action="index.php">

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_language_update">
    <input type="hidden" name="contact_id" value="<?php echo $params['id']; ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $params['id']; ?>">
    <input type="hidden" name="redi[c]" value="<?php echo $params['c']; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo $params['a']; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo $params['params']; ?>">

    <div class="form-group">
        
        <label for="language"><?php _t("Language"); ?></label>

        <select class="form-control" id="language" name="language">
            <?php
            foreach (_languages_list_by_status(1) as $key => $lang) {

                $lang_selected = ($lang['language'] == $params['language'] ) ? ' selected ' : '';

                echo '<option value="' . $lang['language'] . '" ' . $lang_selected . '>' . $lang['name'] . '</option>';
            }
            ?>
        </select>

    </div>

    <button type="submit" class="btn btn-default">
        <?php echo icon("update"); ?> 
        <?php _t("Update"); ?>
    </button>
    
</form>