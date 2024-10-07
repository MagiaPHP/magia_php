<form class="form-horizontal" method="post" action="index.php" >
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="update_passwordOk">
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="redi" value="1">


    <div class="form-group">
        <label for="np" class="col-sm-4 control-label"><?php _t("New password"); ?></label>
        <div class="col-sm-6">
            <input type="password" name="np" id="np" class="form-control" placeholder="">
        </div>

        <div class="col-sm-2">
            <input type="checkbox" onclick="showPasswordNp()"> <?php _t("Show"); ?>
        </div>    
    </div>


    <div class="form-group">
        <label for="rp" class="col-sm-4 control-label"><?php _t("Repete password"); ?></label>
        <div class="col-sm-6">
            <input type="password" name="rp" id="rp" class="form-control" placeholder="">
        </div>

        <div class="col-sm-2">
            <input type="checkbox" onclick="showPasswordRp()"> <?php _t("Show"); ?>
        </div>    
    </div>





    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
        </div>
    </div>

</form>

<ul>
    <?php
    $error = passwordIsGood("");
    if ($error) {
        foreach ($error as $key => $value) {
            echo "<li>" . _tr($value) . "</li>";
        }
    }
    ?>
</ul>


