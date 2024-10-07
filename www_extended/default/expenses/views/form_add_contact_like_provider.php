<?php
switch ($a) {

    case 'add_provider':
    case 'index':
    case 'add_provider_from_contacts':
        $redi = 6;
        break;

    case 'add_from_pdf':
        $redi = 7;
        break;

    default:
        $redi = 1;
        break;
}
?>
<form action ="index.php" method ="post" >
    <input type="hidden" name="c" value="providers">
    <input type="hidden" name="a" value="ok_add_short">
    <input type="hidden" name="redi[redi]" value="<?php echo $redi; ?>">

    <div class="row form-group">
        <label class="control-label col-sm-12" for="rol"><?php _t("Contacts"); ?></label>
        <div class="col-sm-12">    
            <select class="form-control selectpicker" data-live-search="true" name="company_id" required="">
                <?php
// contactos que no esten en la tabla de providers
                foreach (contacts_list_is_not_provider() as $key => $con_lis) {
                    ?>
                    <option value="<?php echo $con_lis['id']; ?>"><?php echo $con_lis['id']; ?> -  <?php echo _tr("Vat"); ?>: <?php echo $con_lis['tva'] ?> - <?php echo contacts_formated($con_lis['id']); ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-12" for=""></label>
        <div class="col-sm-12">    
            <button type="submit" class="btn btn-default">
                <?php echo icon("plus"); ?>
                <?php _t("Add provider"); ?>
            </button>
        </div>      							
    </div> 
</form>

