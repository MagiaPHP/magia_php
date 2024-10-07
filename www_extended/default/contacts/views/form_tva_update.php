<?php 

//vardump($id); 
//vardump($params['id']); 
//vardump($params); 
?>

<form method="post" action="index.php">

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_tva_update">
    <input type="hidden" name="contact_id" value="<?php echo $params['id']; ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $params['id'];  ?>">
    <input type="hidden" name="redi[c]" value="<?php echo $params['c'];  ?>">
    <input type="hidden" name="redi[a]" value="<?php echo $params['a'];  ?>">
    <input type="hidden" name="redi[params]" value="<?php echo $params['params'];  ?>">

    <div class="form-group">
        <label for="tva"><?php _t("Vat number"); ?></label>
        <input 
            type="text" 
            class="form-control" 
            name="tva" 
            id="tva" 
            placeholder="<?php echo _t("Vat number"); ?>"
            value="<?php echo $params['vat'];  ?>"
            >
    </div>
    
    <button type="submit" class="btn btn-default">
        <?php echo icon("update"); ?> 
        <?php _t("Update"); ?>
    </button>
</form>