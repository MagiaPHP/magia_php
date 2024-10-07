
<?php include "00_header.php"; ?>


<?php // include "nav_address.php"; ?>
<?php
// Gestion de mensajes cortos
sms($sms);

if ($error && $sms) {
    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}
?>


<h2><?php _t("More info about your company"); ?></h2>   

<p><?php _t("How your clients can contact you"); ?></p>

<a name="next"></a>

<form action="index.php" class="form-horizontal" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_13">



    <?php
    foreach (directory_names_list() as $key => $directory) {
//        $disabled = ($directory["name"] == 'Email') ? ' disabled ' : "";
        $disabled = '';
        $value = directory_by_contact_name($u_owner_id, $directory["name"]) ?? null;
        if (
                $directory["name"] != 'Email-secure' &&
                $directory["name"] != 'nationalNumber' &&
                $directory["name"] != 'Fax' &&
                $directory["name"] != 'Tel2' &&
                $directory["name"] != 'Tel3'
        ) {
            echo '<div class="form-group">
                <label for="' . $directory["name"] . '" class="col-sm-3 control-label">' . _tr($directory["name"]) . '</label>
                <div class="col-sm-9">
                    <input 
                        name="directory[' . $directory["name"] . ']" 
                        type="text" 
                        class="form-control" 
                        id="directory[' . $directory["name"] . ']" 
                        placeholder="" 
                        value="' . $value . '"
                        ' . $disabled . '
                        
                        >
                </div>
            </div>';
        }
    }
    ?>

    <div class="form-group">
        <label for="" class="col-sm-3 control-label"></label>
        <div class="col-sm-9">


            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-floppy-disk"></span>
                <?php _t("Save"); ?>
            </button>

        </div>
    </div>

</form>





<?php
if (!$error) {
    shop_registre_next(14);
}
?>



<?php include "00_footer.php"; ?>