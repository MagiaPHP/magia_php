<?php include "00_header.php"; ?>


<?php // include "nav_address.php"; ?>
<?php
// Gestion de mensajes cortos
sms($sms);
if ($error) {
    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}
?>


<h2><?php _t("Tipo de empresa"); ?></h2>   


<form action="index.php" class="form-horizontal" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_11">
    <input type="hidden" name="contact_id" value="<?php echo $u_id; ?>">


    <div class = "form-group">
        <label for="company_name" class="col-sm-2 control-label"><?php _t("Company name"); ?> </label>
        <div class="col-sm-10">
            <select class="form-control" name="company_type" >
                <option value="1">SPRL</option>
                <option value="1">SRL</option>
                <option value="1">SA sociente anonima</option>
            </select>

        </div>
    </div>


    <div class="form-group">
        <label for="" class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-floppy-disk"></span>
                <?php _t("Save"); ?>
            </button>
        </div>
    </div>

</form>

<?php
if (!$error) {
    shop_registre_next(12);
}
?>




<?php include "00_footer.php"; ?>


