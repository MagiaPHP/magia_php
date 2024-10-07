<?php include "00_header.php"; ?>



<?php // include "nav_address.php"; ?>
<?php
// Gestion de mensajes cortos
(isset($sms)) ? sms($sms) : false;

if ($error) {
    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}
?>


<h2><?php echo $company->getEmployees()[0]->getName() ?>, <?php _t("fill in your information"); ?></h2>


<p>
    <?php _t("Write here other means of communication available to your clients"); ?>
</p>

<a name="next"></a>

<form action="index.php" class="form-horizontal" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_21">



    <?php
    foreach (directory_names_list() as $key => $directory) {
//        $disabled = ($directory["name"] == 'Email') ? ' disabled ' : "";
        $disabled = '';
        $value = directory_by_contact_name($u_id, $directory["name"]) ?? null;
        if (
                $directory["name"] != 'Email-secure' &&
                $directory["name"] != 'nationalNumber' &&
                $directory["name"] != 'Fax' &&
                $directory["name"] != 'Web' &&
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
            <button type="submit" class="btn btn-primary" >
                <span class="glyphicon glyphicon-floppy-disk"></span>
                <?php _t("Save"); ?>
            </button>

        </div>
    </div>
</form>





<?php
shop_registre_next(22);
?>




<?php include "00_footer.php"; ?>

