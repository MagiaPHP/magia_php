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



<h2><?php _t("Your personal information"); ?></h2>




<a name="next"></a>

<form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_2">

    <div class="form-group">
        <label for="my_title" class="col-sm-3 control-label"><?php //_t("") ;                  ?></label>
        <div class="col-sm-9">
            <select class="selectpicker" data-live-search="true" name="my_title" required="">
                <option value=""><?php _t("Select one"); ?></option>

                <?php
                //echo var_dump(contacts_titles_list());
                foreach (contacts_titles_list() as $key => $contacts_titles) {

                    $selected = ($contacts_titles['abbreviation'] == contacts_field_id('title', $u_id)) ? " selected " : "";
                    ?>
                    <option value="<?php echo $contacts_titles['title'] ?>" <?php echo "$selected"; ?>><?php echo _tr($contacts_titles['title']); ?></option>
                <?php } ?>
            </select>
        </div>
    </div>



    <div class="form-group">
        <label for="my_name" class="col-sm-3 control-label"><?php _t("Your name"); ?></label>
        <div class="col-sm-9">
            <input type="text" name="my_name" class="form-control" placeholder="" required="" value="<?php echo contacts_field_id('name', $u_id); ?>">
        </div>
    </div>


    <div class="form-group">
        <label for="my_lastname" class="col-sm-3 control-label"><?php _t("Your lastname"); ?></label>
        <div class="col-sm-9">
            <input type="text" name="my_lastname" class="form-control" placeholder="" required="" value="<?php echo contacts_field_id('lastname', $u_id); ?>">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">



            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-floppy-disk"></span>
                <?php _t("Save"); ?>
            </button>

        </div>
    </div>
</form>





<?php
//vardump($error);

if (!$error) {
    shop_registre_next(21);
}
?>




<?php include "00_footer.php"; ?>



